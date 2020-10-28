@extends('layouts.master')

@section('content')

<div class="col-md-12">
    <!-- BASIC TABLE -->
    <div class="panel">
        <div class="panel-heading">
            <h2>{{ $sprint->nama }}</h2>
            <h3 class="panel-title">Waktu Sprint: {{ $sprint->tanggal_mulai}} sampai {{ $sprint->tanggal_selesai }}</h3> <br>
            <!-- Button trigger modal -->
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahtask">
            Tambah Task
        </button>
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
                    @foreach($sprint->tasks as $task)
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
    <!-- Modal -->
    <div class="modal fade" id="tambahtask" tabindex="-1" aria-labelledby="tambahtaskLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahtaskLabel">Form Task {{ $sprint->nama }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/student/store" method="post" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="sprint">sprint</label>
                                <select name="sprint" id="sprint" class="form-control">
                                    <option disabled selected>Choose One!</option>
                                    @foreach($sprints as $sprint)
                                    <option value="{{ $sprint->id }}">{{ $sprint->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="nama">Nama Task</label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama">
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Task</label>
                                <input type="text" name="deskripsi" class="form-control" id="deskripsi">
                            </div>

                            <div class="form-group">
                                <label>Nilai Bobot Task </label>
                                <select name="bobot" id="bobot" class="form-control">
                                    <option disabled selected>Pilih Bobot</option>
                                    <option value="1">1</option>
                                    <option value="3">3</option>
                                    <option value="5">5</option>
                                    <option value="7">7</option>
                                    <option value="11">11</option>
                                </select>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop