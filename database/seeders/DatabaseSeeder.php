<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Calon;
use App\Models\Pemilih;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Calon::create([
            'nomor_urut' => 1,
            'nama_calon' => 'Jonathan Hartono'
        ]);

        Calon::create([
            'nomor_urut' => 2,
            'nama_calon' => 'Kai Takebuchi'
        ]);

        Pemilih::factory(20)->create();
        User::factory(3)->create();

        User::create([
            'name' => 'Rakhmat Khaidir',
            'username' => 'rkhaidir',
            'password' => Hash::make('12345'),
            'is_admin' => 1
        ]);
    }
}
