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
        // DB::table('users')->truncate();
        // DB::table('role')->truncate();
        // DB::table('program_studi')->truncate();

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

        DB::table('program_studi')->insert([
            [
                'id_prodi' => '1',
                'name_prodi' => 'Ilmu Komputer'
            ],

            [
                'id_prodi' => '2',
                'name_prodi' => 'Teknik Informatika'
            ],

            [
                'id_prodi' => '3',
                'name_prodi' => 'Sistem Informasi'
            ],

        ]);

        // DB::table('users')->insert([
        //     [
        //         'nip' => 'adm001',
        //         'name' => 'admin00',
        //         'email' => 'admin@example.com',
        //         'password' => Hash::make('12345678'),
        //         'id_role' => '0',
        //         'id_prodi' => null,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'nip' => '720001',
        //         'name' => 'kaprodi IF',
        //         'email' => 'kaprodiIF@example.com',
        //         'password' => Hash::make('12345678'),
        //         'id_role' => '1',
        //         'id_prodi' => '2',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'nip' => '720002',
        //         'name' => 'MO IF',
        //         'email' => 'moIF@gmail.com',
        //         'password' => Hash::make('12345678'),
        //         'id_role' => '2',
        //         'id_prodi' => '2',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],

        //     [
        //         'nip' => '730001',
        //         'name' => 'kaprodi SI',
        //         'email' => 'kaprodiIF@example.com',
        //         'password' => Hash::make('12345678'),
        //         'id_role' => '1',
        //         'id_prodi' => '3',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'nip' => '730002',
        //         'name' => 'MO SI',
        //         'email' => 'moIF@gmail.com',
        //         'password' => Hash::make('12345678'),
        //         'id_role' => '2',
        //         'id_prodi' => '3',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],

        //     [
        //         'nip' => '710001',
        //         'name' => 'kaprodi IlKom',
        //         'email' => 'kaprodiIF@example.com',
        //         'password' => Hash::make('12345678'),
        //         'id_role' => '1',
        //         'id_prodi' => '1',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'nip' => '710002',
        //         'name' => 'MO IlKom',
        //         'email' => 'moIF@gmail.com',
        //         'password' => Hash::make('12345678'),
        //         'id_role' => '2',
        //         'id_prodi' => '1',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],

        //     [
        //         'nip' => '2372016',
        //         'name' => 'Brigitta',
        //         'email' => '2372016@maranatha.ac.id',
        //         'password' => Hash::make('12345678'),
        //         'id_role' => '3',
        //         'id_prodi' => '2',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],

        //     [
        //         'nip' => '2372018',
        //         'name' => 'Chintya',
        //         'email' => '2372018@maranatha.ac.id',
        //         'password' => Hash::make('12345678'),
        //         'id_role' => '3',
        //         'id_prodi' => '2',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],

        //     [
        //         'nip' => '2373001',
        //         'name' => 'Mhs Sistem Informasi',
        //         'email' => '2373001@maranatha.ac.id',
        //         'password' => Hash::make('12345678'),
        //         'id_role' => '3',
        //         'id_prodi' => '3',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],

        //     [
        //         'nip' => '2371001',
        //         'name' => 'Mhs Ilmu Komputer',
        //         'email' => '2371001@maranatha.ac.id',
        //         'password' => Hash::make('12345678'),
        //         'id_role' => '3',
        //         'id_prodi' => '1',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        // ]);
    }
}
