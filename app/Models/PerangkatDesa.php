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
}
