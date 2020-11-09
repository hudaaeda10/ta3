<?php

namespace App\Http\Controllers;

use App\{Sprint, dailyReport, Mahasiswa, Task};
use Illuminate\Http\Request;

class HarianController extends Controller
{
    public function index($idsprint)
    {
        $sprint = Sprint::findOrFail($idsprint);
        $dailys = dailyReport::with('sprint')->where('sprint_id', $idsprint)->get();
        return view('laporan.harian.index', compact('sprint', 'dailys'));
    }

    public function show(dailyReport $daily)
    {
        return view('laporan.harian.show', compact('daily'));
    }

    public function create($idsprint)
    {
        $sprint = Sprint::findOrFail($idsprint);
        $mahasiswa = Mahasiswa::pluck('nama', 'id')->toArray();
        $tasks = Task::with('sprint')->where('sprint_id', $idsprint)->get();
        return view('laporan.harian.create', compact('sprint', 'mahasiswa', 'tasks'));
    }

    public function store(Request $request)
    {
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
        return redirect()->route('harian.index', $request->sprint_id);
    }

    public function edit($idsprint, $iddaily)
    {
        $tugas = Sprint::pluck('nama', 'id')->toArray();
        $sprint = Sprint::findOrFail($idsprint);
        $mahasiswa = Mahasiswa::pluck('nama', 'id')->toArray();
        $tasks = Task::with('sprint')->where('sprint_id', $idsprint)->get();
        $daily = dailyReport::find($iddaily);

        return view('laporan.harian.edit', compact('mahasiswa', 'tasks', 'daily', 'sprint', 'tugas'));
    }

    public function update(Request $request, $iddaily)
    {
        $data = dailyReport::find($iddaily);
        $data->update($request->all());
        session()->flash('success', 'Laporan Harian Telah Diedit');
        return redirect()->route('harian.index', $request->sprint_id);
    }

    public function destroy(dailyReport $daily)
    {
        $daily->delete();
        return redirect()->back();
    }
}
