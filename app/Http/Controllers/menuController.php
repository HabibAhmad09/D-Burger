<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class menuController extends Controller
{
    public function index(){
        $menus = Menu::all();
        return view('Pages.Menu.index', [
            "menus" => $menus
        ]);
    }

    public function api($id){
        $menu = Menu::find($id);
        if (!$menu){
            return response()->json([
                "message" => "Menu Tidak Ditemukan"
            ], 500);
        }
        return response()->json([
            "message" => "Berhasil Mengambil Data Menu",
            "data" => $menu
        ]);
    }

    public function store(Request $request){
        $menu = new Menu();
        $menu->nama = $request->nama;
        $menu->harga = $request->harga;
        $menu->deskripsi = $request->deskripsi;

        if ($request->hasFile('foto')){
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' . $extension;
            $file->move('assets/uploads/menu/', $filename);
            $menu->foto =  '/assets/uploads/menu/' .$filename;
        }

        $menu->save();

        return redirect()->route('menu.show');
    }

    public function update(Request $request, $id){

        $menu = Menu::find($id);
        $menu->nama = $request->nama;
        $menu->deskripsi = $request->deskripsi;
        if ($request->hasFile('foto')){
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' . $extension;
            $file->move('assets/uploads/menu/', $filename);
            $menu->foto =  '/assets/uploads/menu/' .$filename;
        }
        $menu->save();
        return redirect()->route('menu.show');
    }


}
