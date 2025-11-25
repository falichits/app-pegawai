<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nip',
        'departemen_id',
        'jabatan_id',
        'tanggal_masuk',
        'gaji',
    ];

    public function departemen()
    {
        return $this->belongsTo(Department::class, 'departemen_id');
    }

    public function jabatan()
    {
        return $this->belongsTo(Position::class, 'jabatan_id');
    }
}
