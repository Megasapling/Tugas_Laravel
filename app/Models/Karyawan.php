<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Alamat yang benar
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawans';
    protected $fillable = ['nama', 'posisi', 'departemen_id'];

    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }
}