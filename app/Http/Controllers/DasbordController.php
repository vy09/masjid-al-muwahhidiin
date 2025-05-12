<?php

namespace App\Http\Controllers;

use App\Models\KegiatanJumat;
use App\Models\KegiatanMasjid;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DasbordController extends Controller
{

    public function index(Request $request)
    {
        // uang kategori sedekah ditotal setiap hari jum'at
        // Misalnya hari ini Jumat
        $jumatIni = Carbon::now()->startOfDay();

        // Ambil Sabtu sebelumnya (6 hari sebelum Jumat)
        $sabtu = $jumatIni->copy()->subDays(6); // dari hari Sabtu
        $kamis = $jumatIni->copy()->subDay();   // sampai hari Kamis

        $totalSodakohMingguan = Transaksi::whereHas('kategoriTransaksi', function ($query) {
            $query->where('nama_kategori', 'sedekah');
        })
            ->whereBetween('tanggal_transaksi', [$sabtu, $kamis])
            ->sum('nominal');

        $totalPemasukanBulanIni = Transaksi::where('tipe_transaksi', 'pemasukan')
            ->whereMonth('tanggal_transaksi', now()->month)
            ->whereYear('tanggal_transaksi', now()->year)
            ->sum('nominal');

        // Hitung total pengeluaran bulan ini
        $totalPengeluaranBulanIni = Transaksi::where('tipe_transaksi', 'pengeluaran')
            ->whereMonth('tanggal_transaksi', now()->month)
            ->whereYear('tanggal_transaksi', now()->year)
            ->sum('nominal');
        // Hitung saldo bulan ini
        $saldoBulanIni = $totalPemasukanBulanIni - $totalPengeluaranBulanIni;
        // Hitung total pemasukan
        $totalPemasukan = Transaksi::where('tipe_transaksi', 'pemasukan')->sum('nominal');

        // Hitung total pengeluaran
        $totalPengeluaran = Transaksi::where('tipe_transaksi', 'pengeluaran')->sum('nominal');

        // Hitung sisa saldo
        $sisaSaldo = $totalPemasukan - $totalPengeluaran;

        $kegiatanMasjid = KegiatanMasjid::all();
        $jumat = KegiatanJumat::all();


        return view('dashboard', compact(
            'totalPemasukanBulanIni',
            'totalPengeluaranBulanIni',
            'totalSodakohMingguan',
            'saldoBulanIni',
            'sisaSaldo',
            'kegiatanMasjid',
            'jumat'
        ));
    }
    public function homepage()
    {
        return view('homepage');
    }
}
