<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi Bulanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1, h2, h3 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .summary {
            margin-top: 20px;
        }
        .summary p {
            font-weight: bold;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #555;
        }
    </style>
</head>
<body>
    <h1>Laporan Transaksi Bulanan</h1>
    <h3>Bulan: {{ $bulan }} {{ $tahun }}</h3>
    
    <div class="summary">
        <p>Total Pemasukan: Rp {{ number_format($transaksis->where('tipe_transaksi', 'pemasukan')->sum('nominal'), 2, ',', '.') }}</p>
        <p>Total Pengeluaran: Rp {{ number_format($transaksis->where('tipe_transaksi', 'pengeluaran')->sum('nominal'), 2, ',', '.') }}</p>
        <p>Saldo Akhir: Rp {{ number_format($transaksis->where('tipe_transaksi', 'pemasukan')->sum('nominal') - $transaksis->where('tipe_transaksi', 'pengeluaran')->sum('nominal'), 2, ',', '.') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Tipe</th>
                <th>Nominal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksis as $index => $transaksi)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ \Carbon\Carbon::parse($transaksi->tanggal_transaksi)->format('d-m-Y H:i') }}</td>
                    <td>{{ $transaksi->kategoriTransaksi->nama_kategori ?? 'Tanpa Kategori' }}</td>
                    <td>{{ $transaksi->deskripsi ?? '-' }}</td>
                    <td>{{ ucfirst($transaksi->tipe_transaksi) }}</td>
                    <td>Rp {{ number_format($transaksi->nominal, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Dicetak pada {{ now()->format('d-m-Y H:i') }}
    </div>
</body>
</html>
