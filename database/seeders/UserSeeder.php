<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrator',
            'level' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'nama_di_surat' => "Sekar Mentari",
            'ttl' => "sragen, 06-10-2002",
            'pangkalan' => 'sragen',
            'no_tlpn' => '089670128440',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Sekar',
            'level' => 'user',
            'email' => 'sekar@gmail.com',
            'password' => Hash::make('sekar'),
            'nama_di_surat' => "Sekar Mentari",
            'ttl' => "sragen, 06-10-2002",
            'pangkalan' => 'sragen',
            'no_tlpn' => '089670128440',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        
    }
}
