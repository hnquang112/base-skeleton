<?php
/**
 * Created by PhpStorm.
 * User: DaoDieuHoa
 * Date: 09/01/2016
 * Time: 10:59 PM
 */

namespace App\Http\Controllers\Front;

use Socialite;
use App\Repositories\ProfileRepository;
use Illuminate\Http\Request;
use App\User;

class AccountController extends FrontController {
    public function __construct() {
        $this->middleware('auth:web')->only('edit', 'store');
    }

    // GET: /account
    public function index() {
//        auth()->guard('web')->login(User::find(1));
        $isLoggedIn = auth()->guard('web')->check();
        $user = $orders = null;
        if ($isLoggedIn) {
            $user = auth()->guard('web')->user();
            $orders = $user->orders()->orderByDesc('created_at')->get();
        }

        return view('account.index', compact('isLoggedIn', 'user', 'orders'));
    }

    // GET: /account/facebook
    public function redirectToProvider() {
        return Socialite::driver('facebook')->redirect();
    }

    // GET: /account/facebook/callback
    public function handleProviderCallback(ProfileRepository $service) {
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());

        auth()->guard('web')->login($user);

        return back();
    }

    // GET: /account/logout
    public function logout() {
        auth()->guard('web')->logout();

        return redirect('/');
    }

    // GET: /account/address/{billing|shipping}
    public function edit() {
        $user = auth()->guard('web')->user();

        return view('account.edit', compact('user'));
    }

    // POST: /account
    public function store(Request $request) {
        $user = auth()->guard('web')->user();

        if ($request->submit_from == 'billing') {
            $emailUpdateRule = 'email|required|max:255|unique:users,email,' . $user->id;

            $this->validate($request, User::extendRulesForUpdating(User::$rulesForBilling, ['email' => $emailUpdateRule]));
            $user->fill($request->only('display_name', 'address', 'city', 'country', 'email', 'phone'));
        } elseif ($request->submit_from == 'shipping') {
            $this->validate($request, User::$rulesForShipping);
            $user->fill($request->only('shipping_full_name', 'shipping_address', 'shipping_city', 'shipping_country'));
        }

        if ($user->save()) {
            return redirect()->route('account.index');
        }
    }

}
