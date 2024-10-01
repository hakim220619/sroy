<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramCSR extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak menggunakan konvensi penamaan Laravel (opsional)
    protected $table = 'program_csr';

    // Field yang dapat diisi secara massal (mass assignable)
    protected $fillable = [
        'nama_program',
        'entitas',
        'region',
        'anggaran',
        'deskripsi_program',
        'tujuan_program',
        'priode_program_dari',
        'priode_program_sampai',
        'jangka_waktu_manfaat_dari',
        'jangka_waktu_manfaat_sampai',
        'alamat_pelaksanaan',
        'provinsi',
        'kabupaten',
        'kecamatan'
    ];

    // Relasi many-to-many dengan stakeholder melalui tabel pivot
    public function stakeholders()
    {
        return $this->belongsToMany(Stakeholder::class, 'program_csr_stakeholder', 'id_program_csr', 'id_stakeholder')
                    ->withTimestamps(); // Menyimpan timestamps di pivot table
    }
}