<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();

        return view('admin.index', [
            'users' => $users
        ]);

    }

    public function store(Request $request)
    {
        $validateData = validator($request->all(), [
            'nik' => 'required|string|max:7|unique:dosen,nik',
            'name' => 'required|string|max:100',
            'birth_date' => 'required',
            'email' => 'required|email|max:45|unique:dosen,email',
        ])->validate();

        $acc = new User($validateData);
        $acc->save();

        return view('admin.index');
    }
}
