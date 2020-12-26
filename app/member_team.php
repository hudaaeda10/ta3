<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class member_team extends Model
{
    public $table = 'member_team';

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'mahasiswa_id');
    }
}
