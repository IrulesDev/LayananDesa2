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
}
