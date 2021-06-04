@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 30rem">
                <div class="card-header">
                    Edit Dosen
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

                    <form method="post" action="{{ route('dosen.update', $dosen->id) }}" id="myForm" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nip">Nip</label>
                                <input type="text" name="nip" class="form-control" id="nip" aria-describedby="nip" value="{{ $dosen->nip }}">
                            </div>
    
                            <div class="form-group col-md-6">
                                <label for="nama">Nama</label>
                                <input type="nama" name="nama" class="form-control" id="nama" aria-describedby="nama" value="{{ $dosen->nama }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <select name="jk" class="form-control">
                                <option> {{ $dosen->jk }}</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
    
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="email" value="{{ $dosen->email }}">
                        </div>
    
                        <div class="form-group">
                            <label for="nohp">No Handphone</label>
                            <input type="nohp" name="nohp" class="form-control" id="nohp" aria-describedby="nohp" value="{{ $dosen->nohp }}">
                        </div>
    
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea type="alamat" name="alamat" row="3" id="alamat" class="form-control">{{ $dosen->alamat }}</textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="gambar">Foto</label>
                            <input type="file" class="form-control-file" name="gambar" value="{{ $dosen->gambar }}">
                            <br><img width="150px" src="{{asset('storage/'.$dosen->gambar)}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-success" href="{{ route('dosen.index') }}">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection