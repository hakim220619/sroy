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

        return view('content.analisis_sroi.detail_analisis',compact('data_csr','data_stakeholder'));
    }
}
