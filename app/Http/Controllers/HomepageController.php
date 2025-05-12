<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Carbon\Carbon;
use App\Models\KegiatanJumat;
use App\Models\KegiatanMasjid;

class HomepageController extends Controller
{
    public function index()
    {
        $title = 'Homepage';

        return view('homepage.index', compact('title'));
    }

    public function transaction(Request $request)
    {
        $title = 'Laporan Keuangan';
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
        $transaksisatuBulan = Transaksi::whereMonth('tanggal_transaksi', now()->month)
            ->whereYear('tanggal_transaksi', now()->year)
            ->orderBy('tanggal_transaksi', 'desc')
            ->get();
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

        $tahun = $request->input('tahun', date('Y')); // Ambil tahun dari inputan pengguna
        //jumlah total pemasukan dan pengeluaran pertahun
        $totalPemasukanTahun = Transaksi::whereYear('tanggal_transaksi', $tahun)
            ->where('tipe_transaksi', 'pemasukan')
            ->sum('nominal');

        $totalPengeluaranTahun = Transaksi::whereYear('tanggal_transaksi', $tahun)
            ->where('tipe_transaksi', 'pengeluaran')
            ->sum('nominal');
        // Hitung data bulanan  
        foreach (range(1, 12) as $bulan) {
            $pemasukan = Transaksi::whereYear('tanggal_transaksi', $tahun)
                ->whereMonth('tanggal_transaksi', $bulan)
                ->where('tipe_transaksi', 'pemasukan')
                ->sum('nominal') ?? 0;

            $pengeluaran = Transaksi::whereYear('tanggal_transaksi', $tahun)
                ->whereMonth('tanggal_transaksi', $bulan)
                ->where('tipe_transaksi', 'pengeluaran')
                ->sum('nominal') ?? 0;

            $data[] = [
                'bulan' => \Carbon\Carbon::create()->month($bulan)->locale('id')->translatedFormat('F'),
                'pemasukan' => $pemasukan,
                'pengeluaran' => $pengeluaran,
            ];
        }
        // Hitung sisa saldo
        $sisaSaldo = $totalPemasukan - $totalPengeluaran;
        return view('homepage.transaction', compact(
            'title',
            'totalSodakohMingguan',
            'totalPemasukanBulanIni',
            'totalPengeluaranBulanIni',
            'saldoBulanIni',
            'totalPemasukan',
            'totalPengeluaran',
            'sisaSaldo',
            'transaksisatuBulan',
            'data',
            'totalPemasukanTahun',
            'totalPengeluaranTahun'
        ));
    }
    public function eventmasjid(Request $request)
    {
        $title = 'Kegiatan Masjid';
        $search = $request->input('search');

        // Menambahkan fitur pencarian
        $kegiatanMasjid = KegiatanMasjid::when($search, function ($query, $search) {
            return $query->where('nama_kegiatan', 'LIKE', "%$search%")
                ->orWhere('nama_pengisi', 'LIKE', "%$search%")
                ->orWhere('deskripsi', 'LIKE', "%$search%")
                ->orWhere('tempat_kegiatan', 'LIKE', "%$search%");
        })
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        // Menambahkan parameter search ke pagination
        $kegiatanMasjid->appends(['search' => $search]);

        return view('homepage.eventmasjid', compact('title', 'kegiatanMasjid', 'search'));
    }
    public function eventjumat(Request $request)
    {
        $title = 'Kegiatan Jumat';
        $search = $request->input('search');

        //tampilan jumat
        $jumat = KegiatanJumat::when($search, function ($query, $search) {
            return $query->where('nama_kegiatan', 'LIKE', "%$search%")
                ->orWhere('nama_pengisi', 'LIKE', "%$search%")
                ->orWhere('deskripsi', 'LIKE', "%$search%")
                ->orWhere('tempat_kegiatan', 'LIKE', "%$search%");
        })
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        return view('homepage.eventjumat', compact(
            'title',
            'jumat',
            'search'

        ));
    }
    public function about()
    {
        $title = 'About';

        return view('homepage.tentang', compact('title'));
    }

    public function remajamasjid()
    {
        $title = 'Remaja Masjid';

        return view('homepage.irma', compact('title'));
    }
    public function visimisi()
    {   
        $title = 'Visi Misi';

        return view('homepage.vismis', compact('title'));
    }
}
