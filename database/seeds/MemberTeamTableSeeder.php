<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberTeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Table member_team
        DB::table('member_team')->insert([
            [ // Member Team 1 Team 1
                // 'id' => 1,
                'team_id' => 1,
                'mahasiswa_id' => 9,
                'peran' => 'Frontend Developer',
                'tanggung_jawab' => 'Bertanggung jawab pada tampilan web',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [ // Member Team 2 Team 1
                // 'id' => 2,
                'team_id' => 1,
                'mahasiswa_id' => 10,
                'peran' => 'Backend Developer',
                'tanggung_jawab' => 'Bertanggung jawab pada fungsi web',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [ // Member Team 3 Team 1
                // 'id' => 3,
                'team_id' => 1,
                'mahasiswa_id' => 11,
                'peran' => 'Android Developer',
                'tanggung_jawab' => 'Bertanggung jawab pada platform android',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [ // Member Team 4 Team 1
                // 'id' => 4,
                'team_id' => 1,
                'mahasiswa_id' => 12,
                'peran' => 'Project Officer',
                'tanggung_jawab' => 'Bertanggung jawab pada pekerjaan team',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [ // Member Team 1 Team 2
                // 'id' => 5,
                'team_id' => 2,
                'mahasiswa_id' => 13,
                'peran' => 'Project Management',
                'tanggung_jawab' => 'Bertugas mengelola project',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [ // Member Team 2 Team 2
                // 'id' => 6,
                'team_id' => 2,
                'mahasiswa_id' => 14,
                'peran' => 'Quality Assurance',
                'tanggung_jawab' => 'Bertugas memeriksa kualitas project',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        ]);
    }
}
