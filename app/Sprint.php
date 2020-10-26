<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
{
    protected $fillable = ['nama', 'tanggal_mulai', 'tanggal_akhir', 'persen', 'project_id'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function sprintReports()
    {
        return $this->hasMany(SprintReport::class);
    }

    public function dailyReports()
    {
        return $this->hasMany(DailyReport::class);
    }
}