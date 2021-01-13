<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SprintReview extends Model
{
    protected $table = 'sprint_reviews';

    protected $fillable = ['sprint_report_id', 'review'];

    public function sprintReport()
    {
        $this->belongsTo('App\SprintReport', 'sprint_report_id');
    }
}
