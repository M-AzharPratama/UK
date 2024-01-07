<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rayons extends Model
{
    use HasFactory;

    protected $fillable = [
        'rayon',
        'user_id'
    ];

    protected $casts = [
        'rayon' => 'array'
    ];

    public function students()
    {
        return $this->hasMany(Students::class, 'rayon_id');
    }

    public function user()
    {
        return $this->belongsTo(user::class, 'user_id');
    }

}
