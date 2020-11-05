@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Edit Laporan</h1>
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
                <form action="#" method="post">
                    {{ csrf_field() }}
                    @method('put')

                    <div class="form-group">
                        <label for="mahasiswa_id">Nama Mahasiswa</label>
                        <select name="mahasiswa_id" id="task" class="form-control form-control-lg">
                            @foreach($mahasiswa as $key => $name)
                            @if($daily->mahasiswa->nama == $name)
                            <option value="{{ $key }}">{{ $daily->mahasiswa->nama }}</option>
                            @else
                            <option value="{{ $key }}">{{ $name }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tugas">Task yang dilaporkan</label>
                        <select name="tugas[]" id="tugas" class="form-control form-control-lg">
                            @foreach($tasks as $task)
                            <option selected value="{{$task->id}}">{{ $task->nama}}</option>
                            @endforeach

                            @foreach($tasks as $task)
                            <option value="{{$task->id}}">{{ $task->nama}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" class="form-control" id="keterangan" rows="3">{{ $daily->keterangan}}</textarea>
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