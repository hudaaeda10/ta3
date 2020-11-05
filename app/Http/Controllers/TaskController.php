<?php

namespace App\Http\Controllers;

use App\{Sprint, Task, Mahasiswa};
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $sprint = Sprint::find($id);
        // $task = Sprint::pluck('nama', 'id')->toArray();
        $mahasiswa = Mahasiswa::pluck('nama', 'id')->toArray();
        $bobots = ['1', '3', '5', '7', '11'];
        return view('task.create', compact('sprint', 'bobots', 'mahasiswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Task::create([
            'sprint_id' => $request->sprint_id,
            'mahasiswa_id' => $request->mahasiswa_id,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'status' => false,
            'bobot' => $request->bobot,
        ]);
        return redirect()->route('sprint.index', $request->sprint_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tugas = Sprint::pluck('nama', 'id')->toArray();
        $mahasiswa = Mahasiswa::pluck('nama', 'id')->toArray();
        $task = Task::find($id);
        $bobots = ['1', '3', '5', '7', '11'];

        return view('task.edit', compact('tugas', 'task', 'bobots', 'mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Task::find($id);
        $data->update($request->all());
        return redirect()->route('sprint.index', $request->sprint_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->back();
    }
}
