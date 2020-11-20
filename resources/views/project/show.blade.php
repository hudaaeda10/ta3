@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>List Sprint</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ route('project') }}">Project</a></div>
        <div class="breadcrumb-item active"><a href="{{ route('project.index', $project->id) }}">Sprint</a></div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4> Sprint Project {{ $project->nama }} </h4>
                <div class="card-header-action">
                    <a href="{{ route('laporan.sprint.index', $project->id)}}" class="btn btn-primary">Laporan Sprint <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
            <div class="card-body">
                @foreach($sprints as $sprint)
                <a href="{{ route('sprint.index', [$project->id, $sprint->id])}}" class="btn btn-lg btn-primary col-md-12">{{ $sprint->nama}}</a>
                <br><br><br>
                @endforeach
            </div>
        </div>
    </div>
</div>
@stop