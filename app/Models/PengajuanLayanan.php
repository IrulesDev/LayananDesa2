<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanLayanan extends Model
{
    /** @use HasFactory<\Database\Factories\PengajuanLayananFactory> */
    use HasFactory;
    protected $fillable = [
        'via'
    ];

    
    public function perangkat(){
        return $this->hasMany(PerangkatDesa::class);
    }
    
    public function layanan(){
        return $this->hasMany(LayananDesa::class);

    }
    public function user()
    {
        return $this->morphToMany(User::class, 'userable');
    }
}