@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Laporan Harian {{ $sprint->nama}}</h1>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="d-inline">Tasks</h4>
                <div class="card-header-action">
                    <a href="{{ route('harian.create', $sprint->id) }}" class="btn btn-primary">Tambah Laporan</a>
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
                            @foreach($dailys as $daily)
                            <tr>
                                <td>{{ $daily->sprint->nama}} </td>
                                <td>{{ $daily->mahasiswa->nama}}</td>
                                <td>{{$daily->tugas}}</td>
                                <td>{{ $daily->created_at->format('d-M-Y H:i:s') }}</td>
                                <td>{{ $daily->keterangan }}</td>
                                <td>
                                    <a href="{{ route('harian.show', $daily->id) }}" class="btn btn-primary">Details</a>
                                    <a href="/laporan/harian/edit/{{ $sprint->id }}/{{ $daily->id}}" class="btn btn-warning">Edit</a>
                                    <a href="#" data-id="{{ $daily->id }}" daily-nama="{{ $daily->created_at->format('d-M-Y') }}" class="btn btn-danger swal-confirm">
                                        <form action="{{ route('harian.destroy', $daily->id) }}" id="delete{{ $daily->id }}" method="POST">
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
        var daily_nama = $(this).attr('daily-nama');
        swal({
                title: 'Yakin Ingin Menghapus Laporan?',
                text: 'Mau dihapus task di tanggal ' + daily_nama + '??',
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