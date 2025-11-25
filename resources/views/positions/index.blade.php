@extends('layouts.master')

@section('title', 'Manajemen Jabatan')

@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <h1 class="mb-4">Daftar Jabatan</h1>

        <a href="{{ route('positions.create') }}" class="btn btn-primary mb-3">Tambah Jabatan Baru</a>
        
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($positions as $position)
                    <tr>
                        <td>{{ $position->id }}</td>
                        <td>{{ $position->position_name }}</td>
                        <td>
                            <a href="{{ route('positions.edit', $position->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('positions.destroy', $position->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus jabatan ini? Semua data karyawan yang terkait harus diperbarui terlebih dahulu!')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">Belum ada data jabatan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection