<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JudulSkripsi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'judul',
        'deskripsi',
        'file',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dosen()
    {
        return $this->hasOne(Dosen::class);
    }

    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class);
    }
}
