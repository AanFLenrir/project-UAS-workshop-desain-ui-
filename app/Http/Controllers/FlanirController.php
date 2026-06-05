<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FlanirController extends Controller
{
    public function landing() { return view('flanir.flanir_landing'); }
    public function loginPage() { return view('flanir.flanir_login'); }
    
    public function processLogin(Request $request) {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('flanir.dashboard'));
        }
        return back()->withErrors(['email' => 'Login gagal!']);
    }

    public function index() { return view('flanir.dashboard_pasien'); }
    public function layanan() { 
        $produks = DB::table('produks')->get();
        return view('flanir.layanan', compact('produks')); 
    }
    
    // ✅ METHOD YANG DIBUTUHKAN
    public function akun() {
        $user = Auth::user();
        return view('flanir.akun', compact('user'));
    }

    public function konsultasi() { return view('flanir.konsultasi'); }
    public function chatRoom($dokter_id) { return view('flanir.chat', compact('dokter_id')); }
    public function videoCall($id) { return view('flanir.video_call', compact('id')); }
    
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('flanir.landing');
    }
}