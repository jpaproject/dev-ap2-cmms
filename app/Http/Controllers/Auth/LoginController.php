<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();
        Validator::make($input, [
            'username' => Rule::requiredIf(function () use ($request) {
                return ($request->get('username_tech') == null);
            }),
            'password' => Rule::requiredIf(function () use ($request) {
                return ($request->get('password_tech') == null);
            }),
            'username_tech' => Rule::requiredIf(function () use ($request) {
                return ($request->get('username') == null);
            }),
            'password_tech' => Rule::requiredIf(function () use ($request) {
                return ($request->get('password') == null);
            }),
        ], [
            'required' => 'The :attribute field is required.',
        ])->validate();
        
        $username = $request->username ?? $request->username_tech;
        $password = $request->password ?? $request->password_tech;

        $fieldType = filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (auth()->attempt(array($fieldType => $username, 'password' => $password))) {
            if (auth()->user()->getRoleNames()[0] == 'Admin') {
                return redirect()->route('dashboard.overview');
            }elseif (auth()->user()->getRoleNames()[0] == 'User Technical') {
                return redirect()->route('user-technical.dashboard');
            }
        }else {
            $errors = [];
            $user = User::where($fieldType, $username)->first();
            if ($request->username_tech) {
                if (!$user) {
                    $errors['username_tech'] = 'Invalid ' . ($fieldType === 'email' ? 'email' : 'username');
                } elseif (!Hash::check($password, $user->password)) {
                    $errors['password_tech'] = 'Invalid password';
                }
            }else {
                if (!$user) {
                    $errors['username'] = 'Invalid ' . ($fieldType === 'email' ? 'email' : 'username');
                } elseif (!Hash::check($password, $user->password)) {
                    $errors['password'] = 'Invalid password';
                }
            }

            return redirect()->back()->withErrors($errors);
        }
    }
}
