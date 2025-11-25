<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department; 
use App\Models\Position;  
use Illuminate\Http\Request;

class PegawaiController extends Controller
{

    public function index()
    {
  
        $employees = Employee::with(['department', 'position'])->get();
        return view('employees.index', compact('employees'));
    }


    public function create()
    {
  
        $departments = Department::all();
        $positions = Position::all();
        
        return view('employees.create', compact('departments', 'positions'));
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'phone_number' => 'nullable|string|max:15',
            'birth_date' => 'required|date',
            'address' => 'nullable|string',
            'entry_date' => 'required|date',
            'status' => 'required|string|max:50',
            'department_id' => 'required|exists:departments,id', 
            'position_id' => 'required|exists:positions,id',  
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')
                         ->with('success', 'Pegawai berhasil ditambahkan.');
    }


    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }


    public function edit(Employee $employee)
    {
       
        $departments = Department::all();
        $positions = Position::all();

        return view('employees.edit', compact('employee', 'departments', 'positions'));
    }


    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'phone_number' => 'nullable|string|max:15',
            'birth_date' => 'required|date',
            'address' => 'nullable|string',
            'entry_date' => 'required|date',
            'status' => 'required|string|max:50',
            'department_id' => 'required|exists:departments,id',
            'position_id' => 'required|exists:positions,id',
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')
                         ->with('success', 'Pegawai berhasil diperbarui.');
    }


    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')
                         ->with('success', 'Pegawai berhasil dihapus.');
    }
}