<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rombels extends Model
{
    use HasFactory;

    protected $fillable = [
        'rombel',
    ];

    protected $casts = [
        'rombel' => 'array'
    ];

    public function students()
    {
        return $this->hasMany(Students::class, 'rombel_id');
    }
}