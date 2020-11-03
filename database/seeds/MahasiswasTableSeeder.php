<?php

use Illuminate\Database\Seeder;

class MahasiswasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mahasiswas = \App\Mahasiswa::create([
            'nama' => 'Sakura',
            'nim' => '0110217089',
            'peran' => 'Developer',
        ],);
    }
}
