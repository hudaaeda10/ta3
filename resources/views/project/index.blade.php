@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>List Project</h1>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h2> Project Program Link and Match</h2>
            </div>
            <div class="card-body">
                @foreach($projects as $project)
                <a href="{{ route('project.index', $project->id)}}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> {{ $project->nama }}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@stop