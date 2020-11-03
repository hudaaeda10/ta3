<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
{
    protected $table = 'sprints';
    protected $fillable = ['nama', 'tanggal_mulai', 'tanggal_akhir', 'persen', 'project_id'];

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function tasks()
    {
        return $this->hasMany('App\Task', 'sprint_id');
    }

    public function sprintReports()
    {
        return $this->hasMany('App\SprintReport', 'sprint_id');
    }

    public function dailyReports()
    {
        return $this->hasMany('App\DailyReport', 'sprint_id');
    }
}
