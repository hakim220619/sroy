<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stakeholder extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak menggunakan konvensi penamaan Laravel (opsional)
    protected $table = 'stakeholder';

    // Field yang dapat diisi secara massal (mass assignable)
    protected $fillable = [
        'nama_stakeholder',
        'peran',
        'output',
        'outcome',
        'dana',
        'durasi',
        'barang'
    ];

    // Relasi many-to-many dengan program CSR melalui tabel pivot
    public function programs()
    {
        return $this->belongsToMany(ProgramCSR::class, 'program_csr_stakeholder', 'id_stakeholder', 'id_program_csr')
                    ->withTimestamps(); // Menyimpan timestamps di pivot table
    }
}