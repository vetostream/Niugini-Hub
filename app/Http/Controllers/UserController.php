<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\User as User;
use DateTime;
use Redirect;
use Session;

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
        $date = new DateTime($user->date_of_birth);
        $now = new DateTime();
        $interval = $now->diff($date);

        return view('users.profile', ['user' => $user,
            'age' => $interval->y]);
    }

    /**
     * Update user profile.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function update(User $user)
    {
        if(Auth::user()->email == request('email')) {
            $this->validate(request(), [
                'name' => ['required', 'string', 'max:255'],
                'gender' => ['required', 'string'],
                'date_of_birth' => ['required', 'date'],
                'address' => ['required', 'string'],
                'phone_number' => ['required', 'numeric']
            ]);

            $user->name = request('name');
            $user->date_of_birth = request('date_of_birth');
            $user->gender = request('gender');
            $user->address = request('address');
            $user->phone_number = request('phone_number');

        } else {
            $this->validate(request(), [
                'name' => ['required', 'string', 'max:255'],
                'gender' => ['required', 'string'],
                'date_of_birth' => ['required', 'date'],
                'address' => ['required', 'string'],
                'phone_number' => ['required', 'numeric']
            ]);

            $user->name = request('name');
            $user->email = request('email');
            $user->date_of_birth = request('date_of_birth');
            $user->gender = request('gender');
            $user->address = request('address');
            $user->phone_number = request('phone_number');
        }

        $user->save();
        Session::flash('success', 'Profile Updated!');
        return back();
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

        $user = Auth::user();

        $request->validate([
            'password' => 'required|string|min:6|confirmed',
            'current_password' => ['required', function ($attribute, $value, $fail) use ($user) {
                if (!Hash::check($value, $user->password)) {
                    return $fail(__('The current password is incorrect.'));
                }
            }],
        ]);

        $user->password = Hash::make($request->password);

        $user->save();
        Auth::logout();

        return redirect('/login');
    }

}
