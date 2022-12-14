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

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // $transaksi = Transaksi::all(); // Mengambil semua isi tabel
        $transaksi = Transaksi::with('user')->get();
        $paginate = Transaksi::with('user')->orderBy('id', 'asc')->paginate(5);
        return view('transaksi.index', ['transaksi' => $transaksi,'paginate'=>$paginate]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $details = Detail::where('id', $id)->first();
        // return view('pesan', compact('details'));
        $transaksi = Transaksi::where('id', $id)->first();
    	$details = Detail::where('id_transaksi', $transaksi->id)->get();
     	return view('transaksi.detail', compact('transaksi','details'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi = Transaksi::find($id);
        return view('transaksi.edit', ['transaksi' => $transaksi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::find($id);

        $transaksi->id_pembeli = $request->id_pembeli;
        $transaksi->tanggal = $request->tanggal;
        $transaksi->total = $request->total;
        
        $transaksi->save();
        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detail = Detail::where('id', $id)->first();
        $transaksi = Transaksi::where('id', $detail->id_transaksi)->first();
        $transaksi->total = $transaksi->subtotal-$detail->subtotal;
        $transaksi->update();
        $detail->delete();
        return redirect('checkout')-> with('success', 'Produk Berhasil Dihapus');
    }
    public function pesan(Request $request, $id)
    {   
        $produk = Produk::where('id', $id)->first();
        $tanggal = Carbon::now();
        //validasi apakah melebihi stok
        if($request->jumlah_transaksi > $produk->stok)
        {
            return redirect('pesan/'.$id);
        }
        //cek validasi
        $cek_transaksi = Transaksi::where('id_users', Auth::user()->id)->where('status',0)->first();
        //simpan ke database pesanan
        if(empty($cek_transaksi))
        {
            $transaksi = new Transaksi;
            $transaksi->id_users = Auth::user()->id;
            $transaksi->tanggal = $tanggal;
            $transaksi->status = 0;
            $transaksi->total = 0;
            $transaksi->kode = mt_rand(100, 999);
            $transaksi->save();
        }
        
        //simpan ke database pesanan detail
        $transaksi_baru = Transaksi::where('id_users', Auth::user()->id)->where('status',0)->first();
        //cek pesanan detail
        $cek_detail = Detail::where('id_produk', $produk->id)->where('id_transaksi', $transaksi_baru->id)->first();
        if(empty($cek_detail))
        {
            $detail = new Detail;
            $detail->id_produk = $produk->id;
            $detail->id_transaksi = $transaksi_baru->id;
            $detail->jumlah = $request->jumlah_pesan;
            $detail->subtotal = $produk->harga*$request->jumlah_pesan;
            $detail->save();
        }else 
        {
            $detail = Detail::where('id_produk', $produk->id)->where('id_transaksi', $transaksi_baru->id)->first();
            $detail->jumlah = $detail->jumlah+$request->jumlah_pesan;
            //harga sekarang
            $harga_detail_baru = $produk->harga*$request->jumlah_pesan;
            $detail->subtotal = $detail->subtotal+$harga_detail_baru;
            $detail->update();
        }
        //jumlah total
        $transaksi = Transaksi::where('id_users', Auth::user()->id)->where('status',0)->first();
        $transaksi->total = Detail::where('id_transaksi', $transaksi->id)->sum('subtotal');
        $transaksi->update();
        
        // Alert::success('Transaksi Sukses Masuk Keranjang', 'Success');
        return redirect('checkout');
    }
    public function checkout()
    {
        $transaksi = Transaksi::where('id_users', Auth::user()->id)->where('status',0)->first();
        if(!empty($transaksi))
        {
            $details = Detail::where('id_transaksi', $transaksi->id)->get();
        }
        
        return view('checkout', compact('transaksi', 'details'));
    }
    public function konfirmasi()
    {
        $transaksi = Transaksi::where('id_users', Auth::user()->id)->where('status',0)->first();
        $id_transaksi = $transaksi->id;
        $transaksi->status = 1;
        $transaksi->update();
        $details = Detail::where('id_transaksi', $id_transaksi)->get();
        foreach ($details as $detail) {
            $produk = Produk::where('id', $detail->id_produk)->first();
            $produk->stok = $produk->stok-$detail->jumlah;
            $produk->update();
        }
        return redirect('pesan/'.$id_transaksi);
    }
    public function keranjang($id)
    {
        $produk = Produk::where('id', $id)->first();
        return view('keranjang', compact('produk'));
    }
    public function cetak_transaksi()
    {
        $transaksi = Transaksi::all();
        $pdf = PDF::loadview('transaksi.cetak_transaksi',['transaksi'=>$transaksi]);
        return $pdf->stream();
    }
}
