<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('pages.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required|min:6',
        ]);
        if (Auth::attempt([
            'email'    => $request->email,
            'password' => $request->password,
        ])) {
            $request->session()->regenerate();
    
            return redirect('/');
        }
        return back()->with('error', 'The provided credentials do not match our records.');

}
    public function showRegisterForm()
    {
        return view('pages.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname'  => 'required',
            'email'     => 'required|email',
            'password'  => 'required|min:6',
        ]);

        $user = User::create(
            [
                'firstname' => $request->firstname,
                'lastname'  => $request->lastname,
                'email'     => $request->email,
                'password'  => Hash::make($request->password),

            ]

        );
        if (! $user) {
            return back()->with('error', 'Something went wrong.');
        }

        Auth::login($user);

        return redirect('/');

}


public function logout(Request $request){
   Auth::logout();
   $request->session()->invalidate();
   $request->session()->regenerateToken();
   return redirect('/login');

}
}
