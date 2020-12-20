<?php

use Illuminate\Database\Seeder;

class SprintReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sprintReviews = \App\SprintReview::create([
            'sprint_report_id' => 1,
            'review' => 'Perbaiki beberapa komponen pada task',
        ]);
    }
}
