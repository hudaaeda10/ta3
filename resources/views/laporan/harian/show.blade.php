@extends('layouts.master')

@section('content')
<div class="section-header">
    <div class="section-header-back">
        <a href="{{ route('harian.index', [$project->id, $sprint->id]) }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>Laporan Daily di Tanggal : {{ $daily->created_at->format('d-M-Y H:i:s') }}</h1>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="d-inline">Details Laporan {{ $daily->sprint->nama}}</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th scope="row">
                                    Tanggal Laporan
                                </th>
                                <td>
                                    <span class="h6 ">{{ $daily->created_at->format('d-M-Y H:i') }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Nama Sprint
                                </th>
                                <td>
                                    <span class="h6">{{ $daily->sprint->nama }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Nama Mahasiswa
                                </th>
                                <td>
                                    <span class="h6">{{ $daily->mahasiswa }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Task Yang dilaporkan
                                </th>
                                <td>
                                    <span class="h6">{{ $daily->tugas }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Keterangan Laporan
                                </th>
                                <td>
                                    <span class="h6">{{ $daily->keterangan }}</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@stop