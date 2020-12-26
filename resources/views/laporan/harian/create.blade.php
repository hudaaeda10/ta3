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
                    <a href="{{ route('harian.index', [$project->id, $sprint->id]) }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('harian.store',[$project->id,$sprint->id]) }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="sprint_id">Judul Sprint</label>
                        <select name="sprint_id" id="sprint_id" class="form-control form-control-lg">
                            <option value="{{ $sprint->id }}">{{ $sprint->nama }}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="mahasiswa">Nama Mahasiswa</label>
                        <input name="mahasiswa" type="text" class="form-control" value="{{$mahasiswa}}" disabled>
                    </div>

                    <div class="form-group">
                        <label for="tugas">Task yang dilaporkan</label>
                        <select name="tugas" class="form-control">
                            <option selected disabled>Pilih Satu Task</option>
                            @foreach($tasks as $task)
                            <option value="{{ $task->nama}}">{{ $task->nama }}</option>
                            @endforeach
                        </select>
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