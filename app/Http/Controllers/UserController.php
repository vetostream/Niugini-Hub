<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Iatstuti\Database\Support\CascadeSoftDeletes;

use App\User as User;
use App\Sellers as Sellers;
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
        $seller = Sellers::where('user_id', $id)->get();

        if ($seller->isEmpty()) {
            $seller = false;
        }

        return view('users.profile', ['user' => $user,
            'age' => $interval->y,
            'seller' => $seller
            ]);
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

    /**
     * Update the user password.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updatePassword(Request $request)
    {

        $user = Auth::user();

        $request->validate([
            'password' => 'required|string|min:6|confirmed',
            //Function validates if the correct password is inputted to update new password
            'current_password' => ['required', function ($attribute, $value, $fail) use ($user) {
                if (!Hash::check($value, $user->password)) {
                    return $fail(__('The current password is incorrect.'));
                }
            }],
        ]);

        $user->password = Hash::make($request->password);

        $user->save();
        Auth::logout();

        return redirect('/login')->with('message', 'Please try logging in to your account with your new password!');
    }

    /**
     * Show the deactivate account form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function deactivateForm()
    {
        return view('users.deactivate');
    }

    /**
     * Deactivate account.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function deactivate(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            //Function validates if the correct password is inputted to update new password
            'current_password' => ['required', function ($attribute, $value, $fail) use ($user) {
                if (!Hash::check($value, $user->password)) {
                    return $fail(__('The current password is incorrect.'));
                }
            }],
        ]);

        $user->delete();
        Auth::logout();

        return redirect('/login')->with('message', 'Account has been successfully deactivated.');
    }
}
