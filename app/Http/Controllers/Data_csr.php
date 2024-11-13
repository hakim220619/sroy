<?php

namespace App\Http\Controllers;

use App\Models\ProgramCSRStakeholder;
use App\Models\Stakeholder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class Data_csr extends Controller
{
    public function index()  {
        $data['title'] = "Data Program CSR";
        $data_csr = DB::table('program_csr')
            ->select('program_csr.id','program_csr.nama_program', 'program_csr.entitas', 'program_csr.priode_program_dari','program_csr.priode_program_sampai','program_csr.anggaran','program_csr.region')
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
                                ->select('stakeholder.id','nama_stakeholder','peran','output','outcome','dana','durasi','barang')
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
    public function update_program(Request $request, $id) {

        $program_csr_edit = DB::table('program_csr')
              ->where('id', $id)
              ->update([
                        'nama_program' => $request->nama_program, 
                        'entitas' => $request->entitas, 
                        'region' => $request->region, 
                        'anggaran' => $request->anggaran, 
                        'deskripsi_program' => $request->deskripsi_program, 
                        'tujuan_program' => $request->tujuan_program, 
                        'priode_program_dari' => $request->priode_program_dari, 
                        'priode_program_sampai' => $request->priode_program_sampai, 
                        'jangka_waktu_manfaat_dari' => $request->jangka_waktu_manfaat_dari, 
                        'jangka_waktu_manfaat_sampai' => $request->jangka_waktu_manfaat_sampai, 
                        'alamat_pelaksanaan' => $request->alamat_pelaksanaan, 
                        'provinsi' => $request->provinsi, 
                        'kabupaten' => $request->kabupaten, 
                        'kecamatan' => $request->kecamatan, 
                        'updated_at' => now(), 
                        ]);

        return redirect()->back()->with('success', 'Data berhasil diubah.');
    }
    public function delete_stakeholder($id) {
        $stakeholder = Stakeholder::find($id);

        if ($stakeholder) {
            ProgramCSRStakeholder::find($id)->delete();
            $stakeholder->delete();
            return response()->json(['message' => 'Data berhasil dihapus'], 200);
        }

        return response()->json(['message' => 'Data tidak ditemukan'], 404);

    }
    public function add_stakeholder(Request $request,$id){

        $stakeholderId = DB::table('stakeholder')->insertGetId([
            'nama_stakeholder' => $request->nama_stakeholder,
            'peran' => $request->peran,
            'output' => $request->output,
            'outcome' => $request->outcome,
            'dana' => $request->dana,
            'durasi' => $request->durasi. ' ' . $request->satuan,
            'barang' => $request->barang,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $programCsrStakeholder = DB::table('program_csr_stakeholder')->insertGetId([
            'id_program_csr' => $id,
            'id_stakeholder' => $stakeholderId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambah.');
    }
    public function edit_stakeholder(Request $request, $id)  {
        $program_csr_edit = DB::table('stakeholder')
              ->where('id', $id)
              ->update([
                        'nama_stakeholder' => $request->nama_stakeholder, 
                        'peran' => $request->peran, 
                        'output' => $request->output, 
                        'outcome' => $request->outcome, 
                        'dana' => $request->dana, 
                        'durasi' => $request->durasi.' '.$request->satuan, 
                        'barang' => $request->barang, 
                        'updated_at' => now(), 
         ]);
         return redirect()->back()->with('success', 'Data berhasil diubah.');
    }
}
