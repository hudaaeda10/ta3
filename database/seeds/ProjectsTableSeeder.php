<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Table project
        DB::table('projects')->insert([
            [ // Project 1
                // 'id' => 1,
                'nama' => 'Project 1',
                'deskripsi' => 'Deskripsi Project 1',
                'tanggal_mulai' => Carbon::create('2020', '11', '01'),
                'tanggal_akhir' => Carbon::create('2020', '11', '28'),
                'jumlah_sprint' => 4,
                'budget' => 100000,
                'status' => 'Selesai',
                'persen' => 100,
                'product_owner_id' => 7,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [ // Project 2
                // 'id' => 2,
                'nama' => 'Project 2',
                'deskripsi' => 'Deskripsi Project 2',
                'tanggal_mulai' => Carbon::create('2020', '12', '01'),
                'tanggal_akhir' => Carbon::create('2021', '02', '28'),
                'jumlah_sprint' => 3,
                'budget' => 200000,
                'status' => 'Proses',
                'persen' => 0,
                'product_owner_id' => 8,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [ // Project 3
                // 'id' => 3,
                'nama' => 'Project 3',
                'deskripsi' => 'Deskripsi Project 3',
                'tanggal_mulai' => Carbon::create('2021', '02', '01'),
                'tanggal_akhir' => Carbon::create('2021', '03', '31'),
                'jumlah_sprint' => 2,
                'budget' => 300000,
                'status' => 'Belum',
                'persen' => 0,
                'product_owner_id' => 7,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [ // Project 4
                // 'id' => 4,
                'nama' => 'Project 4',
                'deskripsi' => 'Deskripsi Project 4',
                'tanggal_mulai' => Carbon::create('2021', '01', '01'),
                'tanggal_akhir' => Carbon::create('2021', '04', '30'),
                'jumlah_sprint' => 0,
                'budget' => 400000,
                'status' => 'Belum',
                'persen' => 0,
                'product_owner_id' => 8,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        ]);
    }
}
