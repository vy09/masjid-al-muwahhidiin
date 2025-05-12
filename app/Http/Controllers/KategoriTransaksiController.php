<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriTransaksi;

class KategoriTransaksiController extends Controller
{
    //buatkan kategori transaksi
    public function create(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'kategori_transaksi' => 'required|string|max:255',
        ], [
            'kategori_transaksi.required' => 'Kategori Transaksi wajib diisi',
            'kategori_transaksi.string' => 'Kategori Transaksi harus berupa string',
            'kategori_transaksi.max' => 'Kategori Transaksi tidak boleh lebih dari 255 karakter',
        ]);
        $kategoriTransaksi = new KategoriTransaksi();
        $kategoriTransaksi->kategori_transaksi = $request->kategori_transaksi;
        $kategoriTransaksi->save();
        return redirect()->route('kategori_transaksi.index')->with('success', 'Kategori Transaksi berhasil ditambahkan.');
    }
    public function index()
    {
        $kategoriTransaksi = KategoriTransaksi::all();
        return view('kategori_transaksi.index', compact('kategoriTransaksi'));
    }

    public function show($id)
    {
        $kategoriTransaksi = KategoriTransaksi::findOrFail($id);
        return view('kategori_transaksi.show', compact('kategoriTransaksi'));
    }
    public function edit($id)
    {
        $kategoriTransaksi = KategoriTransaksi::findOrFail($id);
        return view('kategori_transaksi.edit', compact('kategoriTransaksi'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori_transaksi' => 'required|string|max:255',
        ], [
            'kategori_transaksi.required' => 'Kategori Transaksi wajib diisi',
            'kategori_transaksi.string' => 'Kategori Transaksi harus berupa string',
            'kategori_transaksi.max' => 'Kategori Transaksi tidak boleh lebih dari 255 karakter',
        ]);
        $kategoriTransaksi = KategoriTransaksi::findOrFail($id);
        $kategoriTransaksi->kategori_transaksi = $request->kategori_transaksi;
        $kategoriTransaksi->save();
        return redirect()->route('kategori_transaksi.index')->with('success', 'Kategori Transaksi berhasil diupdate.');
    }
    public function destroy($id)
    {
        $kategoriTransaksi = KategoriTransaksi::findOrFail($id);
        $kategoriTransaksi->delete();
        return redirect()->route('kategori_transaksi.index')->with('success', 'Kategori Transaksi berhasil dihapus.');
    }
}
