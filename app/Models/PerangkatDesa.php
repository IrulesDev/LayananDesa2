<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerangkatDesa extends Model
{
    /** @use HasFactory<\Database\Factories\PerangkatDesaFactory> */
    use HasFactory;
    protected $fillable = [
        'pengajuan_id',
        'perangkat'
    ];

    public function pengajuan(){
        return $this->belongsTo(PengajuanLayanan::class);
    }

    public function user()
    {
        return $this->morphToMany(User::class, 'userable');
    }
}
