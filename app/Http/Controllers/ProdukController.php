<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Penjual;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('search')) {
            $paginate = Produk::where('nama', 'like', '%' . request('search') . '%')
                                    ->paginate(5); // Mengambil semua isi tabel
                                    return view('produk.index', ['paginate'=>$paginate]);
        }else{
        //fungsi eloquent menampilkan data menggunakan pagination
        $produk = Produk::all(); // Mengambil semua isi tabel
        $paginate = Produk::orderBy('id', 'asc')->paginate(5);
        return view('produk.index', ['produk' => $produk,'paginate'=>$paginate]);
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('produk.create');

        $Produk =Produk::all(); // mendapatkan data dari tabel kelas
	    return view('produk.create',['id_penjual' => $Produk]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->file('foto')) {
            $image_name = $request->file('foto')->store('foto', 'public');
        }
        // //melakukan validasi data
        // $request->validate([
        //     'Id_penjual' => 'required',
        //     'Nama' => 'required',
        //     'Harga' => 'required',
        //     'Stok' => 'required',
        //     'Foto' => 'required'
        // ]);

        // //fungsi eloquent untuk menambah data
        // Produk::create($request->all());

        // //jika data berhasil ditambahkan, akan kembali ke halaman utama
        // return redirect()->route('produk.index')
        // ->with('success', 'Produk Berhasil Ditambahkan');
        // $Produk = Produk::find($request->get('id_penjual'));
        // Produk::create([
        //     $Produk->id_penjual = $request->id_penjual,
        //     $Produk->nama = $request->nama,
        //     $Produk->deskripsi = $request->deskripsi,
        //     $Produk->harga = $request->harga,
        //     $Produk->stok = $request->stok,
        // ]);
        // // $produk = Produk::find($request->get('id_penjual'));
        // Produk::create($request->all());
        // return redirect()->route('produk.index')
        //     ->with('success', 'Produk Berhasil Ditambahkan');

            $request->validate([
                'id_penjual' => 'required',
                'nama' => 'required',
                'deskripsi' => 'required',
                'harga' => 'required',
                'stok' => 'required',
               
            ]);
                       
            $Produk = new Produk;
            $Produk->nama = $request->get('nama');
            $Produk->deskripsi = $request->get('deskripsi');
            $Produk->harga = $request->get('harga');
            $Produk->stok = $request->get('stok');
            $Produk->foto = $image_name;
                
            $Penjual = Penjual::find($request->get('id_penjual'));
            //fungsi eloquent untuk menambah data dengan relasi belongsTo
    
            $Produk->penjual()->associate($Penjual);
            $Produk->save();
        
                         // Mahasiswa::create($request->all());
        
            //jika data berhasil ditambahkan, akan kembali ke halaman utama
            return redirect()->route('produk.index')
                ->with('success', 'Produk Berhasil Ditambahkan');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Produk = Produk::where('id', $id)->first();
        return view('produk.detail', compact('Produk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        // $Produk = DB::table('produk')->where('id', $id)->first();
        // return view('produk.edit', compact('Produk'));

        $Produk = Produk::find($id);

        return view('Produk.edit', ['produk' => $Produk]);

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
        // $request->validate([
        //     'Id_penjual' => 'required',
        //     'Nama' => 'required',
        //     'Harga' => 'required',
        //     'Stok' => 'required',
        //     'Foto' => 'required'
        // ]);
        // //fungsi eloquent untuk mengupdate data inputan kita
        // Produk::where('id', $id)
        // ->update([
        //     'id_penjual'=>$request->Id_penjual,
        //     'nama'=>$request->Nama,
        //     'harga'=>$request->Harga,
        //     'stok'=>$request->Stok,
        //     'foto'=>$request->Foto,
        // ]);
        // //jika data berhasil diupdate, akan kembali ke halaman utama
        // return redirect()->route('produk.index')
        // ->with('success', 'Produk Berhasil Diupdate');

        $Produk = Produk::find($id);

        $Produk->id_penjual = $request->id_penjual;
        $Produk->nama = $request->nama;
        $Produk->deskripsi = $request->deskripsi;
        $Produk->harga = $request->harga;
        $Produk->stok = $request->stok;

        if ($Produk->foto && file_exists(storage_path('app/public/' . $Produk->foto))) {
            Storage::delete('public/' . $Produk->foto);
        }
        $image_name = $request->file('foto')->store('foto', 'public');
        $Produk->foto = $image_name;

        $Produk->save();
        return redirect()->route('produk.index')
            ->with('success', 'Produk Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produk::where('id', $id)->delete();
         return redirect()->route('produk.index')
         -> with('success', 'Produk Berhasil Dihapus');
    }
    public function cetak_pdf()
    {
        $Produk = Produk::all();
        $pdf = PDF::loadview('produk.cetak_pdf',['produk'=>$Produk]);
        return $pdf->stream();
    }
    public function tampilan()
    {
        if (request('search')) {
            $paginate = Produk::where('nama', 'like', '%' . request('search') . '%')
                                    ->paginate(10); // Mengambil semua isi tabel
                                    return view('produk.tampilan', ['paginate'=>$paginate]);
        }else{
        //fungsi eloquent menampilkan data menggunakan pagination
        $produk = Produk::all(); // Mengambil semua isi tabel
             return view('produk.tampilan', ['produk' => $produk]);
    }
    }
}
