<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Data_csr extends Controller
{
    public function index()  {
        $data['title'] = "Data Program CSR";

        return view('content.data_csr.index', $data);
   }
}
