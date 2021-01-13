@extends('layouts.master')

@section('content')
<div class="section-header">
    <div class="section-header-back">
        <a href="{{ route('project.index', $project->id) }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>Laporan Sprint</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ route('project') }}">Project</a></div>
        <div class="breadcrumb-item active"><a href="{{ route('project.index', $project->id) }}">Sprint</a></div>
        <div class="breadcrumb-item active"><a href="#">Laporan Sprint</a></div>
    </div>
</div>

@include('layouts.alert')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="d-inline">Project {{ $project->nama }}</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <tbody>
                            <tr>
                                <th>Nama Sprint</th>
                                <th>Nama Mahasiswa</th>
                                <th>Tugas Yang dilaporkan</th>
                                <th>Waktu Laporan</th>
                                <th>Action</th>
                            </tr>
                            @foreach($sprints as $sprint)
                            <tr>
                                <td>{{ $sprint->sprint->nama }}</td>
                                <td>{{ $sprint->mahasiswa}}</td>
                                <td>
                                    <ul>
                                        @foreach(explode(',', $sprint->tugas) as $task)
                                        <li>{{ $task }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>{{ $sprint->created_at->format('d-M-Y H:i') }}</td>
                                <td>
                                    <a href="{{route('laporan.sprint.show', [$sprint->id, $project->id]) }}" class="btn btn-primary">Details</a>
                                    @can('isMahasiswa')
                                    <a href="{{ route('laporan.sprint.edit', [$sprint->id, $project->id, $sprint->sprint_id]) }}" class="btn btn-warning">Edit</a>
                                    <a href="#" data-id="{{ $sprint->id }}" sprint-nama="{{ $sprint->created_at }}" class="btn btn-danger swal-confirm">
                                        <form action="{{ route('laporan.sprint.destroy', $sprint->id) }}" id="delete{{ $sprint->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                        </form>
                                        Delete
                                    </a>
                                    @endcan
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
        var sprint_nama = $(this).attr('sprint-nama');
        swal({
                title: 'Yakin Ingin Menghapus Laporan Sprint?',
                text: 'Mau dihapus Laporan di tanggal ' + sprint_nama + '??',
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