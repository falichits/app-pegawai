@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h3 class="mb-4">Edit Data Pegawai</h3>

    {{-- tampilkan pesan sukses kalau ada --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- form edit pegawai --}}
    <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $pegawai->nama) }}" required>
        </div>

        <div class="form-group mb-3">
            <label>NIP</label>
            <input type="text" name="nip" class="form-control" value="{{ old('nip', $pegawai->nip) }}" required>
        </div>

        <div class="form-group mb-3">
            <label>Departemen</label>
            <select name="departemen_id" class="form-control" required>
                <option value="">-- Pilih Departemen --</option>
                @foreach ($departemen as $d)
                    <option value="{{ $d->id }}" {{ $pegawai->departemen_id == $d->id ? 'selected' : '' }}>
                        {{ $d->nama_departemen }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Jabatan</label>
            <select name="jabatan_id" class="form-control" required>
                <option value="">-- Pilih Jabatan --</option>
                @foreach ($jabatan as $j)
                    <option value="{{ $j->id }}" {{ $pegawai->jabatan_id == $j->id ? 'selected' : '' }}>
                        {{ $j->nama_jabatan }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" class="form-control"
                   value="{{ old('tanggal_masuk', $pegawai->tanggal_masuk) }}" required>
        </div>

        <div class="form-group mb-3">
            <label>Gaji</label>
            <input type="number" name="gaji" class="form-control"
                   value="{{ old('gaji', $pegawai->gaji) }}" required>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Update Data</button>
        </div>
    </form>
</div>
@endsection
