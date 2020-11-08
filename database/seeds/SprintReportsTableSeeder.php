<?php

use Illuminate\Database\Seeder;

class SprintReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sprintReports = \App\SprintReport::create([
            'sprint_id' => 1,
            'mahasiswa_id' => 1,
            'keterangan' => 'Pekerjaan Hampir Selesai',
        ]);
    }
}
