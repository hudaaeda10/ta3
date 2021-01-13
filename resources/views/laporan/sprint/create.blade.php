@extends('layouts.master')

@push('header')
<link rel="stylesheet" href="/admin/assets/modules/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="/admin/assets/modules/select2/dist/css/select2.min.css">
@endpush

@section('content')
<div class="section-header">
    <div class="section-header-back">
        <a href="{{ route('laporan.sprint.index', $project->id) }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>Buat Laporan Sprint</h1>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Laporan Sprint Baru </h4>
            </div>
            <div class="card-body">
                <form action="{{ route('laporan.sprint.store', $project->id) }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="sprint_id">Judul Sprint</label>
                        <select name="sprint_id" id="sprint_id" class="form-control form-control-lg">
                            <option value="{{ $sprint->id }}">{{ $sprint->nama }}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tugas">Task yang dilaporkan</label>
                        <select name="tugas[]" class="form-control select2" multiple="">
                            @foreach($tasks as $task)
                            <option value="{{$task->nama}}">{{ $task->nama }}</option>
                            @endforeach
                        </select>
                        @error('tugas')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="mahasiswa_id">Nama Mahasiswa</label>
                        <input name="mahasiswa" type="text" class="form-control" value="{{$mahasiswa}}" disabled>
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" class=" summernote form-control " id="keterangan" rows="3"></textarea>
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

@push('footermiddle')
<script src="/admin/assets/modules/summernote/summernote-bs4.js"></script>
<script src="/admin/assets/modules/select2/dist/js/select2.full.min.js"></script>
@endpush