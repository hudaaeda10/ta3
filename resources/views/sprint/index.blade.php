@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>List Sprint</h1>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>{{ $sprint->nama }} - Task</h4>
                <div class="card-header-form">
                    <form>
                        <div class="input-group">
                            <a href="{{ route('task.create')}}" class="btn btn-primary">Tambah Task</a>
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
                                <td>{{Str::limit($task->deskripsi, 50, '.')}}</td>
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
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        Details
                                    </button>
                                    <a href="{{ route('task.edit', $task->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="#" data-id="{{ $task->id }}" class="btn btn-danger swal-confirm">
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

@section('modal')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table align-item-center">
                    <tbody>
                        <tr>
                            <th scope="row">
                                Sprint Ke :
                            </th>
                            <td>
                                <span class="font-weight-bold mb-0">{{ $sprint->nama }}</span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                Nama Task :
                            </th>
                            <td>
                                <span class="font-weight-bold mb-0">{{ $task->nama }}</span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                Deskripsi Task :
                            </th>
                            <td>
                                <span class="font-weight-bold mb-0">{{ $task->deskripsi }}</span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                Status Task :
                            </th>
                            <td>
                                <span class="font-weight-bold mb-0">{{ $task->status }}</span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                Bobot Task :
                            </th>
                            <td>
                                <span class="font-weight-bold mb-0">{{ $task->bobot }}</span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                Mahasiswa :
                            </th>
                            <td>
                                <span class="font-weight-bold mb-0">{{ $task->mahasiswa->nama}}</span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                Peran :
                            </th>
                            <td>
                                <span class="font-weight-bold mb-0">{{ $task->mahasiswa->peran}}</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
        swal({
                title: 'Are you sure?' + id,
                text: 'Once deleted, you will not be able to recover this imaginary file!',
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