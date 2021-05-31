@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 30rem">
            <div class="card-header">
                Edit Matakuliah
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong> Whoops!!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form method="post" action="{{ route('matakuliah.update', $mk->id) }}" id="myForm"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama_matkul">Nama Matakuliah</label>
                        <input type="text" name="nama_matkul" class="form-control" aria-describedby="nama_matkul"
                            value="{{ $mk->nama_matkul }}">
                    </div>

                    <div class="form-group">
                        <label for="sks">sks</label>
                        <input type="sks" name="sks" class="form-control" aria-describedby="sks"
                            value="{{ $mk->sks }}">
                    </div>

                    <div class="form-group">
                        <label for="jam">Jam</label>
                        <input type="jam" name="jam" class="form-control" aria-describedby="jam"
                            value="{{ $mk->jam }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-success" href="{{ route('matakuliah.index') }}">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
