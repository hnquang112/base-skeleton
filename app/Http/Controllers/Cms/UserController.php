<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\User;

class UserController extends CmsController {
    public function index(Request $request) {
        $users = User::get();

        return view('cms.users.index', compact('users'));
    }

    public function create() {
        $user = new User;

        return view('cms.users.form', compact('user'));
    }

    public function store(Request $request) {
        $this->validate($request, User::$rulesForCreating);

        $user = new User;
        $user->fill($request->all());

        if ($user->save()) {
            flash()->success('Saved successfully');
        } else {
            flash()->error('Save failed');
        }

        return back();
    }

    public function edit($user) {
        return view('cms.users.form', compact('user'));
    }

    public function update(Request $request, $user) {
        $this->validate($request, User::$rulesForCreating);

        $user->fill($request->all());

        if ($user->save()) {
            flash()->success('Saved successfully');

            return redirect()->route('cms.users.index');
        }

        flash()->error('Save failed');

        return back();
    }

    public function destroy(Request $request) {
        $this->deleteMultipleItems(User::class, $request->selected_ids);

        return back();
    }
}
