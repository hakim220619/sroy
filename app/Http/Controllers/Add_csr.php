<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Add_csr extends Controller
{
   public function index()  {
        $data['title'] = "Tambah Program CSR";

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

        return view('content.add_csr.add_csr', $data);
   }
}
