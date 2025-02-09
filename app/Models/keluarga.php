<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keluarga extends Model
{
    /** @use HasFactory<\Database\Factories\KeluargaFactory> */
    use HasFactory;

    protected $fillable = [
        'no_kk'
    ];

    public function penduduk()
    {
        return $this->hasMany(User::class);
    }
}
