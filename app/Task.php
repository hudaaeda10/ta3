<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    protected $fillable = ['sprint_id', 'mahasiswa', 'nama', 'deskripsi', 'bobot', 'status'];

    public function sprint()
    {
        return $this->belongsTo('App\Sprint');
    }
}
