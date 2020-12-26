<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyReport extends Model
{
    protected $table = 'daily_reports';
    protected $fillable = ['sprint_id', 'keterangan', 'tugas', 'mahasiswa'];

    public function sprint()
    {
        return $this->belongsTo('App\Sprint');
    }
}
