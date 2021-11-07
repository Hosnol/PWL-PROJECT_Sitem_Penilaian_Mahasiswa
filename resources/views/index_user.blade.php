@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">{{ __('User') }}</div>
                <div class="card-body">
                    <div class="float-right my-2 mr-sm-2">
                        <div class="float-right my-2 mr-sm-2">
                            <a class="btn btn-success" href="{{ route('user.create') }}"> Register </a>
                        </div>
                    </div>
                    <nav class="navbar">
                        <form class="form-inline" action="{{ route('user.index') }}" method="GET">
                            <input class="form-control mr-sm-2" type="search" name="cari" placeholder="Cari user..."
                                aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </nav>
                    @if ($message=Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{$message}}</p>
                    </div>
                    @endif
                    <div class="mt-2">
                        <div class="table-responsive-sm">
                            <table class="table table-bordered">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($usr as $no => $user)
                                <tr>
                                    <td>{{ $no + $usr->firstItem() }}</td>
                                    <td>{{ $user->name}}</td>
                                    <td>{{ $user->email}}</td>
                                    <td>
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                            onsubmit="return confirm('Anda yakin ingin menghapus data?')">
                                            <a class="btn btn-primary" href="{{ route('user.edit', $user->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $usr->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
