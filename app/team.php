<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class team extends Model
{
    public $table = 'team';

    public function scrum_master()
    {
        return $this->belongsTo(User::class, 'scrum_master_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function member_teams()
    {
        return $this->hasMany(MemberTeam::class, 'team_id', 'id');
    }
}
