<?php

namespace App\Http\Controllers;

use App\{Project, Sprint, Task};
use Illuminate\Http\Request;

class SprintController extends Controller
{
    public function index(Project $projects)
    {
        return view('mahasiswa.project', compact('projects'));
    }

    public function show(Project $project, $idsprints)
    {
        $sprint = Sprint::find($idsprints);
        return view('mahasiswa.sprint', [
            'sprint' => $sprint,
            'task' => new Task(),
            'sprints' => Sprint::get(),
        ]);
    }
}
