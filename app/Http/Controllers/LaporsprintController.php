<?php

namespace App\Http\Controllers;

use App\{Project, Sprint, SprintReport, Mahasiswa, SprintReview};
use Illuminate\Http\Request;

class LaporsprintController extends Controller
{
    public function index($idproject)
    {
        $project = Project::findOrFail($idproject);
        $sprints = SprintReport::with('project')->where('project_id', $idproject)->get();
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
        $this->validate($request, [
            'sprint_id' => 'required',
            'mahasiswa_id' => 'required',
        ]);

        $project = Project::findOrFail($idproject);
        $data = SprintReport::create([
            'project_id' => $idproject,
            'sprint_id' => $request->sprint_id,
            'mahasiswa_id' => $request->mahasiswa_id,
            'keterangan' => $request->keterangan
        ]);
        session()->flash('success', 'Laporan Sprint Telah Dibuat');
        return redirect()->route('laporan.sprint.index', $project->id);
    }

    public function edit($idsprint, $idproject)
    {
        $project = Project::findOrFail($idproject);
        $report = SprintReport::findOrFail($idsprint);
        $sprints = Sprint::with('project')->where('project_id', $idproject)->get();
        $mahasiswa = Mahasiswa::pluck('nama', 'id');
        // dd($valueselected);
        return view('laporan.sprint.edit', compact('report', 'project', 'sprints', 'mahasiswa'));
    }

    public function update(Request $request, $idreport, $idproject)
    {
        $project = Project::findOrFail($idproject);
        $data = SprintReport::findOrFail($idreport);
        $data->update($request->all());
        session()->flash('success', 'Laporan Sprint Telah Di Edit');
        return redirect()->route('laporan.sprint.index', $project->id);
    }

    public function destroy(SprintReport $sprints)
    {
        $sprints->delete();
        return redirect()->back();
    }

    public function feedback(Request $request, $idsprint)
    {
        $this->validate($request, [
            'review' => 'required',
        ]);

        SprintReview::create([
            'sprint_report_id' => $idsprint,
            'review' => $request->review,
        ]);
        return redirect()->back();
    }
}
