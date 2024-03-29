<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\User;

class UserController extends CmsController {

    public function __construct() {
        $this->middleware('can:view,App\User', ['only' => ['index']]);
        $this->middleware('can:create,App\User', ['only' => ['create', 'store']]);
        $this->middleware('can:update,user', ['only' => ['edit', 'update']]);
        $this->middleware('can:delete,App\User', ['only' => ['destroy']]);
    }

    // GET: /cms/users
    public function index(Request $request) {
        $this->seo()->setTitle('Users List');
        $users = User::query();

        if (get_auth_admin_type() == User::ADMIN) $users = $users->filterNotMaster();

        $users = $users->orderBy('created_at', 'desc')->get();

        return view('cms.users.index', compact('users'));
    }

    // GET: /cms/users/create
    public function create() {
        $this->seo()->setTitle('Create User');
        $user = new User;

        return view('cms.users.form', compact('user'));
    }

    // POST: /cms/users
    public function store(Request $request) {
        $this->validate($request, User::$rulesForCreating);

        $user = new User;
        $user->fill($request->all());
        $user->password = $request->password;

        if ($user->save()) {
            flash()->success('Saved successfully');

            return redirect()->route('cms.users.index');
        }

        flash()->error('Save failed');

        return back();
    }

    // GET: /cms/users/1/edit
    public function edit($user) {
        $this->seo()->setTitle('Edit User');

        return view('cms.users.form', compact('user'));
    }

    // PUT: /cms/users/1
    public function update(Request $request, $user) {
        $emailUpdateRule = 'email|required|max:255|unique:users,email,' . $user->id;
        $this->validate($request, User::extendRulesForUpdating(User::$rulesForUpdating, ['email' => $emailUpdateRule]));

        $user->fill($request->all());
        if (!empty($request->password)) $user->password = $request->password;

        if ($user->save()) {
            flash()->success('Saved successfully');
        } else {
            flash()->error('Save failed');
        }

        return back();
    }

    // DELETE: /cms/users/1
    public function destroy(Request $request) {
        $deleteIds = $request->selected_ids;

        if(($key = array_search(auth()->user()->id, $deleteIds)) !== false) {
            unset($deleteIds[$key]);
        }

        $this->deleteMultipleItems(User::class, $deleteIds);

        return back();
    }
}
