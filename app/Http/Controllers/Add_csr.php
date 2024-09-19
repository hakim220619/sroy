<?php

namespace App\Http\Controllers;

use App\Models\ProgramCSR;
use App\Models\Stakeholder;
use App\Models\ProgramCSRStakeholder;
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
   public function store(Request $request) {
        // Validasi data
        $request->validate([
            'nama_program' => 'required',
            'entitas' => 'required',
            // Validasi lainnya
        ]);

        // Simpan program CSR ke database
        $program = new ProgramCSR;
        $program->nama_program = $request->nama_program;
        $program->entitas = $request->entitas;
        // Isi kolom lainnya...
        $program->save();

        // Loop untuk menyimpan data stakeholder
        if ($request->stakeholders) {
            foreach ($request->stakeholders as $stakeholderData) {
                // Simpan stakeholder
                $stakeholder = new Stakeholder;
                $stakeholder->peran = $stakeholderData['peran'];
                $stakeholder->output = $stakeholderData['output'];
                $stakeholder->outcome = $stakeholderData['outcome'];
                $stakeholder->dana = $stakeholderData['dana'];
                $stakeholder->durasi = $stakeholderData['durasi'];
                $stakeholder->barang = $stakeholderData['barang'];
                $stakeholder->save();

                // Simpan hubungan ke tabel pivot
                $pivot = new ProgramCSRStakeholder;
                $pivot->id_program_csr = $program->id;
                $pivot->id_stakeholder = $stakeholder->id;
                $pivot->save();
            }
        }

        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }
}
