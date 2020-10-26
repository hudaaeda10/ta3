<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = \App\Project::create([
            'nama' => 'Mobile Kampus',
            'deskripsi' => 'Membuat Aplikasi Mobile Kampus',
            'tanggal_mulai' => '2020-08-01',
            'tanggal_selesai' => '2020-10-01',
            'jumlah_sprint' => 5,
            'project_owner' => 'Mairah',
            'budget' => 10000000,
            'status_sprint' => 'no',
            'persen' => 0
        ]);
    }
}
