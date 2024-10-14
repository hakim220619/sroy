<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RoleModel extends Model
{
    use HasFactory;

    // Nama tabel, jika berbeda dari nama model (opsional jika sesuai dengan aturan penamaan Laravel)
    protected $table = 'role';

    // Field yang dapat diisi (fillable)
    protected $fillable = [
        'role_name',
        'role_status',
        'created_at'
    ];

    // Field yang otomatis dikelola Laravel (created_at, updated_at)
    public $timestamps = true;
    public static function createRole($request)
    {
        // If the combination does not exist, insert the new record
        DB::table('role')->insert([
            'role_name' => $request->role_name,
            'role_status' => 'ON',
            'created_at' => now()
        ]);
    }
    public static function updateRole($request, $id)
    {
        DB::table('role')->where('id', $id)->update([
            'role_name' => $request->role_name,
            'role_status' => $request->role_status,
            'updated_at' => now()
        ]);
    }
    public static function roleDeleted($id)
    {
        DB::table('role')->where('id', $id)->delete();
    }
}
