@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Laporan Sprint</h1>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="d-inline">Project {{ $project->nama }}</h4>
                <div class="card-header-action">
                    <a href="#" class="btn btn-primary">Tambah Laporan Sprint</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <tbody>
                            <tr>
                                <th>Nama Sprint</th>
                                <th>Nama Mahasiswa</th>
                                <th>Task Laporan</th>
                                <th>Waktu Laporan</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </tr>
                            @foreach($sprints as $sprint)
                            <tr>
                                <td>{{ $sprint->sprint->nama }}</td>
                                <td>{{ $sprint->mahasiswa->nama}}</td>
                                <td>{{ $sprint->tugas}}</td>
                                <td>{{ $sprint->created_at->format('d-M-Y H:i:s') }}</td>
                                <td>{{ $sprint->keterangan}}</td>
                                <td>
                                    <a href="{{route('laporan.sprint.show', $sprint->id)}}" class="btn btn-primary">Details</a>
                                    <a href="#" class="btn btn-warning">Edit</a>
                                    <a href="#" data-id="{{ $sprint->id }}" sprint-nama="{{ $sprint->waktu }}" class="btn btn-danger swal-confirm">
                                        <form action="{{ route('laporan.sprint.destroy', $sprint->id) }}" id="delete{{ $sprint->id }}" method="POST">
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
        var sprint_nama = $(this).attr('sprint-nama');
        swal({
                title: 'Yakin Ingin Menghapus Laporan Sprint?',
                text: 'Mau dihapus task di tanggal ' + sprint_nama + '??',
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