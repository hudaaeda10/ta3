<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Table team
        DB::table('team')->insert([
            [ // Team 1
                // 'id' => 1,
                'nama' => 'Team 1',
                'semester' => '20201',
                'prodi' => 'Teknik Informatika',
                'nilai' => 100,
                'scrum_master_id' => 5,
                'projects_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [ // Team 2
                // 'id' => 2,
                'nama' => 'Team 2',
                'semester' => '20201',
                'prodi' => 'Sistem Informasi',
                'nilai' => 90,
                'scrum_master_id' => 6,
                'projects_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [ // Team 3
                // 'id' => 3,
                'nama' => 'Team 3',
                'semester' => '20201',
                'prodi' => 'Teknik Informatika',
                'nilai' => 0,
                'scrum_master_id' => 5,
                'projects_id' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [ // Team 4
                // 'id' => 4,
                'nama' => 'Team 4',
                'semester' => '20201',
                'prodi' => 'Sistem Informasi',
                'nilai' => 0,
                'scrum_master_id' => 6,
                'projects_id' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        ]);
    }
}
