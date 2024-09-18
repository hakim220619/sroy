<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class  MenuModel extends Model
{
    use HasFactory;

    // Tentukan tabel yang digunakan model ini
    protected $table = 'menus';

    // Tentukan kolom-kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'menu_name',
        'icon',
        'route',
        'parent_id',
        'order',
        'is_active',
    ];

    // Menentukan tipe data untuk beberapa kolom
    protected $casts = [
        'is_active' => 'string',  // Kolom 'is_active' sebagai boolean
        'parent_id' => 'integer',  // Kolom 'parent_id' sebagai integer
        'order' => 'integer',      // Kolom 'order' sebagai integer
    ];

    // Relasi: Sebuah menu mungkin memiliki parent (menu induk)
    public function parent()
    {
        return $this->belongsTo(MenuModel::class, 'parent_id');
    }

    // Relasi: Sebuah menuModeMenuModel mungkin memiliki banyak sub-menuModeMenuModel (anak)
    public function children()
    {
        return $this->hasMany(MenuModel::class, 'parent_id');
    }
    public static function getDataMenuManagement() {
        DB::table('menu_management');
    }
}

