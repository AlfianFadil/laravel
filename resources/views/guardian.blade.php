@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Guardians</h1>
    <a href="{{ route('guardians.create') }}" class="btn btn-primary mb-3">Tambah Guardian</a>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Pekerjaan</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
        @foreach($guardians as $guardian)
        <tr>
            <td>{{ $guardian->id }}</td>
            <td>{{ $guardian->name }}</td>
            <td>{{ $guardian->job }}</td>
            <td>{{ $guardian->phone }}</td>
            <td>{{ $guardian->email }}</td>
            <td>
                <a href="{{ route('guardians.show',$guardian->id) }}" class="btn btn-info btn-sm">Detail</a>
                <a href="{{ route('guardians.edit',$guardian->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('guardians.destroy',$guardian->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
