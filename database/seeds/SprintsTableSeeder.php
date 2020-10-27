<?php

use Illuminate\Database\Seeder;

class SprintsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sprints = \App\Sprint::create([
            'project_id' => 1,
            'nama' => 'Sprint 1',
            'tanggal_mulai' => '2020-08-01',
            'tanggal_selesai' => '2020-08-05',
            'persen' => 0,
        ]);
    }
}
