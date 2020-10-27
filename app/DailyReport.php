<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyReport extends Model
{
    protected $table = 'daily_reports';
    protected $fillable = ['sprint_id ', 'mahasiswa_id', 'waktu', 'keterangan'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function sprint()
    {
        return $this->belongsTo(Sprint::class);
    }
}
