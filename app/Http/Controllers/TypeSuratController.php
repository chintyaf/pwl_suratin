<?php

namespace App\Http\Controllers;

use App\Models\TypeSurat;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TypeSuratController extends Controller
{
    public function index()
    {
        $type = TypeSurat::all();
        return view(
            'type-surat.index',
            [
                'data' => $type,
            ]
        );
    }

    public function add()
    {
        return view('type-surat.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_type' => ['required', 'string', 'max:10', 'unique:type_surat'],
            'name_type' => ['required', 'string', 'max:50'],
        ]);

        TypeSurat::create([
            'id_type' => $request->id_type,
            'name_type' => $request->name_type,
        ]);

        return redirect(route('type_surat.index', absolute: false))
        ->with('status', 'Jenis surat berhasil ditambahkan');
    }



    public function edit($id)
    {
        $prodi = TypeSurat::findOrFail($id);

        return view('type-surat.edit', [
            'data' => $prodi
        ]);
    }

    public function update(Request $request, $id)
    {
        $prodi = TypeSurat::findOrFail($id);

        $request->validate([
            'id_type' => [
                'required',
                'string',
                'max:10',
                Rule::unique('type_surat', 'id_type')->ignore($prodi->id_type, 'id_type')
            ],
            'name_type' => ['required', 'string', 'max:50'],
        ]);

        $prodi->update([
            'id_type' => $request->id_type,
            'name_type' => $request->name_type,
        ]);

        return redirect(route('type_surat.index', absolute: false))
        ->with('status', 'Jenis Surat berhasil diperbaharui');
    }

    public function delete($id)
    {
        $prodi = TypeSurat::findOrFail($id);

        try {
            $prodi->delete();
            return redirect()->route('type_surat.index')
            ->with('success', 'Jenis surat berhasil dihapus');
        } catch (QueryException $e) {
            return redirect()->route('type_surat.index')
            ->with('error', 'Tidak dapat dihapus, karena memiliki relasi');
        }
    }
}
