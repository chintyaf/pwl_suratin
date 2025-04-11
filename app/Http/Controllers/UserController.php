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

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UserImport;


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
        $user = User::all();
        return view(
            'admin.add-user',
            [
                'user' => $user,
            ]
        );
    }

    public function store(Request $request)
    {

        $request->validate([
            'nip' => ['required', 'string', 'max:7', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', Rules\Password::defaults()],
            'id_role' => ['required', 'string', 'exists:role,id_role'],
        ]);

        $user = User::create([
            'nip' => $request->nip,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_role' => $request->id_role
        ]);

        event(new Registered($user));

        return redirect(route('user.index', absolute: false));
    }

    public function edit($nip)
    {
        $user = User::findOrFail($nip);

        return view('user.detail', [
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        // return $request;

        $user = User::findOrFail($request->nip); // Pastikan user ditemukan, jika tidak maka error 404
        $request->validate([
            'nip' => ['required', 'string', 'max:7', "unique:users,nip,{$user->nip},nip"],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', "unique:users,email,{$user->nip},nip"],
            'id_role' => ['required', 'exists:role,id_role'],
            // 'alamat' => ['required', 'string', 'max:255'],
            // 'alamat_bandung' => ['required', 'string', 'max:255'],
        ], [
            'id_role.exists' => 'The selected role does not exist. Please choose a valid role.',
        ]);

        // Update user
        $user->update([
            'nip' => $request->nip,
            'name' => $request->name,
            'email' => $request->email,
            'id_role' => $request->id_role,
            'alamat' => $request->alamat,
            'alamat_bandung' => $request->alamat_bandung
        ]);

        return redirect(route('user.index', absolute: false));
    }

    public function delete($nip)
    {
        $user = User::find($nip);
        if ($user) {
            $user->delete();
        }

        return redirect(route('user.index', absolute: false));
    }

    public function importForm()
    {
        return view(
            'user.import-add',
        );
    }
    public function importStore(Request $request) {
        Excel::import(new UserImport, $request->file('excel_file'));

        return redirect(route('dashboard', absolute: false));
    }
}
