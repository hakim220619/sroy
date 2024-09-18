<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    use HasFactory;

    // Nama tabel, jika berbeda dari nama model (opsional jika sesuai dengan aturan penamaan Laravel)
    protected $table = 'role';

    // Field yang dapat diisi (fillable)
    protected $fillable = [
        'role_name',
        'role_status',
    ];

    // Field yang otomatis dikelola Laravel (created_at, updated_at)
    public $timestamps = true;
}
