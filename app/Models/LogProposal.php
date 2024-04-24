<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogProposal extends Model
{
    use HasFactory;


    protected $fillable = [
        'judul_skripsi_id',
        'user_id',
        'action',
        'status',
    ];
}
