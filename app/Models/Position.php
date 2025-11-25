<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $fillable = ['nama_jabatan'];

    public function pegawais()
    {
        return $this->hasMany(Pegawai::class, 'jabatan_id');
    }
}
