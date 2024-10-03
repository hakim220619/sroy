<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class Data_csr extends Controller
{
    public function index()  {
        $data['title'] = "Data Program CSR";
        $data_csr = DB::table('program_csr')
            ->join('program_csr_stakeholder', 'program_csr.id', '=', 'program_csr_stakeholder.id_program_csr')
            ->join('stakeholder', 'stakeholder.id', '=', 'program_csr_stakeholder.id_stakeholder')
            ->select('program_csr.id','program_csr.nama_program', 'program_csr.entitas', 'program_csr.priode_program_dari','program_csr.priode_program_sampai','stakeholder.dana','program_csr.anggaran','program_csr.region')
            ->distinct()
            ->get();
        return view('content.data_csr.index',compact('data_csr'), $data);
    }
    public function detail($id){
        $detail_data_csr = DB::table('program_csr')
                            ->where('program_csr.id',$id)
                            ->first();
        $detail_data_stakeholder = DB::table('program_csr')
                                ->join('program_csr_stakeholder', 'program_csr.id', '=', 'program_csr_stakeholder.id_program_csr')
                                ->join('stakeholder', 'stakeholder.id', '=', 'program_csr_stakeholder.id_stakeholder')
                                ->where('program_csr.id', $id)
                                ->select('nama_stakeholder','peran','output','outcome','dana','durasi','barang')
                                ->get();
        try {
            $response = Http::get('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json');

            // Memeriksa apakah permintaan sukses (status code 200)
            if ($response->successful()) {
                // Ambil data provinsi dari respons JSON
                $provinces = $response->json();
                
                // Masukkan data provinsi ke variabel untuk dikirim ke view
                $data['provinces'] = $provinces;
            } else {
                // Jika tidak sukses, isi variabel provinces dengan array kosong
                $data['provinces'] = [];
            }
        } catch (\Exception $e) {
            // Handle error saat melakukan request
            $data['provinces'] = [];
            $data['error'] = $e->getMessage();
        }
        return view('content.data_csr.detail_data_csr', compact('detail_data_csr','detail_data_stakeholder'),$data);
    }
}
