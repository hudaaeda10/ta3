<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    protected $fillable = ['sprint_id', 'nama', 'deskripsi', 'bobot', 'status'];

    public function sprint()
    {
        return $this->belongsTo('App\Sprint');
    }

    public function mahasiswa()
    {
        return $this->belongsTo('App\Mahasiswa');
    }
}
