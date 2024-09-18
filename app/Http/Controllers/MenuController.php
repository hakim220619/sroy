<?php

namespace App\Http\Controllers;

use App\Models\MenuModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    function menu()
    {
        return view('backend.menu.index');
    }
    function menuManagement()
    {
        return view('backend.menu.menuManagement');
    }
    // app/Http/Controllers/MenuController.php
    public function getMenuData()
    {
        $menus = MenuModel::all();
        return response()->json(['data' => $menus]);
    }
    public function getDataMenuManagement()
    {
        $menus = MenuModel::getDataMenuManagement();
        return response()->json(['data' => $menus]);
    }
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'menu_name' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'route' => 'required|string|max:255',
            'parent_id' => 'nullable|integer',
            'order' => 'required|integer',
            'is_active' => 'required|string',
        ]);

        // Menyimpan data ke database
        $menu = MenuModel::create([
            'menu_name' => $request->menu_name,
            'icon' => $request->icon,
            'route' => $request->route,
            'parent_id' => $request->parent_id,
            'order' => $request->order,
            'is_active' => $request->is_active,
        ]);

        // Mengembalikan respons sukses
        return response()->json(['success' => true, 'message' => 'Menu successfully added!', 'menu' => $menu]);
    }
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'menu_name' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'route' => 'required|string|max:255',
            'parent_id' => 'nullable|integer',
            'order' => 'required|integer',
            'is_active' => 'required|string',
        ]);

        // Cari menu berdasarkan ID
        $menu = MenuModel::findOrFail($id);

        // Update data menu
        $menu->update([
            'menu_name' => $request->menu_name,
            'icon' => $request->icon,
            'route' => $request->route,
            'parent_id' => $request->parent_id,
            'order' => $request->order,
            'is_active' => $request->is_active,
        ]);

        // Mengembalikan respons sukses
        return response()->json(['success' => true, 'message' => 'Menu successfully updated!', 'menu' => $menu]);
    }
    public function destroy($id)
    {
        try {
            $menu = MenuModel::findOrFail($id);
            $menu->delete();
            return response()->json(['success' => 'Menu deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete menu'], 500);
        }
    }
}
