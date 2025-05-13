<?php

namespace App\Http\Controllers;

use App\Models\KategoriTransaksi;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        // all transaksi
        $transaksiAll = Transaksi::all();
        // transaksi harian bulan ini
        $transaksiHarian = Transaksi::where('tanggal_transaksi', '>=', now()->startOfDay())
            ->whereMonth('tanggal_transaksi', now()->month)
            ->orderBy('tanggal_transaksi', 'desc')
            ->get();
        // transaksi 1 mingguan dalam bulan saat ini
        $transaksiSatuMinggu = Transaksi::where('tanggal_transaksi', '>=', now()->subDays(7))
            ->whereMonth('tanggal_transaksi', now()->month)
            ->whereYear('tanggal_transaksi', now()->year)
            ->orderBy('tanggal_transaksi', 'desc')
            ->get();
        // transaksi 1 bulan saat ini
        $transaksisatuBulan = Transaksi::whereMonth('tanggal_transaksi', now()->month)
            ->whereYear('tanggal_transaksi', now()->year)
            ->orderBy('tanggal_transaksi', 'desc')
            ->get();

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
        // Hitung total pemasukan dan pengeluaran hari ini
        $totalPemasukanHariIni = Transaksi::where('tipe_transaksi', 'pemasukan')
            ->whereDate('tanggal_transaksi', now())
            ->sum('nominal');
        $totalPengeluaranHariIni = Transaksi::where('tipe_transaksi', 'pengeluaran')
            ->whereDate('tanggal_transaksi', now())
            ->sum('nominal');
        // Hitung saldo hari ini
        $saldoHariIni = $totalPemasukanHariIni - $totalPengeluaranHariIni;
        // Hitung total pemasukan bulan ini
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

        $tahun = $request->input('tahun', date('Y')); // default tahun sekarang
        $data = [];

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

        //jumlah total pemasukan dan pengeluaran pertahun
        $totalPemasukanTahun = Transaksi::whereYear('tanggal_transaksi', $tahun)
            ->where('tipe_transaksi', 'pemasukan')
            ->sum('nominal');

        $totalPengeluaranTahun = Transaksi::whereYear('tanggal_transaksi', $tahun)
            ->where('tipe_transaksi', 'pengeluaran')
            ->sum('nominal');
        // SEARCH
        $query = Transaksi::with(['user', 'kategoriTransaksi']);

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('deskripsi', 'like', '%' . $search . '%')
                    ->orWhere('nominal', 'like', '%' . $search . '%')
                    ->orWhere('tipe_transaksi', 'like', '%' . $search . '%');
            });
        }

        $transaksiSearch = $query->orderBy('tanggal_transaksi', 'desc')->paginate(10);

        return view('transaksi.index', compact(
            'transaksisatuBulan',
            'transaksiHarian',
            'transaksiSatuMinggu',
            'transaksiAll',
            'totalSodakohMingguan',
            'totalPemasukanBulanIni',
            'totalPengeluaranBulanIni',
            'saldoBulanIni',
            'sisaSaldo',
            'data',
            'tahun',
            'transaksiSearch',
            'totalPemasukanTahun',
            'totalPengeluaranTahun'
        ));
    }

    public function create()
    {
        $kategoriTransaksi = KategoriTransaksi::all();
        $tipe_transaksi = ['pemasukan', 'pengeluaran'];
        return view('transaksi.create', compact('kategoriTransaksi', 'tipe_transaksi'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'nominal' => 'required|numeric',
            'kategori_transaksi_id' => 'required|exists:kategori_transaksis,id',
            'tanggal_transaksi' => 'required|date',
            'tipe_transaksi' => 'required'
        ], [
            'nominal.required' => 'Nominal wajib diisi',
            'kategori_transaksi_id.required' => 'Kategori transaksi wajib diisi',
            'tanggal_transaksi.required' => 'Tanggal transaksi wajib diisi',
            'tipe_transaksi.required' => 'Tipe transaksi wajib diisi'
        ]);

        Transaksi::create([
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'kategori_transaksi_id' => $request->kategori_transaksi_id,
            'nominal' => $request->nominal,
            'tipe_transaksi' => $request->tipe_transaksi,
            'keterangan' => $request->deskripsi,
            'user_id' => Auth::id(),
            'deskripsi' => $request->deskripsi ?? null,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaction created successfully.');
    }

    public function edit($id)
    {
        $kategoriTransaksi = KategoriTransaksi::all();
        $tipe_transaksi = ['pemasukan', 'pengeluaran'];
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksi.update', compact('id', 'kategoriTransaksi', 'tipe_transaksi', 'transaksi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nominal' => 'required|numeric',
            'kategori_transaksi_id' => 'required|exists:kategori_transaksis,id',
            'tanggal_transaksi' => 'required|date',
        ], [
            'nominal.required' => 'Nominal wajib diisi',
            'kategori_transaksi_id.required' => 'Kategori transaksi wajib diisi',
            'tanggal_transaksi.required' => 'Tanggal transaksi wajib diisi',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update([
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'kategori_transaksi_id' => $request->kategori_transaksi_id,
            'nominal' => $request->nominal,
            'tipe_transaksi' => $request->tipe_transaksi,
            'keterangan' => $request->deskripsi,
            'user_id' => Auth::id(),
            'deskripsi' => $request->deskripsi ?? null,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaction updated successfully.');
    }

    public function destroy($id)
    {
        // Logic to delete the transaction
        $transaksi = Transaksi::find($id);
        if (!$transaksi) {
            return redirect()->route('transaksi.index')->with('error', 'Transaction not found.');
        }
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'Transaction deleted successfully.');
    }
    public function downloadPdf(Request $request)
    {
        // Ambil bulan dari input, default ke bulan ini jika tidak ada input
        $bulanInput = $request->input('bulan', date('F'));

        // Daftar nama bulan dalam bahasa Indonesia
        $bulanNama = [
            'januari' => 1,
            'februari' => 2,
            'maret' => 3,
            'april' => 4,
            'mei' => 5,
            'juni' => 6,
            'juli' => 7,
            'agustus' => 8,
            'september' => 9,
            'oktober' => 10,
            'november' => 11,
            'desember' => 12,
        ];

        // Konversi nama bulan ke angka
        $bulan = $bulanNama[strtolower($bulanInput)] ?? date('n');
        $tahun = date('Y');

        // Ambil semua data transaksi untuk bulan yang dipilih
        $transaksis = Transaksi::whereYear('tanggal_transaksi', $tahun)
            ->whereMonth('tanggal_transaksi', $bulan)
            ->get();

        // Format data untuk PDF
        $data = [
            'bulan' => ucfirst(array_search($bulan, $bulanNama)),  // Menampilkan nama bulan
            'tahun' => $tahun,
            'transaksis' => $transaksis,
        ];
        // dd($data);
        // Buat PDF
        $pdf = Pdf::loadView('transaksi.laporan', $data);

        return $pdf->download('laporan-bulanan-' . $bulanInput . '-' . $tahun . '.pdf');
    }



    public function chartData(Request $request)
    {
        $filter = $request->get('filter', '12months');
        $now = Carbon::now();
        $data = [];

        if ($filter === '12months') {
            $startDate = $now->copy()->startOfYear();
            $endDate = $now->copy()->endOfYear();

            $transaksis = Transaksi::whereBetween('tanggal_transaksi', [$startDate, $endDate])->get();

            for ($i = 1; $i <= 12; $i++) {
                $data[] = [
                    'label' => Carbon::create()->month($i)->locale('id')->translatedFormat('F'),
                    'pemasukan' => 0,
                    'pengeluaran' => 0,
                ];
            }

            foreach ($transaksis as $t) {
                $index = Carbon::parse($t->tanggal_transaksi)->month - 1;
                if ($t->tipe_transaksi === 'pemasukan') {
                    $data[$index]['pemasukan'] += $t->nominal;
                } else {
                    $data[$index]['pengeluaran'] += $t->nominal;
                }
            }
        } elseif ($filter === '30days') {
            $startDate = $now->copy()->subDays(29);
            $transaksis = Transaksi::where('tanggal_transaksi', '>=', $startDate)->get();

            for ($i = 0; $i < 30; $i++) {
                $tanggal = $now->copy()->subDays(29 - $i)->format('d M');
                $data[$tanggal] = ['label' => $tanggal, 'pemasukan' => 0, 'pengeluaran' => 0];
            }

            foreach ($transaksis as $t) {
                $key = Carbon::parse($t->tanggal_transaksi)->format('d M');
                if (!isset($data[$key])) continue;

                if ($t->tipe_transaksi === 'pemasukan') {
                    $data[$key]['pemasukan'] += $t->nominal;
                } else {
                    $data[$key]['pengeluaran'] += $t->nominal;
                }
            }

            $data = array_values($data);
        } elseif ($filter === '7days') {
            $startDate = $now->copy()->subDays(6);
            $transaksis = Transaksi::where('tanggal_transaksi', '>=', $startDate)->get();

            for ($i = 0; $i < 7; $i++) {
                $hari = $now->copy()->subDays(6 - $i)->locale('id')->translatedFormat('D');
                $data[$hari] = ['label' => $hari, 'pemasukan' => 0, 'pengeluaran' => 0];
            }

            foreach ($transaksis as $t) {
                $key = Carbon::parse($t->tanggal_transaksi)->locale('id')->translatedFormat('D');
                if (!isset($data[$key])) continue;

                if ($t->tipe_transaksi === 'pemasukan') {
                    $data[$key]['pemasukan'] += $t->nominal;
                } else {
                    $data[$key]['pengeluaran'] += $t->nominal;
                }
            }

            $data = array_values($data);
        }

        return response()->json($data);
    }
}
