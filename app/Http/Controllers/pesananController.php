<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuPesanan;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class pesananController extends Controller
{
    public function index(){
        $pesanans = Pesanan::latest()->with('menu_pesanan')->get();

        $data = array();
        foreach ($pesanans as $pesanan){
            $dataMenu = array();

            foreach( $pesanan->menu_pesanan as $menu) {
                $menu = Menu::where('id', $menu->menu_id)->get();
                array_push($dataMenu, $menu);
            }
            $dataPesanan = array([
                "status" => $pesanan->status,
                "total_harga" => $pesanan->total_harga,
                "nama_pemesan" => $pesanan->nama_pemesan,
                "menu_pesanan" => $dataMenu,
            ]);
            array_push($data,  $dataPesanan);
        }
        return view('Pages.Pesanan.index', [
            "pesanans" => $data
        ]);
    }

    public function makanDitempat(){
        $pesanans = Pesanan::latest()->where('status', 'makan_ditempat')->with('menu_pesanan')->get();

        $data = array();
        foreach ($pesanans as $pesanan){
            $dataMenu = array();

            foreach( $pesanan->menu_pesanan as $menu) {
                $menu = Menu::where('id', $menu->menu_id)->get();
                array_push($dataMenu, $menu);
            }
            $dataPesanan = array([
                "status" => $pesanan->status,
                "total_harga" => $pesanan->total_harga,
                "nama_pemesan" => $pesanan->nama_pemesan,
                "menu_pesanan" => $dataMenu,
            ]);
            array_push($data,  $dataPesanan);
        }
        return view('Pages.Pesanan.makanDiTempat', [
            "pesanans" => $data
        ]);
    }

    public function bawaPulang(){
        $pesanans = Pesanan::latest()->where('status', 'bawa_pulang')->with('menu_pesanan')->get();

        $data = array();
        foreach ($pesanans as $pesanan){
            $dataMenu = array();

            foreach( $pesanan->menu_pesanan as $menu) {
                $menu = Menu::where('id', $menu->menu_id)->get();
                array_push($dataMenu, $menu);
            }
            $dataPesanan = array([
                "status" => $pesanan->status,
                "total_harga" => $pesanan->total_harga,
                "nama_pemesan" => $pesanan->nama_pemesan,
                "menu_pesanan" => $dataMenu,
            ]);
            array_push($data,  $dataPesanan);
        }
        return view('Pages.Pesanan.bawaPulang', [
            "pesanans" => $data
        ]);
    }

    public function add(){
        $menus = Menu::all();

        return view('Pages.Pesanan.add', [
            "menus" => $menus
        ]);
    }

    public function storeAPI(Request $request){

        $pesanan = new Pesanan();
        $pesanan->nama_pemesan = $request->pemesan;
        $pesanan->total_harga = $request->total_pesanan;
        $pesanan->status = $request->status_pesanana;
        $pesanan->save();

        foreach ($request->list_menu as $listMenu){

            $menuPesanan = new MenuPesanan();
            $menuPesanan->menu_id = $listMenu['id_menu'];
            $menuPesanan->pesanan_id = $pesanan->id;
            $menuPesanan->jumlah = $listMenu['jumlah_pesanan'];
            $getMenu = Menu::where('id', $listMenu['id_menu'])->first();
            $menuPesanan->harga = $getMenu->harga * $listMenu['jumlah_pesanan'];
            $menuPesanan->save();
        }

        return response()->json([
            "message" => "berhasil"
        ]);
    }
}






















