@extends('layouts.master')

@section('title', 'Data Pegawai')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Data Pegawai</h3>
    <a href="{{ route('pegawai.create') }}" class="btn btn-primary">Tambah Pegawai</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NIP</th>
            <th>Jabatan</th>
            <th>Departemen</th>
            <th>Tanggal Masuk</th>
            <th>Gaji</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($pegawais as $pegawai)
        <tr>
            <td>{{ $pegawai->id }}</td>
            <td>{{ $pegawai->nama }}</td>
            <td>{{ $pegawai->nip }}</td>
            <td>{{ $pegawai->jabatan }}</td>
            <td>{{ $pegawai->departemen }}</td>
            <td>{{ $pegawai->tanggal_masuk }}</td>
            <td>Rp {{ number_format($pegawai->gaji, 0, ',', '.') }}</td>
            <td>
                <a href="{{ route('pegawai.edit', $pegawai->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8" class="text-center">Belum ada data pegawai.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
