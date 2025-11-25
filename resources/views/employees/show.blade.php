@extends('layouts.master')

@section('title', 'Detail Pegawai')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <h1 class="mb-4">Detail Karyawan: {{ $employee->full_name }}</h1>

        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>{{ $employee->full_name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $employee->email }}</td>
                    </tr>
                    <tr>
                        <th>Nomor Telepon</th>
                        <td>{{ $employee->phone_number }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>{{ $employee->birth_date }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $employee->address }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Masuk</th>
                        <td>{{ $employee->entry_date }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{ $employee->status }}</td>
                    </tr>
                    {{-- MENAMPILKAN RELASI --}}
                    <tr>
                        <th>Departemen</th>
                        <td>{{ $employee->department->department_name ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Jabatan</th>
                        <td>{{ $employee->position->position_name ?? 'N/A' }}</td>
                    </tr>
                </table>
                <a href="{{ route('employees.index') }}" class="btn btn-secondary">Kembali ke Daftar Pegawai</a>
            </div>
        </div>
    </div>
</div>
@endsection