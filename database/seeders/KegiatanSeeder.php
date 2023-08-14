<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kegiatan')->insert([
            'nama_kegiatan' => 'Jota Joti 2022',
            'tgl' => date('Y-m-d'),
            'tempat' => 'Sragen Kota',
            'deskripsi' => "Cobalah",
            'status' => "Terlaksana",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
