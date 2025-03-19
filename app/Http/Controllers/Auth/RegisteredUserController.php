<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request);
        // return($request);

        // $request->validate([
        //     'nip' => ['required', 'string', 'max:7', 'unique:users'],
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        //     'id_role' => ['required', 'exists:role,id_role '],
        // ]);

        // $user = User::create([
        //     'nip' => $request->nip,
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'id_role' => $request->id_role
        // ]);

        // event(new Registered($user));

        // Auth::login($user);

        // return redirect(route('dashboard', absolute: false));
    }
}
