@extends('layouts.master')

@section('title', 'Edit Departemen')

@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3">
        <h1 class="mb-4">Edit Departemen: {{ $department->department_name }}</h1>

        <form action="{{ route('departments.update', $department->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="department_name" class="form-label">Nama Departemen</label>
                <input type="text" name="department_name" class="form-control @error('department_name') is-invalid @enderror" value="{{ old('department_name', $department->department_name) }}" required>
                @error('department_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Perbarui Departemen</button>
            <a href="{{ route('departments.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection