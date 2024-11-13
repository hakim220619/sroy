<?php

namespace App\Http\Controllers;

use App\Models\RoleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    function index()
    {
        return view('backend.role.index');
    }
    public function getAllRoles()
    {
        $roles = RoleModel::all();
        return response()->json(['data' => $roles]);
    }
    public function storeRole(Request $request)
    {
        // Validasi input
        $request->validate([
            'role_name' => 'required|string',
        ]);

        // Cek apakah role dengan nama yang sama sudah ada
        $exists = DB::table('role')  // Changed table to 'roles' to reflect role management
            ->where('role_name', $request->role_name)
            ->exists();

        // Jika role sudah ada, kembalikan error
        if ($exists) {
            return response()->json([
                'status' => 'error',
                'message' => 'The role already exists in the role management.'
            ], 400);
        }

        // Menyimpan data ke database
        $role = RoleModel::createRole($request);  // Changed to createRole to fit role management

        // Mengembalikan respons sukses
        return response()->json(['success' => true, 'message' => 'Role successfully added!', 'role' => $role]);
    }
    public function updateRole(Request $request, $role_id)
    {
        // Validasi input
        $request->validate([
            'role_id' => 'required|integer',
            'role_name' => 'required|string',
            'role_status' => 'required|string',
        ]);
        // Update role di database
        $role = RoleModel::updateRole($request, $role_id);  // Changed variable name to $role

        // Mengembalikan respons sukses
        return response()->json(['success' => true, 'message' => 'Role successfully updated!', 'role' => $role]);  // Updated response message and variable name
    }
    public function roleDeleted($id)
    {
        try {
            RoleModel::roleDeleted($id);
            return response()->json(['success' => 'Menu deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete menu'], 500);
        }
    }
}
