<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Hosnol Arifin',
            'email' => 'hosnolarifin87@gmail.com',
            'password' => bcrypt('12345')
        ]);

        $admin->assignRole('admin');

        $dosen = User::create([
            'name' => 'Zawarudddin',
            'email' => 'dosen123@gmail.com',
            'password' => bcrypt('12345')
        ]);

        $dosen->assignRole('dosen');

        $mhs = User::create([
            'name' => 'Erika',
            'email' => 'erika78@gmail.com',
            'password' => bcrypt('12345')
        ]);

        $mhs->assignRole('mahasiswa');
    }
}
