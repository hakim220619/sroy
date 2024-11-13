<?php

namespace App\Http\Controllers;

use App\Models\MasterDataModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OptionsController extends Controller
{
    function index()
    {
        return view('backend.options.index');
    }
    public function getAllOptions()
    {
        $data = MasterDataModel::orderBy('uid')->orderBy('type')->get();
        // Mengelompokkan data berdasarkan kolom 'type'
        return response()->json(['data' => $data]);
    }
    public function storeHeader(Request $request)
    {
        // Validasi input
        $request->validate([
            'label_header' => 'required|string',
        ]);

        // Cek apakah role dengan nama yang sama sudah ada
        $exists = DB::table('master_data')  // Changed table to 'roles' to reflect role management
            ->where('label_header', $request->label_header)
            ->exists();

        // Jika role sudah ada, kembalikan error
        if ($exists) {
            return response()->json([
                'status' => 'error',
                'message' => 'The label_header already exists in the Master data.'
            ], 400);
        }

        // Menyimpan data ke database
        $data = MasterDataModel::createHeader($request);  // Changed to createdata to fit data management

        // Mengembalikan respons sukses
        return response()->json(['success' => true, 'message' => 'Header successfully added!', 'data' => $data]);
    }
    public function storeOptions(Request $request)
    {
        // Validasi input
        $request->validate([
            'label_options_opt' => 'required|string',
        ]);

        // Cek apakah role dengan nama yang sama sudah ada
        $exists = DB::table('master_data')  // Changed table to 'roles' to reflect role management
            ->where('uid', $request->uid)
            ->where('label_option', $request->label_options_opt)
            ->exists();

        // Jika role sudah ada, kembalikan error
        if ($exists) {
            return response()->json([
                'status' => 'error',
                'message' => 'The label options already exists in the Master data.'
            ], 400);
        }

        // Menyimpan data ke database
        $data = MasterDataModel::createOptions($request);  // Changed to createdata to fit data management

        // Mengembalikan respons sukses
        return response()->json(['success' => true, 'message' => 'Header successfully added!', 'data' => $data]);
    }

    public function updateHdr(Request $request, $role_id)
    {
        // Validasi input
        $request->validate([
            'id_hdr' => 'required|integer',
            'update_label_header' => 'required|string',
            'update_status' => 'required|string',
        ]);
        // Update role di database
        $role = MasterDataModel::updateHdr($request, $role_id);  // Changed variable name to $role

        // Mengembalikan respons sukses
        return response()->json(['success' => true, 'message' => 'Role successfully updated!', 'role' => $role]);  // Updated response message and variable name
    }
    public function updateOpt(Request $request, $id_opt)
    {
        // Validasi input
        $request->validate([
            'id_opt' => 'required|integer',
            'update_label_option' => 'required|string',
            'update_status' => 'required|string',
        ]);
        // Update role di database
        $role = MasterDataModel::updateOpt($request, $id_opt);  // Changed variable name to $role

        // Mengembalikan respons sukses
        return response()->json(['success' => true, 'message' => 'Role successfully updated!', 'role' => $role]);  // Updated response message and variable name
    }

    public function optionsDeletedHeader($id)
    {
        try {
            MasterDataModel::optionsDeletedHeader($id);
            return response()->json(['success' => 'Data deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete Data'], 500);
        }
    }
    public function optionsDeletedOption($id)
    {
        try {
            MasterDataModel::optionsDeletedOption($id);
            return response()->json(['success' => 'Data deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete Data'], 500);
        }
    }
}
