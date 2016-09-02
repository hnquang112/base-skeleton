<?php
/**
 * Created by PhpStorm.
 * User: DaoDieuHoa
 * Date: 09/01/2016
 * Time: 10:59 PM
 */

namespace App\Http\Controllers\Front;

use Socialite;

class AccountController extends FrontController {
    // GET: /account
    public function index() {
        return view('front.account.index');
    }

    // GET: /account/facebook
    public function redirectToProvider() {
        return Socialite::driver('facebook')->redirect();
    }

    // GET: /account/facebook/callback
    public function handleProviderCallback() {
        $user = Socialite::driver('facebook')->user();

        dd($user->getEmail());

        // $user->token;
    }
}
