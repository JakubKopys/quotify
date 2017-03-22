<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use User;
use Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    public function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required|min:4|max:20|unique:users,name,'.$user->id,
            'email' => 'email|unique:users,email,'.$user->id,
            'password' => 'min:4|max:255'
        ]);

        $user->name = $request['name'];
        $user->email = $request['email'];
        if($password = $request['password']) {
            $user->password = bcrypt($password);
        }
        $user->save();

        return back();
    }

}
