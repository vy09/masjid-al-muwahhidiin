<?php

namespace App\Http\Controllers;

use App\Models\KegiatanJumat;
use App\Models\KegiatanMasjid;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KegiatanMasjidController extends Controller
{
    public function index()
    {
        // Get all kegiatan masjid
        $kegiatanMasjid = KegiatanMasjid::all();
        $jumat = KegiatanJumat::all();
        return view('events.index', compact('kegiatanMasjid', 'jumat'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'nama_pengisi' => 'nullable|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
            'tempat_kegiatan' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:99999',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $kegiatan = new KegiatanMasjid();
        $kegiatan->nama_kegiatan = $request->nama_kegiatan;
        $kegiatan->nama_pengisi = $request->nama_pengisi;
        $kegiatan->tanggal_kegiatan = $request->tanggal_kegiatan;
        $kegiatan->waktu_mulai = $request->waktu_mulai;
        $kegiatan->waktu_selesai = $request->waktu_selesai;
        $kegiatan->tempat_kegiatan = $request->tempat_kegiatan;
        $kegiatan->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            // Upload the file to storage/app/public/kegiatan_masjid
            $path = $request->file('gambar')->store('kegiatan_masjid', 'public');
            $kegiatan->gambar = $path;
        }

        $kegiatan->save();

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $kegiatan = KegiatanMasjid::findOrFail($id);
        return view('events.update', compact('kegiatan'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'nama_pengisi' => 'nullable|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
            'tempat_kegiatan' => 'required|string|max:99999',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $kegiatan = KegiatanMasjid::findOrFail($id);
        $kegiatan->nama_kegiatan = $request->nama_kegiatan;
        $kegiatan->nama_pengisi = $request->nama_pengisi;
        $kegiatan->tanggal_kegiatan = $request->tanggal_kegiatan;
        $kegiatan->waktu_mulai = $request->waktu_mulai;
        $kegiatan->waktu_selesai = $request->waktu_selesai;
        $kegiatan->tempat_kegiatan = $request->tempat_kegiatan;
        $kegiatan->deskripsi = $request->deskripsi;

        // Handling image upload
        if ($request->hasFile('gambar')) {
            // Delete old image if it exists
            if ($kegiatan->gambar && Storage::disk('public')->exists($kegiatan->gambar)) {
                Storage::disk('public')->delete($kegiatan->gambar);
            }

            // Upload new image
            $path = $request->file('gambar')->store('kegiatan_masjid', 'public');
            $kegiatan->gambar = $path;
        }

        $kegiatan->save();

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kegiatan = KegiatanMasjid::findOrFail($id);
    
        // Check if the image exists in storage and delete it
        if ($kegiatan->gambar && Storage::disk('public')->exists($kegiatan->gambar)) {
            Storage::disk('public')->delete($kegiatan->gambar);
        }
    
        // Delete the database record
        $kegiatan->delete();
    
        // Redirect with success message
        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dihapus.');
    }
    public function event()
    {
        $kegiatanMasjid = KegiatanMasjid::all();
        $jumat = KegiatanJumat::all();

        return response()->json([
            'kegiatanMasjid' => $kegiatanMasjid,
            'jumat' => $jumat,
        ]);
    }
    public function show($id)
    {
        $kegiatan = KegiatanMasjid::findOrFail($id);
        return view('events.show', compact('kegiatan'));
    }
}
