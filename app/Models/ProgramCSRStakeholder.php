<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProgramCSRStakeholder extends Pivot
{
    use HasFactory;

    // Tentukan nama tabel jika tidak menggunakan konvensi penamaan Laravel (opsional)
    protected $table = 'program_csr_stakeholder';

    // Field yang dapat diisi secara massal (mass assignable)
    protected $fillable = [
        'id_program_csr',
        'id_stakeholder'
    ];
}