<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SprintReview extends Model
{
    protected $table = 'sprint_reviews';

    protected $filable = ['review'];

    public function sprintReport()
    {
        $this->hasOne('App\SprintReport', 'sprint_report_id');
    }
}
