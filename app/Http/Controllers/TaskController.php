<?php

namespace App\Http\Controllers;

use App\{Sprint, Task, member_team, User, Team, Project};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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
    public function create($idproject, $idsprint)
    {
        if (Gate::allows('isMahasiswa')) {
            $project = Project::findOrFail($idproject);
            $sprint = Sprint::findOrFail($idsprint);
            $team = Team::where('projects_id', $idproject)->first();
            // dd($team->id);
            $mahasiswa = member_team::where('team_id', $team->id)->get();
            $bobots = ['1', '3', '5', '7', '11'];
            // dd($mahasiswa);
            return view('task.create', compact('sprint', 'bobots', 'mahasiswa', 'project'));
        } else {
            return abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $idproject, $idsprint)
    {
        $project = Project::findOrFail($idproject);
        $sprint = Sprint::findOrFail($idsprint);
        $this->validate($request, [
            'sprint_id' => 'required',
            'mahasiswa' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required',
            'bobot' => 'required',
        ]);

        Task::create([
            'sprint_id' => $request->sprint_id,
            'mahasiswa' => $request->mahasiswa,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'status' => false,
            'bobot' => $request->bobot,
        ]);
        session()->flash('success', 'Task Telah Dibuat');
        return redirect()->route('sprint.index', [$project, $sprint]);
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
    public function edit($idproject, $idsprint, $idtask)
    {
        if (Gate::allows('isMahasiswa')) {
            $project = Project::findOrFail($idproject);
            $sprint = Sprint::findOrFail($idsprint);
            $tugass = Sprint::with('project')->where('project_id', $idproject)->get();
            $team = Team::where('projects_id', $idproject)->first();
            $mahasiswa = member_team::where('team_id', $team->id)->get();
            $task = Task::find($idtask);
            $bobots = ['1', '3', '5', '7', '11'];

            return view('task.edit', compact('tugass', 'task', 'bobots', 'mahasiswa', 'sprint', 'project'));
        } else {
            return abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idproject, $idsprint, $idtask)
    {
        $project = Project::findOrFail($idproject);
        $sprint = Sprint::findOrFail($idsprint);
        $this->validate($request, [
            'sprint_id' => 'required',
            'mahasiswa' => 'required',
            'nama' => 'required',
        ]);

        $data = Task::find($idtask);
        $data->update($request->all());
        session()->flash('success', 'Task Telah di Update');
        return redirect()->route('sprint.index', [$project, $sprint]);
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
