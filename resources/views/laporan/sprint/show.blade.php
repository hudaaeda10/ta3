@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Laporan Sprint </h1>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="d-inline">Details Laporan {{ $sprints->sprint->nama}}</h4>
                <div class="card-header-action">
                    <a href="{{ route('laporan.sprint.index', $project->id)}}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th scope="row">
                                    Tanggal Laporan
                                </th>
                                <td>
                                    <span class="h6 ">{{ $sprints->created_at->format('d-M-Y H:i:s') }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Nama Sprint
                                </th>
                                <td>
                                    <span class="h6">{{ $sprints->sprint->nama }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Nama Mahasiswa
                                </th>
                                <td>
                                    <span class="h6">{{ $sprints->mahasiswa }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Keterangan Laporan
                                </th>
                                <td>
                                    <span class="h6">{!! $sprints->keterangan !!}</span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Feedback Scrum Master
                                </th>
                                <td>
                                    <span class="h6">{!! $sprints->sprintreview->review !!}</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <form action="{{ route('laporan.sprint.feedback', $sprints->id) }}" method="post">
                <div class="form-group row mb-4">
                    <label for="review" class="col-form-label text-md-right col-md-1">Feedback</label>
                    <div class="col-md-6">
                        <textarea name="review" id="review" class="summernote-simple form-control"></textarea>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-md-1"></label>
                    <div class="col-md-6">
                        <button class="btn btn-primary">Publish</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@stop

@push('footermiddle')
<script src="/admin/assets/modules/summernote/summernote-bs4.js"></script>
@endpush