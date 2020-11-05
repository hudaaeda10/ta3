<?php

namespace App\Http\Controllers;

use App\{Project, Sprint, Task};
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('project.index', compact('projects'));
    }

    public function show($idproject)
    {
        $project = Project::findOrFail($idproject);
        $sprints = Sprint::where('project_id', $idproject)->get();
        return view('project.show', compact('sprints', 'project'));
    }

    public function tampil($idsprint)
    {
        $sprint = Sprint::findOrFail($idsprint);
        $tasks = Task::with('sprint')->orderBy('id', 'ASC')->where('sprint_id', $idsprint)->paginate(10);

        // tampilan persentasenya
        $wl = Task::with('sprint')->orderBy('status')->where('sprint_id', $idsprint)->whereIn('status', ['1'])->count();
        $total = Task::with('sprint')->orderBy('status')->where('sprint_id', $idsprint)->count();

        if ($total != 0) {
            $percent = round($wl / $total * 100);
        } else {
            $percent = 0;
        }

        return view('sprint.index', compact('sprint', 'tasks', 'percent'));
    }
}
