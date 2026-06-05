<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        return view('pembayaran.index'); 
    }

    public function process(Request $request, $id)
    {
        // Di sini nanti Anda bisa simpan data ke database
        // $request->payment berisi GOPAY/DANA/OVO
        
        return redirect()->route('flanir.success');
    }

    public function success()
    {
        return view('pembayaran.success');
    }
}