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
            'nama' => 'Merancang Awal Aplikasi',
            'deskripsi' => 'Merancang Algoritma Aplikasi',
            'bobot' => '3',
        ]);
    }
}
