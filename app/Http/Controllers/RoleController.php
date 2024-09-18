<?php

namespace App\Http\Controllers;

use App\Models\RoleModel;
use Illuminate\Http\Request;

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
    
}
