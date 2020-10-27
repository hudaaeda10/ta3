<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    protected $fillable = ['nama', 'deskripsi', 'bobot', 'sprint_id'];

    public function sprint()
    {
        return $this->belongsTo(Sprit::class);
    }
}
