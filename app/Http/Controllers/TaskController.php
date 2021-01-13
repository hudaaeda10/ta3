<?php

namespace App\Http\Controllers;

use App\{Sprint, Task, member_team, User, Team, Project};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{

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
            // 'tanggal_mulai' => 'required',
            // 'tanggal-selesai' => 'required'
        ]);

        Task::create([
            'sprint_id' => $request->sprint_id,
            'mahasiswa' => $request->mahasiswa,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'status' => false,
            'bobot' => $request->bobot,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
        ]);
        session()->flash('success', 'Task Telah Dibuat');
        return redirect()->route('sprint.index', [$project, $sprint]);
    }

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

    public function update(Request $request, $idproject, $idsprint, $idtask)
    {
        $project = Project::findOrFail($idproject);
        $sprint = Sprint::findOrFail($idsprint);
        $this->validate($request, [
            'sprint_id' => 'required',
            'mahasiswa' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required',
            // 'tanggal_mulai' => 'required',
            // 'tanggal_selesai' => 'required'
        ]);

        $data = Task::find($idtask);
        $data->update($request->all());
        session()->flash('success', 'Task Telah di Update');
        return redirect()->route('sprint.index', [$project, $sprint]);
    }

    public function status($id)
    {
        $task = Task::findOrFail($id);

        if ($task->status == true) {
            $ganti  = false;
        } else {
            $ganti = true;
        }
        Task::where('id', $id)->update(['status' => $ganti]);
        return redirect()->back();
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->back();
    }
}
