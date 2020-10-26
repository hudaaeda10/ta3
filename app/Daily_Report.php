<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Daily_Report extends Model
{
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
