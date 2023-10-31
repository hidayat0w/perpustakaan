<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = kategori::all();

        return view('kategori.index', compact('kategori'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $kategori = new kategori;
        $kategori->kode = $request->kode;
        $kategori->nama = $request->nama;

        $kategori->save();

        return redirect('kategori')->with('sukses', 'Data Berhasil Disimpan');
    }

    public function edit($id)
    {
        $kategori = Kategori::find($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $kategori = kategori::find($id);
        $kategori->kode = $request->kode;
        $kategori->nama = $request->nama;
        $kategori->update();

        return redirect('kategori')->with('sukses', 'Data Berhasil Diubah');

    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();

        return redirect('kategori')->with('sukses', 'Data Berhasil Dihapus');
    }
}
