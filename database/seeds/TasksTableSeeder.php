<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = \App\Task::create([
            'sprint_id' => 1,
            'mahasiswa_id' => 1,
            'nama' => 'Merancang Awal Aplikasi',
            'deskripsi' => 'Merancang Algoritma Aplikasi',
            'status' => 0,
            'bobot' => '3',
        ]);
    }
}
