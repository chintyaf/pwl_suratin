<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        DB::table('role')->insert([

            [
                'id_role' => '0',
                'name_role' => 'Admin'
            ],

            [
                'id_role' => '1',
                'name_role' => 'Kepala Program Studi'
            ],

            [
                'id_role' => '2',
                'name_role' => 'Manajemen Operasional'
            ],

            [
                'id_role' => '3',
                'name_role' => 'Mahasiswa'
            ],

        ]);

        DB::table('users')->insert([
            [
                'nip' => 'adm000',
                'name' => 'admin00',
                'email' => 'admin@example.com',
                'password' => Hash::make('12345678'),
                'id_role' => '0',
            ],
            [
                'nip' => '720001',
                'name' => 'kaprodi01',
                'email' => 'johndoe@example.com',
                'password' => Hash::make('12345678'),
                'id_role' => '1',
            ],
            [
                'nip' => '720002',
                'name' => 'mo01',
                'email' => 'mo@gmail.com',
                'password' => Hash::make('12345678'),
                'id_role' => '2',
            ],

            [
                'nip' => '2372016',
                'name' => 'Brigitta',
                'email' => '2372016@maranatha.ac.id',
                'password' => Hash::make('12345678'),
                'id_role' => '3',
            ],

            [
                'nip' => '2372018',
                'name' => 'Chintya',
                'email' => '2372018@maranatha.ac.id',
                'password' => Hash::make('12345678'),
                'id_role' => '3',
            ],
        ]);
    }
}
