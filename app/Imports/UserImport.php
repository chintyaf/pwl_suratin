<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserImport implements ToCollection, ToModel
{
    private $current = 0;
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        // dd($collection);
    }

    public function model(array $row){
        $this->current++;
        if($this->current > 1){
            User::create([
                'nip'      => $row[0],
                'name'     => $row[1],
                'jurusan'  => $row[2],
                'alamat'   => $row[3],
                'alamat_bd'=> $row[4],
                'email'    => $row[5], // Menggunakan email dari array
                'password' => Hash::make($row[6]), // Password dari array
                'id_role'  => 3, // Gantilah dengan nilai yang sesuai jika ada aturan khusus
            ]);

        }
    }
}
