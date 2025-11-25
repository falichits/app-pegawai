<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['nama_departemen'];

    public function pegawais()
    {
        return $this->hasMany(Pegawai::class, 'departemen_id');
    }
}
