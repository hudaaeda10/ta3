@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Buat Laporan Sprint</h1>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Laporan Sprint Baru </h4>
                <div class="card-header-action">
                    <a href="{{ route('laporan.sprint.index', $project->id) }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('laporan.sprint.store', $project->id) }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="sprint_id">Judul Sprint</label>
                        <select name="sprint_id" id="sprint_id" class="form-control form-control-lg">
                            <option disable selected> Pilih Sprint </option>
                            @foreach($sprints as $sprint)
                            <option value="{{ $sprint->id }}">{{ $sprint->nama }}</option>
                            @endforeach
                        </select>
                        @error('sprint_id')
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
@endpush