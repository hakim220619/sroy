<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Analisis_sroi extends Controller
{
    public function index()  {
        $data['title'] = "Analisis SROI Program CSR";
        $data_csr = DB::table('program_csr')
            ->join('program_csr_stakeholder', 'program_csr.id', '=', 'program_csr_stakeholder.id_program_csr')
            ->join('stakeholder', 'stakeholder.id', '=', 'program_csr_stakeholder.id_stakeholder')
            ->select('program_csr.nama_program', 'program_csr.entitas', 'program_csr.priode_program_dari','stakeholder.dana')
            ->get();
        return view('content.analisis_sroi.index',compact('data_csr'), $data);
    }
}
