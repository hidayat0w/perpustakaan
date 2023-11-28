<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;
use App\Models\kategori;
use App\Models\penerbit;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::all();

        return view('buku.index', compact('buku'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        $penerbit = Penerbit::all();

        return view('buku.create', compact('kategori', 'penerbit'));
    }

    public function store(Request $request)
    {
        $image = $request->file('gambar');
        $image->storeAs('public/buku', $image->hashName());
        Buku::create([
            'kode' => $request->kode,
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
            'penerbit_id' => $request->penerbit_id,
            'isbn' => $request->isbn,
            'pengarang' => $request->pengarang,
            'jumlah_halaman' => $request->jumlah_halaman,
            'stok' => $request->stok,
            'tahun_terbit' => $request->tahun_terbit,
            'sinopsis' => $request->sinopsis,
            'gambar' => $image->hashName(),
        ]);

        return redirect('buku')->with('sukses', 'Data Berhasil Disimpan');
    }

    public function show()
    {

    }

    public function destroy($id)
    {
        $buku = Buku::find($id);
        $buku->delete();

        return redirect('buku.index')->with('sukses', 'Data Berhasil Dihapus');
    }

    public function edit($id)
    {
        $buku = Buku::find($id);
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::find($id);
        $buku->kode = $request->kode;
        $buku->judul = $request->judul;
        $buku->kategori_id = $request->kategori_id;
        $buku->penerbit_id = $request->penerbit_id;
        $buku->isbn = $request->isbn;
        $buku->pengarang = $request->pengarang;
        $buku->jumlah_halaman = $request->jumlah_halaman;
        $buku->stok = $request->stok;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->sinopsis = $request->sinopsis;
        // $anggota->alamat = $request->alamat;
        $buku->gambar = $request->gambar;
        $buku->update();

        return redirect('buku')->with('edit','Edit Berhasil Hore');
    }
}
