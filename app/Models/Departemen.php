<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    // Menentukan nama tabel secara eksplisit
    protected $table = 'departemens';

    /**
     * Relasi ke Karyawan
     * Departemen "memiliki banyak" karyawan
     */
    public function karyawan()
    {
        return $this->hasMany(Karyawan::class);
    }
}