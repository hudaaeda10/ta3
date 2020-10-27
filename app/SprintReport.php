<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SprintReport extends Model
{
    protected $table = 'sprint_reports';

    protected $fillable = ['waktu', 'keterangan', 'sprint_id'];

    public function sprint()
    {
        return $this->belongsTo(Sprint::class);
    }

    public function sprintReview()
    {
        return $this->belongsTo(SprintReview::class);
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
