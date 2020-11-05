<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyReport extends Model
{
    protected $table = 'daily_reports';
    protected $fillable = ['sprint_id', 'mahasiswa_id', 'keterangan', 'tugas'];

    public function mahasiswa()
    {
        return $this->belongsTo('App\Mahasiswa');
    }

    public function sprint()
    {
        return $this->belongsTo('App\Sprint');
    }
}
