@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Tambah Task</h1>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Task Baru </h4>
                <div class="card-header-action">
                    <a href="{{ route('sprint.index', [$project->id, $sprint->id]) }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('task.store',[$project->id,$sprint->id]) }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="sprint_id">Judul Sprint</label>
                        <select name="sprint_id" id="task" class="form-control form-control-lg">
                            <option value="{{ $sprint->id }}">{{ $sprint->nama }}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="mahasiswa">Nama Mahasiswa</label>
                        <select name="mahasiswa" id="task" class="form-control form-control-lg @error('mahasiswa') is-invalid @enderror">
                            <option selected disabled>Pilih Nama Mahasiswa</option>
                            @foreach($mahasiswa as $name)
                            <option value="{{ $name->mahasiswa->nama }}">{{ $name->mahasiswa->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Task</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama Task" value="{{ old('$task->nama') }}">
                        @error('nama')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="bobot">Bobot Task</label>
                        <select name="bobot" id="bobot" class="form-control" name="bobot" id="bobot">
                            <option selected disabled>Pilih Bobot</option>
                            @foreach($bobots as $bobot)
                            <option value="{{ $bobot}}">{{ $bobot }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

@stop