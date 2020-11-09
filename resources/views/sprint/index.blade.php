@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>List Sprint</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ route('project') }}">Project</a></div>
        <div class="breadcrumb-item active"><a href="#">Sprint</a></div>
        <div class="breadcrumb-item active"><a href="{{ route('sprint.index', $sprint->id) }}">List Sprint</a></div>
    </div>
</div>

@include('layouts.alert')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>{{ $sprint->nama }} - Task</h4>
                <div class="card-header-form">
                    <form>
                        <div class="input-group">
                            <div class="group-btn">
                                <a href="{{route('harian.index', $sprint->id)}}" class="btn btn-warning">Laporan Harian </a>
                                <a href="{{ route('task.create', $sprint->id)}}" class="btn btn-primary">Tambah Task</a>
                            </div>
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-btn">
                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="{{ $percent }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $percent }}%">{{ $percent}}%</div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <tbody>
                            <tr>
                                <th>No</th>
                                <th>Nama Task</th>
                                <th>Deskripsi</th>
                                <th>Status</th>
                                <th>Bobot</th>
                                <th>Mahasiswa</th>
                                <th>Peran</th>
                                <th>Action</th>
                            </tr>
                            @php $no = 1; @endphp
                            @foreach($tasks as $task)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $task->nama}}</td>
                                <td>{{ $task->deskripsi }}</td>
                                <td>
                                    @if ($task->status == 0)
                                    <span class="badge badge-warning">Belum divalidasi</span>
                                    @elseif ($task->status == 1)
                                    <div class="badge badge-success">Validasi Sukses</div>
                                    @endif
                                </td>
                                <td>{{ $task->bobot }}</td>
                                <td>{{ $task->mahasiswa->nama}}</td>
                                <td>{{ $task->mahasiswa->peran}}</td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <a href="{{ route('task.edit', [$sprint->id, $task->id]) }}" class="btn btn-warning">Edit</a>
                                    <a href="#" data-id="{{ $task->id }}" task-nama="{{ $task->nama }}" class="btn btn-danger swal-confirm">
                                        <form action="{{ route('task.destroy', $task->id) }}" id="delete{{ $task->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                        </form>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@stop


@push('footermiddle')
<script src="/admin/assets/modules/sweetalert/sweetalert.min.js"></script>
<script src="/admin/assets/js/page/modules-sweetalert.js"></script>
@endpush

@push('after-scripts')
<script>
    $(".swal-confirm").click(function(e) {
        id = e.target.dataset.id;
        var task_nama = $(this).attr('task-nama');
        swal({
                title: 'Yakin Ingin Menghapus?',
                text: 'Mau dihapus task dengan nama ' + task_nama + '??',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal('Poof! Your imaginary file has been deleted!', {
                        icon: 'success',
                    });
                    $(`#delete${id}`).submit();
                } else {
                    swal('Your imaginary file is safe!');
                }
            });
    });
</script>
@endpush