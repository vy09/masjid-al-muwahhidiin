<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriTransaksi;

class KategoriTransaksiController extends Controller
{
    public function index()
    {
        $kategoriTransaksi = KategoriTransaksi::orderBy('created_at', 'desc')->get();
        return view('transaksi.kategori_transaksi.index', compact('kategoriTransaksi'));
    }

    public function create()
    {
        return view('transaksi.kategori_transaksi.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ], [
            'nama_kategori.required' => 'Nama Kategori wajib diisi',
            'nama_kategori.string' => 'Nama Kategori harus berupa string',
            'nama_kategori.max' => 'Nama Kategori tidak boleh lebih dari 255 karakter',
        ]);

        KategoriTransaksi::create([
            'nama_kategori' => ucwords($request->nama_kategori),
        ]);

        return redirect()->route('kategoriTransaksi.index')->with('success', 'Kategori Transaksi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kategoriTransaksi = KategoriTransaksi::findOrFail($id);
        return view('transaksi.kategori_transaksi.edit', compact('kategoriTransaksi'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ], [
            'nama_kategori.required' => 'Nama Kategori wajib diisi',
            'nama_kategori.string' => 'Nama Kategori harus berupa string',
            'nama_kategori.max' => 'Nama Kategori tidak boleh lebih dari 255 karakter',
        ]);
        $kategoriTransaksi = KategoriTransaksi::findOrFail($id);
        $kategoriTransaksi->nama_kategori = ucwords($request->nama_kategori);
        $kategoriTransaksi->save();

        return redirect()->route('kategoriTransaksi.index')->with('success', 'Kategori Transaksi berhasil diupdate.');
    }
    public function destroy($id)
    {
        $kategoriTransaksi = KategoriTransaksi::findOrFail($id);
        $kategoriTransaksi->delete();

        return redirect()->route('kategoriTransaksi.index')->with('success', 'Kategori Transaksi berhasil dihapus.');
    }
}
