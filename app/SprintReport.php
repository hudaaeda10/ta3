<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SprintReport extends Model
{
    protected $table = 'sprint_reports';

    protected $fillable = ['keterangan', 'sprint_id', 'mahasiswa_id', 'project_id'];

    public function sprint()
    {
        return $this->belongsTo('App\Sprint');
    }

    public function sprintReview()
    {
        return $this->hasOne('App\SprintReview')->withDefault();
    }

    public function mahasiswa()
    {
        return $this->belongsTo('App\Mahasiswa');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
