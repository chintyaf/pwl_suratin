<?php

namespace App\Http\Controllers;

use App\Models\ProgramStudi;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProdiController extends Controller
{
    public function index()
    {
        $prodi = ProgramStudi::all();
        return view(
            'program-studi.index',
            [
                'program_studi' => $prodi,
            ]
        );
    }

    public function add()
    {
        return view('program-studi.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_prodi' => ['required', 'string', 'max:2', 'unique:program_studi'],
            'name_prodi' => ['required', 'string', 'max:25'],
        ]);

        ProgramStudi::create([
            'id_prodi' => $request->id_prodi,
            'name_prodi' => $request->name_prodi,
        ]);

        return redirect(route('program_studi.index', absolute: false))
        ->with('status', 'Program Studi berhasil ditambahkan');
    }



    public function edit($id)
    {
        $prodi = ProgramStudi::findOrFail($id);

        return view('program-studi.edit', [
            'data' => $prodi
        ]);
    }

    public function update(Request $request, $id)
    {
        $prodi = ProgramStudi::findOrFail($id);

        $request->validate([
            'id_prodi' => [
                'required',
                'string',
                'max:2',
                Rule::unique('program_studi', 'id_prodi')->ignore($prodi->id_prodi, 'id_prodi')
            ],
            'name_prodi' => ['required', 'string', 'max:25'],
        ]);

        $prodi->update([
            'id_prodi' => $request->id_prodi,
            'name_prodi' => $request->name_prodi,
        ]);

        return redirect(route('program_studi.index', absolute: false))
        ->with('status', 'User berhasil diperbaharui');
    }

    public function delete($id)
    {
        $prodi = ProgramStudi::findOrFail($id);

        try {
            $prodi->delete();
            return redirect()->route('program_studi.index')
            ->with('success', 'Program deleted successfully.');
        } catch (QueryException $e) {
            return redirect()->route('program_studi.index')
            ->with('error', 'Cannot delete this program because it has related data.');
        }
    }
}
