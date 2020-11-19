<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journalist extends Model
{
    use HasFactory;
    protected $table = 'journalist';
    protected $fillable =
    [
        'nama_journalist',
        'jabatan',
        'no_hp',
        'alamat'
    ];
}
