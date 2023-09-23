@extends('layouts.template')
@section('content')
<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data User</h1>
    <a href="{{ route('vw_tambah') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-plus fa-sm text-white-50"></i> Tambah Data User </a>
</div>

<hr/>
<div class="card-body">
    <table class="table table-bordered">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Email</th>
            <th class="text-center">Password</th>
            <th class="text-center">Aksi</th>
        </tr>
        @foreach ($Users as $item) 
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->password }}</td>
            <td>
                <a href="{{ route('data_user.edit', $item->id) }}" method="GET" class="btn btn-primary btn-sm" style="text-decoration: none;">
                    @csrf
                    <i class="fa fa-wrench" aria-hidden="true"></i>
                </a> |
                <form action="{{ route('data_user.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"
                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach 
    </table>
</div>
</div>
@endsection