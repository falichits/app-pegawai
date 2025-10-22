<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PegawaiController;

Route::resource('pegawai', PegawaiController::class);


Route::get('/', function () {
    return view('welcome');
});
