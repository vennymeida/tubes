<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembeli;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Auth;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembeli = Pembeli::where('id_users', Auth::user()->id)->first();
        return view('profil.index', compact('pembeli'));
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
      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pembeli = Pembeli::find($id);

        return view('profil.edit', ['pembeli' => $pembeli]);
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
        $pembeli = Pembeli::find($id);

        // $pembeli->id = $request->get('id');
        $pembeli->nama = $request->get('nama');
        $pembeli->alamat = $request->get('alamat');
        $pembeli->no = $request->get('no');
       
        if ($pembeli->foto && file_exists(storage_path('app/public/' . $pembeli->foto))) {
            Storage::delete('public/' . $pembeli->foto);
        }
        $image_name = $request->file('foto')->store('foto', 'public');
        $pembeli->foto = $image_name;

        $pembeli->save();
        return redirect()->route('pembeli.index')
            ->with('success', 'Pembeli Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
