<?php

namespace App\Http\Controllers;

use App\{Project, Sprint, SprintReport, Mahasiswa};
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

    public function show(SprintReport $sprints, $idproject)
    {
        $project = Project::findOrFail($idproject);
        return view('laporan.sprint.show', compact('sprints', 'project'));
    }

    public function create(Request $request, $idproject)
    {
        $project = Project::findOrFail($idproject);
        $sprints = Sprint::with('project')->where('project_id', $idproject)->get();
        $mahasiswa = Mahasiswa::pluck('nama', 'id')->toArray();
        return view('laporan.sprint.create', compact('project', 'mahasiswa', 'sprints'));
    }

    public function store(Request $request, $idproject)
    {
        $project = Project::findOrFail($idproject);
        $data = SprintReport::create([
            'sprint_id' => $request->sprint_id,
            'mahasiswa_id' => $request->mahasiswa_id,
            'keterangan' => $request->keterangan
        ]);
        return redirect()->route('laporan.sprint.index', $project->id);
    }

    public function edit($idsprint, $idproject)
    {
        $project = SprintReport::findOrFail($idproject);
        $report = SprintReport::findOrFail($idsprint);
        $sprints = Sprint::pluck('nama', 'id')->toArray();
        $mahasiswa = Mahasiswa::pluck('nama', 'id');
        return view('laporan.sprint.edit', compact('project', 'report', 'sprints', 'mahasiswa'));
    }

    public function update(Request $request, $idsprint, $idproject)
    {
        $project = Project::findOrFail($idproject);
        $data = SprintReport::findOrFail($idsprint);
        $data->update($request->all());
        return redirect()->route('laporan.sprint.index', $project->id);
    }

    public function destroy(SprintReport $sprints)
    {
        $sprints->delete();
        return redirect()->back();
    }
}
