@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Daftar Pegawai</h3>
        <a href="{{ route('pegawai.create') }}" class="btn btn-success">+ Tambah Pegawai</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Departemen</th>
                <th>Jabatan</th>
                <th>Tanggal Masuk</th>
                <th>Gaji</th>
                <th width="180px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pegawais as $index => $p)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->nip }}</td>
                    <td>{{ $p->departemen ? $p->departemen->nama_departemen : '-' }}</td>
                    <td>{{ $p->jabatan ? $p->jabatan->nama_jabatan : '-' }}</td>
                    <td>{{ $p->tanggal_masuk }}</td>
                    <td>Rp {{ number_format($p->gaji, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('pegawai.edit', $p->id) }}" class="btn btn-primary btn-sm">Edit</a>

                        <form action="{{ route('pegawai.destroy', $p->id) }}" method="POST" 
                              onsubmit="return confirm('Yakin ingin menghapus data ini?')" 
                              style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
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
</div>
@endsection
