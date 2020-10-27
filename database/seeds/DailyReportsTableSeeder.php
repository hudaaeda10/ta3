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
            'waktu' => '2020-08-11 10:05:10',
            'keterangan' => 'Pekerjaan Hampir Selesai',
        ]);
    }
}
