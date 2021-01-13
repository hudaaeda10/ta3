@extends('layouts.master')

@push('header')
<link rel="stylesheet" href="/admin/assets/modules/bootstrap-daterangepicker/daterangepicker.css">
@endpush

@section('content')
<div class="section-header">
    <div class="section-header-back">
        <a href="{{ route('sprint.index', [$project->id,$sprint->id]) }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>Edit Task</h1>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>{{ $task->nama }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('task.update', [$project->id,$sprint->id,$task->id]) }}" method="post">
                    {{ csrf_field() }}
                    @method('put')

                    <div class="form-group">
                        <label for="sprint_id">Judul Sprint</label>
                        <select name="sprint_id" id="task" class="form-control form-control-lg">
                            @foreach($tugass as $tugas)
                            <option {{ $tugas->id == $sprint->id ? 'selected' : ''}} value="{{ $tugas->id }}">{{ $tugas->nama }}</option>
                            @endforeach
                        </select>
                        @error('sprint_id')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="mahasiswa">Nama Mahasiswa</label>
                        <select name="mahasiswa" id="task" class="form-control form-control-lg">
                            @foreach($mahasiswa as $name)
                            <option {{ $name->mahasiswa->nama == $task->mahasiswa ? 'selected' : '' }} value="{{ $name->mahasiswa->nama }}">{{ $name->mahasiswa->nama }}</option>
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
                        <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" rows="3">{{ $task->deskripsi }}</textarea>
                        @error('deskripsi')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
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

                    <div class="form-group">
                        <label for="tanggal_mulai">Tanggal Mulai</label>
                        <input name="tanggal_mulai" type="text" class="form-control datepicker" value={{$task->tanggal_mulai}}>
                        @error('tanggal_mulai')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tanggal_selesai">Tanggal Selesai</label>
                        <input name="tanggal_selesai" type="text" class="form-control datepicker" value={{$task->tanggal_selesai}}>
                        @error('tanggal_selesai')
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


@push('footermiddle')
<script src="/admin/assets/modules/cleave-js/dist/cleave.min.js"></script>
<script src="/admin/assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
@endpush