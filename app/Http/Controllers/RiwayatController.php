<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Produk;
use App\Models\User;
use App\Models\Detail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;
use Auth;
use Alert;
use Carbon\Carbon;

class RiwayatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	$transaksi = Transaksi::where('id_users', Auth::user()->id)->where('status', '!=',0)->get();
    	return view('riwayat', compact('transaksi'));
    }
    public function detail($id)
    {
    	$transaksi = Transaksi::where('id', $id)->first();
    	$details = Detail::where('id_transaksi', $transaksi->id)->get();
     	return view('pesan', compact('transaksi','details'));
    }

    public function cetak_nota($id)
    {
        $transaksi = Transaksi::where('id', $id)->first();
        
        $detail = Detail::where('id_transaksi', $transaksi->id)
                        ->with('transaksi')
                        ->get();
        $pdf = PDF::loadview('cetak_nota', compact('detail', 'transaksi'));
        return $pdf->stream();

        // $transaksi = Transaksi::where('id', $id)->first();
        // $detail = Detail::where('id_transaksi', $transaksi->id)->get();
        // $pdf = PDF::loadview('cetak_nota', compact('detail'));
        // return $pdf->stream();
    }
}
