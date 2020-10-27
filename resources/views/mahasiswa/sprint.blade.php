@extends('layouts.master')

@section('content')

<div class="col-md-12">
    <!-- BASIC TABLE -->
    <div class="panel">
        <div class="panel-heading">
            <h2>{{ $sprints->nama }}</h2>
            <h3 class="panel-title">Waktu Sprint: {{ $sprints->tanggal_mulai}} sampai {{ $sprints->tanggal_selesai }}</h3> <br>
            <a href="{{route('task.store')}}" class="btn btn-primary">Tambah Task</a>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Bobot</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($sprints->tasks as $task)
                    <tr>
                        <td>{{$no++ }}</td>
                        <td>{{ $task->nama }}</td>
                        <td>{{ $task->deskripsi }}</td>
                        <td>{{ $task->bobot }}</td>
                        <td>
                            <a href="#" class="btn btn-warning"> Edit </a>
                            <a href="#" class="btn btn-danger"> Delete </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- END BASIC TABLE -->
</div>

@stop