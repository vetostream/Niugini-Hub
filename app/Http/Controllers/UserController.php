<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\User as User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the index.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('users.profile', ['user' => $user]);
    }

    /**
     * Show the update user form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateUserForm()
    {
        return view('users.update');
    }

    public function update(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        if($request->name != null) {
            $user->name = $request->name;
        }

        if($request->email != null) {
            $user->email = $request->email;
        }

        if($request->bday != null) {
            $user->date_of_birth = $request->bday;
        }

        if($request->gender != null) {
            $user->gender = $request->gender;
        }

        if($request->address != null) {
            $user->address = $request->address;
        }

        if($request->phone_number != null) {
            $user->phone_number = $request->phone_number;
        }

        $user->save();
		return redirect()->action('UserController@index');
    }

    /**
     * Show the update password form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updatePasswordForm()
    {
        return view('users.password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed'
        ]);

        $id = Auth::user()->id;
        $user = User::find($id);

        $user->password = Hash::make($request->password);

        $user->save();
		return redirect()->action('UserController@index');
    }

}
