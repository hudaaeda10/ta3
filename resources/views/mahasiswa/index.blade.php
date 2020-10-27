@extends('layouts.master')

@section('content')

<div class="panel panel-headline">
    <div class="panel-heading">
        <h3 class="panel-title">List Project Link and Match</h3>
        <p class="panel-subtitle">Judul Masing-Masing Proyek</p>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                @foreach($projects as $project)
                <a href="/project/{{ $project->id }}" class="btn btn-lg btn-primary btn-block">{{ $project->nama}}</a>
                <br>
                <br>
                @endforeach
            </div>
        </div>
    </div>

    @stop