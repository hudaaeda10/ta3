<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SprintsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Table sprint
        DB::table('sprints')->insert([
            [ // Sprint 1 Project 1
                'nama' => 'Sprint 1',
                'project_id' => 1,
                'tanggal_mulai' => Carbon::create('2020', '11', '01'),
                'tanggal_akhir' => Carbon::create('2020', '11', '07'),
                'status' => 'Selesai',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [ // Sprint 2 Project 1
                'nama' => 'Sprint 2',
                'project_id' => 1,
                'tanggal_mulai' => Carbon::create('2020', '11', '08'),
                'tanggal_akhir' => Carbon::create('2020', '11', '14'),
                'status' => 'Selesai',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [ // Sprint 3 Project 1
                'nama' => 'Sprint 3',
                'project_id' => 1,
                'tanggal_mulai' => Carbon::create('2020', '11', '15'),
                'tanggal_akhir' => Carbon::create('2020', '11', '21'),
                'status' => 'Selesai',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [ // Sprint 4 Project 1
                'nama' => 'Sprint 4',
                'project_id' => 1,
                'tanggal_mulai' => Carbon::create('2020', '11', '22'),
                'tanggal_akhir' => Carbon::create('2020', '11', '28'),
                'status' => 'Selesai',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [ // Sprint 1 Project 2
                'nama' => 'Sprint 1',
                'project_id' => 2,
                'tanggal_mulai' => Carbon::create('2020', '12', '01'),
                'tanggal_akhir' => Carbon::create('2020', '12', '31'),
                'status' => 'Proses',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [ // Sprint 2 Project 2
                'nama' => 'Sprint 2',
                'project_id' => 2,
                'tanggal_mulai' => Carbon::create('2021', '01', '01'),
                'tanggal_akhir' => Carbon::create('2021', '01', '31'),
                'status' => 'Belum',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [ // Sprint 3 Project 2
                'nama' => 'Sprint 3',
                'project_id' => 2,
                'tanggal_mulai' => Carbon::create('2021', '02', '01'),
                'tanggal_akhir' => Carbon::create('2021', '02', '28'),
                'status' => 'Belum',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [ // Sprint 1 Project 3
                'nama' => 'Sprint 1',
                'project_id' => 3,
                'tanggal_mulai' => Carbon::create('2021', '02', '01'),
                'tanggal_akhir' => Carbon::create('2021', '02', '28'),
                'status' => 'Belum',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [ // Sprint 2 Project 3
                'nama' => 'Sprint 2',
                'project_id' => 3,
                'tanggal_mulai' => Carbon::create('2021', '03', '01'),
                'tanggal_akhir' => Carbon::create('2021', '03', '31'),
                'status' => 'Belum',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        ]);
    }
}
