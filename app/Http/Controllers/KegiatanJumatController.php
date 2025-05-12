<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanJumat;

class KegiatanJumatController extends Controller
{
    public function index()
    {
        // Ambil semua data kegiatan Jumat
        $jumat = KegiatanJumat::all();
        return view('jumat.index', compact('jumat'));
    }

    public function create()
    {

        $jumat = KegiatanJumat::all();
        return view('jumat.create', compact('jumat'));
    }

    public function store(Request $request)
    {
        // Validasi dan simpan data kegiatan Jumat
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'nama_khatib' => 'required|string|max:255',
            'nama_muadzin' => 'required|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'tempat_kegiatan' => 'required|string|max:255',
        ]);


        $jumat  = new KegiatanJumat();
        $jumat->nama_kegiatan = $request->nama_kegiatan;
        $jumat->nama_khatib = $request->nama_khatib;
        $jumat->nama_muadzin = $request->nama_muadzin;
        $jumat->tanggal_kegiatan = $request->tanggal_kegiatan;
        $jumat->tempat_kegiatan = $request->tempat_kegiatan;
        $jumat->save();


        return redirect()->route('jumat.index')->with('success', 'Kegiatan Jumat berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Ambil data kegiatan Jumat berdasarkan ID
        $jumat = KegiatanJumat::findOrFail($id);

        return view('jumat.update', compact('jumat'));
    }

    public function update(Request $request, $id)
    {
        // Validasi dan update data kegiatan Jumat
        $request->validate([ 
            'nama_kegiatan' => 'required|string|max:255',
            'nama_khatib' => 'required|string|max:255',
            'nama_muadzin' => 'required|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'tempat_kegiatan' => 'required|string|max:255',
        ]);
        $jumat  = KegiatanJumat::findOrFail($id);
        $jumat->nama_kegiatan = $request->nama_kegiatan;
        $jumat->nama_khatib = $request->nama_khatib;
        $jumat->nama_muadzin = $request->nama_muadzin;
        $jumat->tanggal_kegiatan = $request->tanggal_kegiatan;
        $jumat->tempat_kegiatan = $request->tempat_kegiatan;
        $jumat->save();

        return redirect()->route('jumat.index')->with('success', 'Kegiatan Jumat berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus data kegiatan Jumat berdasarkan ID
        $jumat = KegiatanJumat::findOrFail($id);
        $jumat->delete();

        return redirect()->route('jumat.index')->with('success', 'Kegiatan Jumat berhasil dihapus.');
    }

    public function dashboard()
    {
        // Ambil semua data kegiatan Jumat
        $jumat = KegiatanJumat::all();

        return response()->json($jumat);
    }
}
