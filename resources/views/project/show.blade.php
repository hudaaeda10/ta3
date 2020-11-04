@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>List Sprint</h1>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4> Sprint Pada Prokect:</h4>
                <div class="card-header-action">
                    <a href="#" class="btn btn-primary">Buat Laporan Sprint <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
            <div class="card-body">
                @foreach($sprints as $sprint)
                <a href="{{ route('sprint.index', $sprint->id)}}" class="btn btn-lg btn-primary col-md-12">{{ $sprint->nama}}</a>
                <br><br><br>
                @endforeach
            </div>
        </div>
    </div>
</div>
@stop