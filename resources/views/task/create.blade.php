@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Tambah Task</h1>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Task Baru </h4>
                <div class="card-header-action">
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('task.store') }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="sprint_id">Judul Sprint</label>
                        <select name="sprint_id" id="task" class="form-control form-control-lg">
                            @foreach($task as $key => $lastName)
                            <option value="{{ $key }}">{{ $lastName }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Task</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Task" value="{{ old('$task->nama') }}">
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="bobot">Bobot Task</label>
                        <select name="bobot" id="bobot" class="form-control" name="bobot" id="bobot">
                            <option selected disabled>Pilih Bobot</option>
                            @foreach($bobots as $bobot)
                            <option value="{{ $bobot}}">{{ $bobot }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status">status Task</label>
                        <select name="status" id="status" class="form-control" name="status" id="status" value="{{ old('status')}}">
                            <option value="0">Belum Selesai</option>
                        </select>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

@stop