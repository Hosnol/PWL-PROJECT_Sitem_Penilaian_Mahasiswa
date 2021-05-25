@extends('layouts.app')
  
@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 30rem;">
                <div class="card-header">
                    Tambah Mahasiswa
                </div>

                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    
                    <form method="post" action="{{ route('mahasiswa.store') }}" id="myForm" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nim">Nim</label>
                                <input type="text" name="nim" class="form-control" id="nim" aria-describedby="nim" >
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nama">Nama</label>
                                <input type="nama" name="nama" class="form-control" id="nama" aria-describedby="nama" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <select name="jk" class="form-control">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <select name="kelas" class="form-control">
                                @foreach ($kelas as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nohp">No Handphone</label>
                            <input type="nohp" name="nohp" class="form-control" id="nohp" aria-describedby="nohp">
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea type="alamat" name="alamat" row="3" id="alamat" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for = "foto">Foto</label>
                            <input type  = "file" class = "form-control-file" required = "required" name = "foto">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-success" href="{{ route('mahasiswa.index') }}">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection