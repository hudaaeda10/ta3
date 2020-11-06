@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Edit Task</h1>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>{{ $task->nama }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('sprint.index', $sprint->id) }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('task.update', $task->id) }}" method="post">
                    {{ csrf_field() }}
                    @method('put')

                    <div class="form-group">
                        <label for="sprint_id">Nama Mahasiswa</label>
                        <select name="sprint_id" id="task" class="form-control form-control-lg">
                            @foreach($tugas as $key => $lastname)
                            @if($task->sprint->nama == $lastname)
                            <option selected value="{{ $key }}">{{ $task->sprint->nama }}</option>
                            @else
                            <option value="{{ $key }}">{{ $lastname }}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('sprint_id')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="mahasiswa_id">Judul Sprint</label>
                        <select name="mahasiswa_id" id="task" class="form-control form-control-lg">
                            @foreach($mahasiswa as $key => $name)
                            @if($task->mahasiswa->nama == $name)
                            <option selected value="{{ $key }}">{{ $task->mahasiswa->nama }}</option>
                            @else
                            <option value="{{ $key }}">{{ $name }}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('mahasiswa_id')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Task</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama Task" value="{{ $task->nama }}">
                        @error('nama')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" rows="3">{{ $task->deskripsi }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="bobot">Bobot Task</label>
                        <select class="form-control" name="bobot" id="bobot">
                            <option value="{{$task->bobot}}" selected disabled>{{ $task->bobot}}</option>
                            @foreach($bobots as $bobot)
                            <option value="{{ $bobot}}">{{ $bobot }}</option>
                            @endforeach
                        </select>
                        @error('bobot')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="card-footer">
                        <button class="btn btn-primary col-md-1">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

@stop