@extends('layouts.master')

@section('title', 'Manajemen Pegawai')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="mb-4">Manajemen Karyawan</h1>

  
        <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Tambah Karyawan Baru</a>
        
 
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

   
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Nomor Telepon</th>
                        <th>Tanggal Lahir</th>
                        <th>Tanggal Masuk</th>
                        <th>Status</th>
       
                        <th>Departemen</th>
                        <th>Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($employees as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->full_name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->phone_number }}</td>
                        <td>{{ $employee->birth_date }}</td>
                        <td>{{ $employee->entry_date }}</td>
                        <td>{{ $employee->status }}</td>
                        

                        <td>{{ $employee->department->department_name ?? 'N/A' }}</td>
                        <td>{{ $employee->position->position_name ?? 'N/A' }}</td>

                        <td>
                            <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center">Tidak ada data pegawai.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection