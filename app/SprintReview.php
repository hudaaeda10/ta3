<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SprintReview extends Model
{
    protected $table = 'sprint_reviews';

    protected $filable = ['review', 'status', 'sprint_report_id'];

    public function sprintReport()
    {
        $this->belongsTo('App\SprintReport');
    }
}
