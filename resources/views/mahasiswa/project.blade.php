@extends('layouts.master')

@section('content')


<div class="panel panel-headline">
    <div class="panel-heading">
        <h1>{{ $projects->nama }}</h1>
        <p class="panel-subtitle">Deadline Project : {{ $projects->tanggal_mulai }} Sampai {{ $projects->tanggal_selesai}}</p>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                @foreach($projects->sprints as $sprint)
                <a href="/sprint/{{ $projects->id}}/{{$sprint->id}}" class="btn btn-lg btn-primary btn-block">{{ $sprint->nama}}</a>
                <br>
                <br>
                @endforeach
            </div>
        </div>
    </div>


    @stop