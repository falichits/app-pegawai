@extends('layouts.master')

@section('title', 'Tambah Pegawai Baru')

@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <h1 class="mb-4">Tambah Karyawan Baru</h1>

        <form action="{{ route('employees.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="full_name" class="form-label">Nama Lengkap</label>
                <input type="text" name="full_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="phone_number" class="form-label">Nomor Telepon</label>
                <input type="text" name="phone_number" class="form-control">
            </div>

            <div class="mb-3">
                <label for="birth_date" class="form-label">Tanggal Lahir</label>
                <input type="date" name="birth_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <textarea name="address" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label for="entry_date" class="form-label">Tanggal Masuk</label>
                <input type="date" name="entry_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-select" required>
                    <option value="Aktif">Aktif</option>
                    <option value="Cuti">Cuti</option>
                    <option value="Resign">Resign</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="department_id" class="form-label">Departemen</label>
                <select name="department_id" class="form-select" required>
                    <option value="" disabled selected>Pilih Departemen</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="position_id" class="form-label">Jabatan</label>
                <select name="position_id" class="form-select" required>
                    <option value="" disabled selected>Pilih Jabatan</option>
                    @foreach ($positions as $position)
                        <option value="{{ $position->id }}">{{ $position->position_name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Pegawai</button>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection