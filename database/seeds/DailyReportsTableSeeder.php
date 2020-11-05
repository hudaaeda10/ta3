<?php

use Illuminate\Database\Seeder;

class DailyReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dailyReports = \App\DailyReport::create([
            'sprint_id' => 1,
            'mahasiswa_id' => 1,
            'keterangan' => 'Pekerjaan Hampir Selesai',
        ]);
    }
}
