@extends('layouts.master')

@section('title', 'Tambah Departemen Baru')

@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3">
        <h1 class="mb-4">Tambah Departemen Baru</h1>

        <form action="{{ route('departments.store') }}" method="POST">
            @csrf


            <div class="mb-3">
                <label for="department_name" class="form-label">Nama Departemen</label>
                <input type="text" name="department_name" class="form-control @error('department_name') is-invalid @enderror" value="{{ old('department_name') }}" required>
                @error('department_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan Departemen</button>
            <a href="{{ route('departments.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection