<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    protected $fillable = ['sprint_id', 'nama', 'mahasiswa', 'deskripsi', 'status', 'bobot', 'tanggal_mulai', 'tanggal_selesai'];

    public function sprint()
    {
        return $this->belongsTo('App\Sprint');
    }
}
