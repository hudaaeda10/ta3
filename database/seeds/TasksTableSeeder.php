<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            [
                'sprint_id' => 1,
                'mahasiswa_id' => 1,
                'nama' => 'Merancang Awal Aplikasi',
                'deskripsi' => 'Merancang Algoritma Aplikasi',
                'status' => 0,
                'bobot' => '3',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'sprint_id' => 1,
                'mahasiswa_id' => 1,
                'nama' => 'Merancang Kedua Aplikasi',
                'deskripsi' => 'Merancang Desain Aplikasi',
                'status' => 0,
                'bobot' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        ]);
    }
}
