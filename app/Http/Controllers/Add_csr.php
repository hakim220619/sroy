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
        $program->deskripsi_program = $request->deskripsi_program;
        $program->tujuan_program = $request->tujuan_program;
        $program->priode_program_dari = $request->priode_program_dari;
        $program->priode_program_sampai = $request->priode_program_sampai;
        $program->jangka_waktu_manfaat_dari = $request->jangka_waktu_manfaat_dari;
        $program->jangka_waktu_manfaat_sampai = $request->jangka_waktu_manfaat_sampai;
        $program->alamat_pelaksanaan = $request->alamat_pelaksanaan;
        $program->provinsi = $request->provinsi;
        $program->kabupaten = $request->kabupaten;
        $program->kecamatan = $request->kecamatan;
        // Isi kolom lainnya...
        $program->save($request->stakeholders);
        // Loop untuk menyimpan data stakeholder

        if ($request->stakeholders) {
            $data = $request->stakeholders;
        
            // Tentukan ukuran kelompok data (jumlah field per stakeholder)
            $chunkSize = 7;
        
            // Array untuk menyimpan stakeholder yang sudah terstruktur
            $groupedData = [];
        
            // Menggabungkan data berdasarkan setiap stakeholder
            for ($i = 0; $i < count($data); $i += $chunkSize) {
                
                $groupedData[] = [
                    'name' => $data[$i]['name'] ?? null,
                    'peran' => $data[$i + 1]['peran'] ?? null,
                    'output' => $data[$i + 2]['output'] ?? null,
                    'outcome' => $data[$i + 3]['outcome'] ?? null,
                    'dana' => $data[$i + 4]['dana'] ?? null,
                    'durasi' => $data[$i + 5]['durasi'] ?? null,
                    'barang' => $data[$i + 6]['barang'] ?? null,
                ];
            }
       
            foreach ($groupedData as $stakeholderData) {
                // Simpan stakeholder
                $stakeholder = new Stakeholder;
                $stakeholder->nama_stakeholder = $stakeholderData['name'];
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
