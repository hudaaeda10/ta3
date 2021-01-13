@extends('layouts.master')

@section('content')
<div class="section-header">
    <div class="section-header-back">
        <a href="{{ route('harian.index', [$project->id,$sprint->id]) }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>Edit Laporan</h1>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Laporan Harian</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('harian.update', [$project->id, $sprint->id, $daily->id]) }}" method="post">
                    {{ csrf_field() }}
                    @method('PUT')

                    <div class="form-group">
                        <label for="sprint_id">Judul Sprint</label>
                        <select name="sprint_id" id="sprint" class="form-control form-control-lg">
                            @foreach($tugass as $tugas)
                            <option {{ $tugas->id == $sprint->id ? 'selected' : ''}} value="{{ $tugas->id }}">{{ $tugas->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tugas">Task yang dilaporkan</label>
                        <select name="tugas" id="tugas" class="form-control form-control-lg">
                            @foreach($tasks as $task)
                            @if($daily->tugas == $task->nama)
                            <option selected value="{{$daily->tugas}}">{{ $daily->tugas}}</option>
                            @else
                            <option value="{{$task->nama}}">{{ $task->nama}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" class="form-control" id="keterangan" rows="3">{{ $daily->keterangan}}</textarea>
                        @error('keterangan')
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
@stop