@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Edit Laporan Sprint</h1>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Laporan Sprint </h4>
                <div class="card-header-action">
                    <a href="{{ route('laporan.sprint.index', $project->id) }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('laporan.sprint.update', [$report->id, $project->id])}}" method="post">
                    {{ csrf_field() }}
                    @method('PUT')

                    <div class="form-group">
                        <label for="sprint_id">Judul Sprint</label>
                        <select name="sprint_id" id="task" class="form-control form-control-lg">
                            @foreach($sprints as $key => $lastname)
                            @if($report->sprint->nama == $lastname)
                            <option selected value="{{ $key }}">{{ $report->sprint->nama }}</option>
                            @else
                            <option value="{{ $key }}">{{ $lastname }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="mahasiswa_id">Nama Mahasiswa</label>
                        <select name="mahasiswa_id" id="task" class="form-control form-control-lg">
                            @foreach($mahasiswa as $key => $name)
                            @if($report->mahasiswa->nama == $name)
                            <option value="{{ $key }}">{{ $report->mahasiswa->nama }}</option>
                            @else
                            <option value="{{ $key }}">{{ $name }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" class="summernote form-control" id="keterangan" rows="3">{!! $report->keterangan !!}</textarea>
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