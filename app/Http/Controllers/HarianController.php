<?php

namespace App\Http\Controllers;

use App\{Sprint, dailyReport, Task, Project};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class HarianController extends Controller
{
    public function index($idproject, $idsprint)
    {
        if (Gate::any(['isMahasiswa', 'isScrumMater'])) {
            $project = Project::findOrFail($idproject);
            $sprint = Sprint::findOrFail($idsprint);
            $dailys = dailyReport::with('sprint')->where('sprint_id', $idsprint)->get();
            return view('laporan.harian.index', compact('sprint', 'dailys', 'project'));
        } else {
            return abort(404);
        }
    }

    public function show($idproject, $idsprint, $iddaily)
    {
        if (Gate::any(['isMahasiswa', 'isScrumMater'])) {
            $project = Project::findOrFail($idproject);
            $sprint = Sprint::findOrFail($idsprint);
            $daily = DailyReport::findOrFail($iddaily);
            return view('laporan.harian.show', compact('daily', 'project', 'sprint'));
        } else {
            return abort(404);
        }
    }

    public function create($idproject, $idsprint)
    {
        if (Gate::allows('isMahasiswa')) {
            $project = Project::findOrFail($idproject);
            $sprint = Sprint::findOrFail($idsprint);
            $mahasiswa = Auth::user()->nama;
            $tasks = Task::with('sprint')->where('sprint_id', $idsprint)->get();
            return view('laporan.harian.create', compact('sprint', 'mahasiswa', 'tasks', 'project'));
        } else {
            return abort(404);
        }
    }

    public function store(Request $request, $idproject, $idsprint)
    {
        $project = Project::findOrFail($idproject);
        $sprint = Sprint::findOrFail($idsprint);
        $this->validate($request, [
            'sprint_id' => 'required',
            'keterangan' => 'required',
            'tugas' => 'required',
        ]);

        $hasil = dailyReport::create([
            'sprint_id' => $request->sprint_id,
            'mahasiswa' => Auth::user()->nama,
            'keterangan' => $request->keterangan,
            'tugas' => $request->tugas,
        ]);
        session()->flash('success', 'Laporan Harian Telah Dibuat');
        return redirect()->route('harian.index', [$project, $sprint]);
    }

    public function edit($idproject, $idsprint, $iddaily)
    {
        if (Gate::allows('isMahasiswa')) {
            $project = Project::findOrFail($idproject);
            $sprint = Sprint::findOrFail($idsprint);
            $tugass = Sprint::with('project')->where('project_id', $idproject)->get();
            $tasks = Task::with('sprint')->where('sprint_id', $idsprint)->get();
            $daily = dailyReport::find($iddaily);
            return view('laporan.harian.edit', compact('tasks', 'daily', 'sprint', 'project', 'tugass'));
        } else {
            return abort(404);
        }
    }

    public function update(Request $request, $idproject, $idsprint, $iddaily)
    {
        $project = Project::findOrFail($idproject);
        $sprint = Sprint::findOrFail($idsprint);
        $data = dailyReport::find($iddaily);
        $this->validate($request, [
            'keterangan' => 'required',
        ]);
        $data->update($request->all());
        session()->flash('success', 'Laporan Harian Telah Diedit');
        return redirect()->route('harian.index', [$project, $sprint]);
    }

    public function destroy(dailyReport $daily)
    {
        $daily->delete();
        return redirect()->back();
    }
}
