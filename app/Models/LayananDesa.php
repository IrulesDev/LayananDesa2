<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananDesa extends Model
{
    /** @use HasFactory<\Database\Factories\LayananDesaFactory> */
    use HasFactory;
    protected $fillable = [
        'pengajuan_id',
        'layanan'
    ];

    public function pengajuan(){
        return $this->belongsTo(PengajuanLayanan::class);
    }

    public function user()
    {
        return $this->morphToMany(User::class, 'userable');
    }
}
