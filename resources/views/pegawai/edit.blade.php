@extends('layouts.master')

@section('title', 'Edit Pegawai')

@section('content')
<div class="card">
    <div class="card-header bg-warning">
        <h4>Edit Pegawai</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $pegawai->nama }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">NIP</label>
                <input type="text" name="nip" class="form-control" value="{{ $pegawai->nip }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Jabatan</label>
                <input type="text" name="jabatan" class="form-control" value="{{ $pegawai->jabatan }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Departemen</label>
                <input type="text" name="departemen" class="form-control" value="{{ $pegawai->departemen }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" class="form-control" value="{{ $pegawai->tanggal_masuk }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Gaji</label>
                <input type="number" name="gaji" class="form-control" value="{{ $pegawai->gaji }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
