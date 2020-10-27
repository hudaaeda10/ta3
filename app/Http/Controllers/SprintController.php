<?php

namespace App\Http\Controllers;

use App\{Project, Sprint};
use Illuminate\Http\Request;

class SprintController extends Controller
{
    public function index(Project $projects)
    {
        return view('mahasiswa.project', compact('projects'));
    }

    public function show(Project $project, $idsprints)
    {
        $sprints = Sprint::find($idsprints);
        return view('mahasiswa.sprint', compact('sprints'));
    }
}
