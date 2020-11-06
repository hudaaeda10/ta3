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

        $this->validate($request, [
            'sprint_id' => 'required',
            'mahasiswa_id' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required',
            'bobot' => 'required',
        ]);

        Task::create([
            'sprint_id' => $request->sprint_id,
            'mahasiswa_id' => $request->mahasiswa_id,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'status' => false,
            'bobot' => $request->bobot,
        ]);
        session()->flash('success', 'Task Telah Dibuat');
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
    public function edit($idsprint, $idtask)
    {
        $sprint = Sprint::findOrFail($idsprint);
        $tugas = Sprint::pluck('nama', 'id')->toArray();
        $mahasiswa = Mahasiswa::pluck('nama', 'id')->toArray();
        $task = Task::find($idtask);
        $bobots = ['1', '3', '5', '7', '11'];
        return view('task.edit', compact('tugas', 'task', 'bobots', 'mahasiswa', 'sprint'));
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
        $this->validate($request, [
            'sprint_id' => 'required',
            'mahasiswa_id' => 'required',
            'nama' => 'required',
        ]);

        $data = Task::find($id);
        $data->update($request->all());
        session()->flash('success', 'Task Telah di Update');
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
