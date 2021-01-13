@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Project</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('project') }}">Project</a></div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4> List Projects Link-Match</h4>
            </div>
            <div class="card-body">
                @foreach($projects as $project)
                <a href="{{ route('project.index', $project->id)}} " class="btn btn-icon icon-left btn-primary col-md-12"><i class="far fa-edit"></i> {{ $project->nama }}</a>
                <br><br><br>
                @endforeach
            </div>
        </div>
    </div>
</div>
@stop