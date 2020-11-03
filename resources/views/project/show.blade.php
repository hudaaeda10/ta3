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
                @foreach($sprints as $sprint)
                <a href="{{ route('sprint.index', $sprint->id)}}" class="btn btn-primary">{{ $sprint->nama}}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@stop