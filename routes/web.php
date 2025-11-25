<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\DepartmentController; 
use App\Http\Controllers\PositionController;   
use App\Http\Controllers\AttendanceController; 
use App\Http\Controllers\SalaryController;     


Route::get('/', [PegawaiController::class, 'index']);

Route::resource('pegawai', PegawaiController::class);

Route::resource('departments', DepartmentController::class);
Route::resource('positions', PositionController::class);
Route::resource('attendances', AttendanceController::class);
Route::resource('salaries', SalaryController::class);