<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function transaksiSatuBulan(Request $request)
    {
        $tahun = $request->input('tahun', date('Y'));
        $bulan = $request->input('bulan', date('m'));

        $transaksis = Transaksi::whereYear('tanggal_transaksi', $tahun)
            ->whereMonth('tanggal_transaksi', $bulan)
            ->get();

        $pdf = Pdf::loadView('laporan.transaksisatu_bulan_pdf', compact('transaksis', 'tahun', 'bulan'));
        return $pdf->download('laporan-transaksi-' . $tahun . '-' . $bulan . '.pdf');
    }
}
//buatkan saya Controller pdf untuk data transaksisatuBulan
