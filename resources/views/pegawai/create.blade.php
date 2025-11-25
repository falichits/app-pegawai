@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Tambah Pegawai</h2>

    <form action="{{ route('pegawai.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>NIP</label>
            <input type="text" name="nip" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Departemen</label>
           <select name="departemen_id" class="form-control">
    <option value="">-- Pilih Departemen --</option>
    @foreach ($departemen as $d)
        <option value="{{ $d->id }}">{{ $d->nama_departemen }}</option>
    @endforeach
</select>
        </div>

        <div class="mb-3">
            <label>Jabatan</label>
         <select name="jabatan_id" class="form-control">
    <option value="">-- Pilih Jabatan --</option>
    @foreach ($jabatan as $j)
        <option value="{{ $j->id }}">{{ $j->nama_jabatan }}</option>
    @endforeach
</select>
        </div>

        <div class="mb-3">
            <label>Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Gaji</label>
            <input type="number" name="gaji" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
