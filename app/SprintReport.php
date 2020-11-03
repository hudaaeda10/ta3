<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SprintReport extends Model
{
    protected $table = 'sprint_reports';

    protected $fillable = ['waktu', 'keterangan', 'sprint_id'];

    public function sprint()
    {
        return $this->belongsTo('App\Sprint');
    }

    public function sprintReview()
    {
        return $this->belongsTo('App\SprintReview', 'sprint_report_id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo('App\Mahasiswa');
    }
}
