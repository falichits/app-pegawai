@extends('layouts.master')

@section('title', 'Tambah Pegawai')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h4>Tambah Pegawai</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('pegawai.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">NIP</label>
                <input type="text" name="nip" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Jabatan</label>
                <input type="text" name="jabatan" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Departemen</label>
                <input type="text" name="departemen" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Gaji</label>
                <input type="number" name="gaji" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
