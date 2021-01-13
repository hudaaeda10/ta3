<?php

namespace App\Http\Controllers;

use App\{Project, Sprint, SprintReport, SprintReview, Task};

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class LaporsprintController extends Controller
{
    public function index($idproject)
    {
        if (Gate::any(['isMahasiswa', 'isScrumMater'])) {
            $project = Project::findOrFail($idproject);
            $sprints = SprintReport::with('project')->where('project_id', $idproject)->get();
            return view('laporan.sprint.index', compact('sprints', 'project'));
        } else {
            return abort(404);
        }
    }

    public function show(SprintReport $sprints, $idproject)
    {
        if (Gate::any(['isMahasiswa', 'isScrumMater'])) {
            $project = Project::findOrFail($idproject);
            return view('laporan.sprint.show', compact('sprints', 'project'));
        } else {
            return abort(404);
        }
    }

    public function create(Request $request, $idproject, $idsprint)
    {
        if (Gate::allows('isMahasiswa')) {
            $project = Project::findOrFail($idproject);
            $sprint = Sprint::findOrFail($idsprint);
            $mahasiswa = Auth::user()->nama;
            $tasks = Task::with('sprint')->where('sprint_id', $idsprint)->get();
            return view('laporan.sprint.create', compact('project', 'mahasiswa', 'sprint', 'tasks'));
        } else {
            return abort(404);
        }
    }

    public function store(Request $request, $idproject)
    {
        $this->validate($request, [
            'sprint_id' => 'required',
            'tugas' => 'required',
            'keterangan' => 'required',
        ]);

        $project = Project::findOrFail($idproject);
        $data = SprintReport::create([
            'project_id' => $idproject,
            'sprint_id' => $request->sprint_id,
            'mahasiswa' => Auth::user()->nama,
            'keterangan' => $request->keterangan,
            'tugas' => implode(',', $request->tugas),
        ]);
        session()->flash('success', 'Laporan Sprint Telah Dibuat');
        return redirect()->route('laporan.sprint.index', $project->id);
    }

    public function edit($idreport, $idproject, $idsprint)
    {
        if (Gate::allows('isMahasiswa')) {
            $project = Project::findOrFail($idproject);
            $report = SprintReport::findOrFail($idreport);
            $sprints = Sprint::with('project')->where('project_id', $idproject)->get();
            $tasks = Task::with('sprint')->where('sprint_id', $idsprint)->get();
            return view('laporan.sprint.edit', compact('report', 'project', 'sprints', 'tasks'));
        } else {
            return abort(404);
        }
    }

    public function update(Request $request, $idreport, $idproject)
    {
        $this->validate($request, [
            'keterangan' => 'required|min:20',
        ]);
        $project = Project::findOrFail($idproject);
        $data = SprintReport::findOrFail($idreport);
        $data->update($request->all());
        // dd($data);
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
