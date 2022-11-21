<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserMeta;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmail;
use App\Mail\SuccessfullyRegistered;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->remember_me)) {
            /** @var User $user */
            $user = Auth::user();
            
            $request->session()->regenerate();
            if ( $user->hasRole('administrator') ) {
                return redirect()->to('/yn-admin');
            } else {
                return redirect()->to('/');
            }            
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
            'password' => 'The provided credentials do not match our records.'
        ]);
    }

    public function register(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ]);

        $user = User::create(request(['name', 'email', 'password']));

        auth()->login($user);

        event(new Registered($user));

        if(Auth::check()){
            $user_meta = new UserMeta();
            $user_meta->user_id = Auth::id();
            $user_meta->avatar = 'avatar.jpg';
            $user_meta->about = 'Write about yourself...';
            $user_meta->gender = 'male';
            $user_meta->location = 'INDIA';
            $user_meta->cover_photo = 'ad-l-bx.jpg';

            $user_meta->save();
        }

        return redirect()->to('/email/verify');
    }

    public function verify()
    {
        return view('verify');
    }

    public function verify_email(EmailVerificationRequest $request) {
        $request->fulfill();
        Mail::to(Auth::user())->send(new SuccessfullyRegistered());

        return redirect('/');
    }

    public function email_resend() {
        Auth::user()->sendEmailVerificationNotification();
     
        return back()->with('message', 'Verification link sent!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();

        return redirect()->to('/');
    }

    public function forgot_password()
    {
        return view('forgot_pass');
    }

    public function email_password(Request $request)
    {
        $request->validate(['email' => 'required|email']);
     
        $status = Password::sendResetLink(
            $request->only('email')
        );
     
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

    public function reset_password($token)
    {
        return view('reset_password', ['token' => $token]);
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
     
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );
     
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }
}