<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    protected $fillable = ['nama', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai', 'jumlah_sprint', 'project_owner', 'budget', 'status_sprint', 'persen'];

    public function sprints()
    {
        return $this->hasMany('App\Sprint', 'project_id');
    }

    public function sprintReports()
    {
        return $this->hasMany('App\SprintReport', 'project_id');
    }
}
