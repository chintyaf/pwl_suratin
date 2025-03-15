<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\View\View;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view(
            'admin.user',
            [
                'users' => $users,
            ]
        );
    }


    public function add()
    {
        $user = USer::all();
        return view(
            'admin.add-user',
            [
                'user' => $user,
            ]
        );
    }

    public function store(Request $request)
    {

        // return $request;
        $validateData = validator($request->all(), [
            'nip' => ['required', 'string', 'max:7', 'unique:users,nip'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string'],
        ])->validate();

        $user = User::create([
            'nip' => $request->nip,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_role' => $request->role
        ]);

        event(new Registered($user));

        return redirect(route('user.index', absolute: false));
    }

    public function multiAdd()
    {
        $user = USer::all();
        return view(
            'user.add-multi',
            [
                'user' => $user,
            ]
        );
    }
}
