<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{

    public function autoLogin(Request $request)
    {
        // dd($request);
        // Validate signature and expiry
        // if (! $request->hasValidSignature()) {
        //     abort(401, 'Invalid or expired login link');
        // }

        // Find user by email
        $user = User::where('email', $request->email)->first();

        if (! $user) {
            abort(404, 'User not found');
        }

        // Log the user in
        Auth::login($user);

        // Redirect to tenant dashboard or intended page
        return redirect('/');
    }
    public function showLoginForm()
    {
        return view('pages.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        // if (!tenancy()->initialized) {
        //     return back()->with('error', 'Tenant not found or not initialized.');
        // }

        if (Auth::attempt([
            'email'    => $request->email,
            'password' => $request->password,
        ])) {
            $request->session()->regenerate();

            return redirect('/'); // or any protected route
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
            'name'     => 'required',
            // 'lastname'  => 'required',
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = User::create(
            [
                'name'     => $request->name,
                // 'lastname'  => $request->lastname,
                'email'    => $request->email,
                'password' => Hash::make($request->password),

            ]

        );
        if (! $user) {
            return back()->with('error', 'Something went wrong.');
        }

        // $role=Role::findById(1);
        // $permissions=Permission::all();
        // $role->givePermissionTo($permissions);
        
        $user->assignRole('Super Admin');

        Auth::login($user);

        return redirect('/');

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');

    }
}
