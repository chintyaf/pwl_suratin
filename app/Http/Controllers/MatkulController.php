<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MatkulController extends Controller
{
    public function index()
    {
        $matkul = MataKuliah::all();
        return view(
            'mata_kuliah.index',
            [
                'data' => $matkul,
            ]
        );
    }

    public function add()
        return view('mata_kuliah.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_mk' => ['required', 'string', 'max:15', 'unique:mata_kuliah'],
            'nama_mk' => ['required', 'string', 'max:45'],
            'id_prodi' => ['required', 'string', 'max:2'],
        ]);

        MataKuliah::create([
            'kode_mk' => $request->kode_mk,
            'nama_mk' => $request->nama_mk,
            'id_prodi' => $request->id_prodi,
        ]);

        return redirect(route('mata_kuliah.index', absolute: false))
        ->with('status', 'Mata Kuliah berhasil ditambahkan');
    }



    public function edit($id)
    {
        $matkul = MataKuliah::findOrFail($id);

        return view('mata_kuliah.edit', [
            'data' => $matkul
        ]);
    }

    public function update(Request $request, $id)
    {
        $matkul = MataKuliah::findOrFail($id);

        $request->validate([
            'kode_mk' => [
                'required',
                'string',
                'max:15',
                Rule::unique('mata_kuliah', 'kode_mk')->ignore($matkul->kode_mk, 'kode_mk')
            ],
            'nama_mk' => ['required', 'string', 'max:45'],
            'id_prodi' => ['required', 'string', 'max:2'],
        ]);

        $matkul->update([
            'kode_mk' => $request->kode_mk,
            'nama_mk' => $request->nama_mk,
            'id_prodi' => $request->id_prodi,
        ]);

        return redirect(route('mata_kuliah.index', absolute: false))
        ->with('status', 'Mata Kuliah berhasil diperbaharui');
    }

    public function delete($id)
    {
        $matkul = MataKuliah::findOrFail($id);

        try {
            $matkul->delete();
            return redirect()->route('mata_kuliah.index')
            ->with('success', 'Mata Kuliah berhasil dihapus');
        } catch (QueryException $e) {
            return redirect()->route('mata_kuliah.index')
            ->with('error', 'Tidak bisa menghapus, karena data sudah digunakan');
        }
    }
}
