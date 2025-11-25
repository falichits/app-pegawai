<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;


    protected $fillable = [
        'full_name',
        'email',
        'phone_number',
        'birth_date',
        'address',
        'entry_date',
        'status',
        'department_id', 
        'position_id',   
    ];


    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

 
    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }
}