<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswas';
    protected $fillable = ['nama', 'nim', 'peran'];

    public function sprintReports()
    {
        return $this->hasMany('App\SprintReport', 'mahasiswa_id');
    }

    public function daillyReports()
    {
        return $this->hasMany('App\DailyReport', 'mahasiswa_id');
    }

    public function tasks()
    {
        return $this->hasMany('App\Mahasuswa', 'mahasiswa_id');
    }
}
