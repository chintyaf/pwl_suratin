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
use App\Models\Role;
use Illuminate\Validation\Rule;


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


    public function addAdmin()
    {
        return view(
            'user.add',
        );
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'nip' => ['required', 'string', 'max:7', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', Rules\Password::defaults(), 'confirmed'],
        ]);

        $user = User::create([
            'nip' => $request->nip,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_role' => '0',
        ]);

        event(new Registered($user));

        return redirect(route('admin.dashboard', absolute: false));
    }


    public function add()
    {
        return view(
            'user.add',
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

        if($request->id_role != '0'){
            $request->validate([
                'id_prodi' => ['required', 'string', 'exists:program_studi,id_prodi'],
            ]);
        }

        // Custom validation: only for Ketua Program Studi (id_role == 1)
        if ($request->id_role == '1' || $request->id_role == '2') {
            $exists = User::where('id_role', $request->id_role)
                        ->where('id_prodi', $request->id_prodi)
                        ->exists();

            if($request->id_role == '1'){
                $name = "Ketua Program Studi";
            } else {
                $name = "Manajemen Operasional";
            }

            if ($exists) {
                return back()->withErrors(['id_prodi' => $name . ' untuk program studi ini sudah terdaftar.'])->withInput();
            }
        }

        $user = User::create([
            'nip' => $request->nip,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_role' => $request->id_role,
            'id_prodi' => $request->id_prodi ?? null,
            'alamat' => $request->alamat ?? null,
            'alamat_bandung' => $request->alamat_bandung ?? null,
        ]);

        // event(new Registered($user));


        return redirect(route('user.index', absolute: false))
        ->with('status', 'User berhasil dibuat');
    }



    public function edit($nip)
    {
        $user = User::findOrFail($nip);

        return view('user.detail', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $nip)
    {
        $user = User::findOrFail($nip); // Pastikan user ditemukan, jika tidak maka error 404
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255',
                Rule::unique('users', 'email')->ignore($request->email, 'email')
            ],
            'alamat' => ['max:255'],
            'alamat_bandung' => ['max:255'],
        ]);
        // Update user
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat ?? null,
            'alamat_bandung' => $request->alamat_bandung ?? null,
            'id_prodi' => $request->id_prodi
        ]);

        return redirect(route('user.index', absolute: false))
        ->with('status', 'User berhasil diperbaharui');
    }

    public function disable($nip){
        $user = User::findOrFail($nip);

        $user->update([
            'id_role' => null
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
