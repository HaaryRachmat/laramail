<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employee';

    protected $fillable =
    [
        'nama_employee',
        'jabatan',
        'status',
        'no_hp',
        'alamat',
        'employee_id'
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
