<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SprintReview extends Model
{
    protected $tableName = 'sprint_review';

    protected $filable = ['review', 'status', 'sprint_report_id'];

    public function sprintReport()
    {
        $this->belongsTo(SprintReport::class);
    }
}
