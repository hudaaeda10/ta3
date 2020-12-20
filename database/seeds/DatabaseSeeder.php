<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProjectsTableSeeder::class);
        $this->call(MahasiswasTableSeeder::class);
        $this->call(SprintsTableSeeder::class);
        $this->call(TasksTableSeeder::class);
        $this->call(SprintReportsTableSeeder::class);
        $this->call(SprintReviewsTableSeeder::class);
        $this->call(DailyReportsTableSeeder::class);
    }
}
