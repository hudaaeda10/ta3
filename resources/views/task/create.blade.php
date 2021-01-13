@extends('layouts.master')

@push('header')
<link rel="stylesheet" href="/admin/assets/modules/bootstrap-daterangepicker/daterangepicker.css">
@endpush

@section('content')
<div class="section-header">
    <div class="section-header-back">
        <a href="{{ route('sprint.index', [$project->id, $sprint->id]) }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>Tambah Task</h1>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Task Baru </h4>
            </div>
            <div class="card-body">
                <form action="{{ route('task.store',[$project->id,$sprint->id]) }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="sprint_id">Judul Sprint</label>
                        <select name="sprint_id" class="form-control form-control-lg">
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
                        @error('deskripsi')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="bobot">Bobot Task</label>
                        <select name="bobot" id="bobot" class="form-control" name="bobot" id="bobot">
                            <option selected disabled>Pilih Bobot</option>
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
                        <input name="tanggal_mulai" type="text" class="form-control datepicker">
                        @error('tanggal_mulai')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tanggal_selesai">Tanggal Selesai</label>
                        <input name="tanggal_selesai" type="text" class="form-control datepicker">
                        @error('tanggal_selesai')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
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


@push('footermiddle')
<script src="/admin/assets/modules/cleave-js/dist/cleave.min.js"></script>
<script src="/admin/assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
@endpush