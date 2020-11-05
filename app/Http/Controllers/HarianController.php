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
        dailyReport::create([
            'sprint_id' => $request->sprint_id,
            'mahasiswa_id' => $request->mahasiswa_id,
            'keterangan' => $request->keterangan,
        ]);
        return redirect()->route('harian.index', $request->sprint_id);
    }

    public function edit($idsprint, $iddaily)
    {
        $mahasiswa = Mahasiswa::pluck('nama', 'id')->toArray();
        $tasks = Task::with('sprint')->where('sprint_id', $idsprint)->get();
        $daily = dailyReport::find($iddaily);
        return view('laporan.harian.edit', compact('mahasiswa', 'tasks', 'daily'));
    }

    public function destroy(dailyReport $daily)
    {
        $daily->delete();
        return redirect()->back();
    }
}
