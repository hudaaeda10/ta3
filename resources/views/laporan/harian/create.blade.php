@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Buat Laporan Harian : {{ $sprint->project->nama}} | {{ $sprint->nama}}</h1>
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Laporan Harian Baru </h4>
                <div class="card-header-action">
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('harian.store')}}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="sprint_id">Judul Sprint</label>
                        <select name="sprint_id" id="sprint_id" class="form-control form-control-lg">
                            <option value="{{ $sprint->id }}">{{ $sprint->nama }}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="mahasiswa_id">Nama Mahasiswa</label>
                        <select name="mahasiswa_id" id="task" class="form-control form-control-lg">
                            @foreach($mahasiswa as $key => $name)
                            <option value="{{ $key }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tugas">Task yang dilaporkan</label>
                        <div class="form-check">
                            @foreach($tasks as $task)
                            <input name="tugas[]" class="form-check-input" type="checkbox" value="{{ $task->nama}}">
                            <label class="form-check-label" for="tugas">
                                {{ $task->nama }}
                            </label><br>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" class="form-control" id="keterangan" rows="3"></textarea>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop