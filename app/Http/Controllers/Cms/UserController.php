<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\User;

class UserController extends CmsController {

    // GET: /cms/users
    public function index(Request $request) {
        $users = User::query();

        if (get_auth_admin_type() == User::ADMIN) $users = $users->filterNotMaster();

        $users = $users->orderBy('created_at', 'desc')->get();

        return view('cms.users.index', compact('users'));
    }

    // GET: /cms/users/create
    public function create() {
        $user = new User;

        return view('cms.users.form', compact('user'));
    }

    // POST: /cms/users
    public function store(Request $request) {
        $this->validate($request, User::$rulesForCreating);

        $user = new User;
        $user->fill($request->all());

        if ($user->save()) {
            flash()->success('Saved successfully');

            return redirect()->route('cms.users.index');
        }

        flash()->error('Save failed');

        return back();
    }

    // GET: /cms/users/1/edit
    public function edit($user) {
        return view('cms.users.form', compact('user'));
    }

    // PUT: /cms/users/1
    public function update(Request $request, $user) {;
        $emailUpdateRule = 'email|required|max:255|unique:users,email,' . $user->id;
        $this->validate($request, User::extendRulesForUpdating(self::$rulesForUpdating, ['email' => $emailUpdateRule]));

        $user->fill($request->all());

        if ($user->save()) {
            flash()->success('Saved successfully');

            return redirect()->route('cms.users.index');
        }

        flash()->error('Save failed');

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
