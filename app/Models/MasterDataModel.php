<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MasterDataModel extends Model
{
    use HasFactory;
    // Nama tabel, jika berbeda dari nama model (opsional jika sesuai dengan aturan penamaan Laravel)
    protected $table = 'master_data';

    // Field yang dapat diisi (fillable)
    protected $fillable = [
        'id',
        'uid',
        'label_header',
        'label_option',
        'type',
        'state',
        'created_at',
    ];

    public static function createHeader($request)
    {
        // If the combination does not exist, insert the new record
        DB::table('master_data')->insert([
            'uid' => 'Hdr' . date('Ymdhms'),
            'label_header' => $request->label_header,
            'type' => 'Header',
            'status' => $request->status,
            'created_at' => now()
        ]);
    }
    public static function createOptions($request)
    {
        // If the combination does not exist, insert the new record
        DB::table('master_data')->insert([
            'uid' => $request->uid,
            'label_option' => $request->label_options_opt,
            'type' => 'Options',
            'status' => $request->status_opt,
            'created_at' => now()
        ]);
    }

    public static function updateHdr($request, $id_hdr)
    {
        DB::table('master_data')->where('id', $id_hdr)->update([
            'label_header' => $request->update_label_header,
            'status' => $request->update_status,
            'updated_at' => now()
        ]);
    }
    public static function updateOpt($request, $id_opt)
    {
        DB::table('master_data')->where('id', $id_opt)->update([
            'label_option' => $request->update_label_option,
            'status' => $request->update_status,
            'updated_at' => now()
        ]);
    }
    public static function optionsDeletedHeader($id)
    {
        DB::table('master_data')->where('uid', $id)->delete();
    }
    public static function optionsDeletedOption($id)
    {
        DB::table('master_data')->where('id', $id)->delete();
    }
}
