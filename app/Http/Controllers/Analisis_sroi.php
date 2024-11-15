<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Analisis_sroi extends Controller
{
    public function index()  {
        $data['title'] = "Analisis SROI Program CSR";
        $data_csr = DB::table('program_csr')
            ->select('program_csr.id as id_program_csr','program_csr.nama_program', 'program_csr.entitas', 'program_csr.priode_program_dari','program_csr.anggaran')
            ->get();
        return view('content.analisis_sroi.index',compact('data_csr'), $data);
    }
    public function detail_analisis($id) {
        $id_program = $id;
        $data_csr = DB::table('program_csr')
            ->join('program_csr_stakeholder', 'program_csr.id', '=', 'program_csr_stakeholder.id_program_csr')
            ->join('stakeholder', 'stakeholder.id', '=', 'program_csr_stakeholder.id_stakeholder')
            ->where('program_csr.id', '=', $id)
            ->select('program_csr.id as id_program_csr','program_csr.nama_program', 'program_csr.entitas', 'program_csr.priode_program_dari','stakeholder.dana',
                    'program_csr.anggaran','stakeholder.outcome', 'stakeholder.nama_stakeholder')
            ->first();

        $data_stakeholder = DB::table('program_csr')
        ->join('program_csr_stakeholder', 'program_csr.id', '=', 'program_csr_stakeholder.id_program_csr')
        ->join('stakeholder', 'stakeholder.id', '=', 'program_csr_stakeholder.id_stakeholder')
        ->where('program_csr.id', '=', $id)
        ->select('stakeholder.id as id_stakeholder','stakeholder.outcome', 'stakeholder.nama_stakeholder')
        ->get();

        $overclaim = DB::table('filter_adjusted')
        ->join('master_data', 'filter_adjusted.id_overclaim', '=', 'master_data.id')
        ->where('filter_adjusted.id_program', '=', $id)
        ->select('master_data.label_option','filter_adjusted.percentase')
        ->get();

        $isOverclaimNotEmpty = $overclaim->isNotEmpty();

        $deadweight = DB::table('master_data')
        ->where('master_data.uid', '=', 'Hdr20241105071132')
        ->select('master_data.id', 'master_data.label_option')
        ->whereNotNull('label_option')
        ->get();
        $attribution = DB::table('master_data')
        ->where('master_data.uid', '=', 'Hdr20241105071134')
        ->select('master_data.id', 'master_data.label_option')
        ->whereNotNull('label_option')
        ->get();
        $displacement = DB::table('master_data')
        ->where('master_data.uid', '=', 'Hdr20241105071150')
        ->select('master_data.id', 'master_data.label_option')
        ->whereNotNull('label_option')
        ->get();
        $drop_Off = DB::table('master_data')
        ->where('master_data.uid', '=', 'Hdr20241113071108')
        ->select('master_data.id', 'master_data.label_option')
        ->whereNotNull('label_option')
        ->get();

        return view('content.analisis_sroi.detail_analisis',compact('data_csr','data_stakeholder','deadweight','attribution','displacement','drop_Off','id_program','overclaim','isOverclaimNotEmpty'));
    }
    public function add_overclaim(Request $request, $id) {

        $deadweight = 0;

        if ($request->deadweight == 60) {
            $deadweight = 0;
        } elseif ($request->deadweight == 61) {
            $deadweight = 25;
        }elseif ($request->deadweight == 62) {
            $deadweight = 50;
        }elseif ($request->deadweight == 63) {
            $deadweight = 75;
        } elseif ($request->deadweight == 64) {
            $deadweight = 100;
        }


        DB::table('filter_adjusted')->insertGetId([
            'id_overclaim' => $request->deadweight,
            'id_program' => $id,
            'percentase' => $deadweight,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $displacement = 0;

        if ($request->displacement == 70) {
            $displacement = 0;
        } elseif ($request->displacement == 71) {
            $displacement = 25;
        }elseif ($request->displacement == 72) {
            $displacement = 50;
        }elseif ($request->displacement == 73) {
            $displacement = 75;
        } elseif ($request->displacement == 74) {
            $displacement = 100;
        }

        DB::table('filter_adjusted')->insertGetId([
            'id_overclaim' => $request->displacement,
            'id_program' => $id,
            'percentase' => $displacement,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $atribution = 0;

        if ($request->atribution == 65) {
            $atribution = 0;
        } elseif ($request->atribution == 66) {
            $atribution = 25;
        }elseif ($request->atribution == 67) {
            $atribution = 50;
        }elseif ($request->atribution == 68) {
            $atribution = 75;
        } elseif ($request->atribution == 69) {
            $atribution = 100;
        }
        DB::table('filter_adjusted')->insertGetId([
            'id_overclaim' => $request->atribution,
            'id_program' => $id,
            'percentase' => $atribution,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $dropoff = 0;

        if ($request->dropoff == 75) {
            $dropoff = 0;
        } elseif ($request->dropoff == 76) {
            $dropoff = 25;
        }elseif ($request->dropoff == 77) {
            $dropoff = 50;
        }elseif ($request->dropoff == 78) {
            $dropoff = 75;
        } elseif ($request->dropoff == 79) {
            $dropoff = 100;
        }
        $dropoff = DB::table('filter_adjusted')->insertGetId([
            'id_overclaim' => $request->dropoff,
            'id_program' => $id,
            'percentase' =>$dropoff,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambah.');
    }
}
