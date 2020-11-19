<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    use HasFactory;
    protected $table = 'mail'; //nama tabel
    // Kolom yang ingin diisi
    protected $fillable = [
        'judul_surat',
        'isi_surat',
        'surat_dari',
        'ditujukan_kepada',
        'status',
        'keterangan'
    ];
    protected $appends = ['status_label'];

    public function getStatusLabelAttribute()
    {
        if ($this->status == 0) {
            return '<span class="flex bg-red-600 text-white rounded-full h-6 px-2 justify-center items-center text-sm">Ditolak</span>';
        }
        return '<span class="flex bg-indigo-600 text-white rounded-full h-6 px-2 justify-center items-center text-sm">Diterima</span>';
    }
}
