<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswas';
    protected $fillable = ['nama', 'nim', 'peran'];

    public function sprintReports()
    {
        return $this->hasMany(SprintReport::class);
    }

    public function daillyReports()
    {
        return $this->hasMany(DailyReport::class);
    }
}
