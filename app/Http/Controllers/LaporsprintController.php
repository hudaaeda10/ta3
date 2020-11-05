<?php

namespace App\Http\Controllers;

use App\{Project, Sprint, SprintReport};
use Illuminate\Http\Request;

class LaporsprintController extends Controller
{
    public function index($idproject)
    {
        $project = Project::findOrFail($idproject);
        $sprints = SprintReport::all();
        // $sprints = Sprint::with('project')->where('project_id', $idproject)->get();

        return view('laporan.sprint.index', compact('sprints', 'project'));
    }

    public function show(SprintReport $sprints)
    {
        return view('laporan.sprint.show', compact('sprints'));
    }

    public function destroy(SprintReport $sprints)
    {
        $sprints->delete();
        return redirect()->back();
    }
}
