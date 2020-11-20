<?php

namespace App\Http\Controllers;

use App\{Sprint, dailyReport, Mahasiswa, Task, Project};
use Illuminate\Http\Request;

class HarianController extends Controller
{
    public function index($idproject, $idsprint)
    {
        $project = Project::findOrFail($idproject);
        $sprint = Sprint::findOrFail($idsprint);
        $dailys = dailyReport::with('sprint')->where('sprint_id', $idsprint)->get();
        return view('laporan.harian.index', compact('sprint', 'dailys', 'project'));
    }

    public function show($idproject, $idsprint, $iddaily)
    {
        $project = Project::findOrFail($idproject);
        $sprint = Sprint::findOrFail($idsprint);
        $daily = DailyReport::findOrFail($iddaily);
        return view('laporan.harian.show', compact('daily', 'project', 'sprint'));
    }

    public function create($idproject, $idsprint)
    {
        $project = Project::findOrFail($idproject);
        $sprint = Sprint::findOrFail($idsprint);
        $mahasiswa = Mahasiswa::pluck('nama', 'id')->toArray();
        $tasks = Task::with('sprint')->where('sprint_id', $idsprint)->get();
        return view('laporan.harian.create', compact('sprint', 'mahasiswa', 'tasks', 'project'));
    }

    public function store(Request $request, $idproject, $idsprint)
    {
        $project = Project::findOrFail($idproject);
        $sprint = Sprint::findOrFail($idsprint);
        $this->validate($request, [
            'sprint_id' => 'required',
            'mahasiswa_id' => 'required',
            'keterangan' => 'required',
            'tugas' => 'required'
        ]);

        dailyReport::create([
            'sprint_id' => $request->sprint_id,
            'mahasiswa_id' => $request->mahasiswa_id,
            'keterangan' => $request->keterangan,
            'tugas' => $request->tugas,
        ]);
        session()->flash('success', 'Laporan Harian Telah Dibuat');
        return redirect()->route('harian.index', [$project, $sprint]);
    }

    public function edit($idproject, $idsprint, $iddaily)
    {
        $project = Project::findOrFail($idproject);
        $sprint = Sprint::findOrFail($idsprint);
        $tugass = Sprint::with('project')->where('project_id', $idproject)->get();
        $mahasiswa = Mahasiswa::pluck('nama', 'id')->toArray();
        $tasks = Task::with('sprint')->where('sprint_id', $idsprint)->get();
        $daily = dailyReport::find($iddaily);
        return view('laporan.harian.edit', compact('mahasiswa', 'tasks', 'daily', 'sprint', 'project', 'tugass'));
    }

    public function update(Request $request, $idproject, $idsprint, $iddaily)
    {
        $project = Project::findOrFail($idproject);
        $sprint = Sprint::findOrFail($idsprint);
        $data = dailyReport::find($iddaily);
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
