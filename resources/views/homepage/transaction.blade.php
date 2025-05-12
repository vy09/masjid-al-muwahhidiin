@extends('homepage')
@section('content')

<div
    class="hero page-inner overlay"
    style="background-image: url('assetsfe/images/img_bg.jpg')">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9 text-center mt-5">
                <h1 class="heading" data-aos="fade-up">Laporan Keuangan</h1>

                <nav
                    aria-label="breadcrumb"
                    data-aos="fade-up"
                    data-aos-delay="200">
                    <ol class="breadcrumb text-center justify-content-center">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li
                            class="breadcrumb-item active text-white-50"
                            aria-current="page">
                            Laporan Keuangan
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="section section-4 bg-light">
    <div class="container">
        <div class="row section-counter mt-5 text-center">
            <div
                class="col-6 col-sm-6 col-md-6 col-lg-3"
                data-aos="fade-up"
                data-aos-delay="300">
                <div class="counter-wrap mb-5 mb-lg-0">
                    <span class="number"><span class="caption" style="color:rgb(13, 66, 42);">Rp. {{ number_format($sisaSaldo, 0, ',', '.') }} </span></span>
                    <span class="caption text-black-50">Saldo saat ini</span>
                </div>
            </div>
            <div
                class="col-6 col-sm-6 col-md-6 col-lg-3"
                data-aos="fade-up"
                data-aos-delay="400">
                <div class="counter-wrap mb-5 mb-lg-0">
                    <span class="number"><span class="caption" style="color: rgb(13, 66, 42);">Rp. {{ number_format($totalPemasukanBulanIni, 0, ',', '.') }} </span></span>
                    <span class="caption text-black-50">Pemasukan Bulan Ini</span>
                </div>
            </div>
            <div
                class="col-6 col-sm-6 col-md-6 col-lg-3"
                data-aos="fade-up"
                data-aos-delay="500">
                <div class="counter-wrap mb-5 mb-lg-0">
                    <span class="number"><span class="caption" style="color: rgb(13, 66, 42);">Rp. {{ number_format($totalPengeluaranBulanIni, 0, ',', '.') }}</span></span>
                    <span class="caption text-black-50">Pengeluaran Bulan Ini </span>
                </div>
            </div>
            <div
                class="col-6 col-sm-6 col-md-6 col-lg-3"
                data-aos="fade-up"
                data-aos-delay="600">
                <div class="counter-wrap mb-5 mb-lg-0">
                    <span class="number"><span class="caption" style="color: rgb(13, 66, 42);">Rp. {{ number_format($totalSodakohMingguan, 0, ',', '.') }}</span></span>
                    <span class="caption text-black-50">Total Sedekah Minggu ini</span>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<div class="section">
    <div class="container">
        <div class="row mb-5 align-items-center">
            <div class="col-lg-6">
                <h2 class="font-weight-bold text-primary heading">
                    Daftar Laporan PerBulan
                </h2>
                <p class="text-sm mb-2">Ini adalah rincian tentang laporan keuangan masjid dalam sebulan yang telah dilakukan.</p>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card border shadow-sm mb-4">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0 dataTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Jumlah</th>
                                                <th scope="col">Kategori</th>
                                                <th scope="col">Deskripsi</th>
                                                <th scope="col">Tipe</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($transaksisatuBulan->isEmpty())
                                            <tr>
                                                <td colspan="5" class="text-center text-muted py-4">Tidak ada transaksi bulanan yang tersedia.</td>
                                            </tr>
                                            @else
                                            @foreach ($transaksisatuBulan as $tb)
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($tb->tanggal_transaksi)->format('d-m-Y') }}</td>
                                                <td>Rp {{ number_format($tb->nominal, 0, ',', '.') }}</td>
                                                <td>{{ $tb->kategoriTransaksi->nama_kategori }}</td>
                                                <td>{{ $tb->deskripsi ?: 'Tidak ada deskripsi' }}</td>
                                                <td>{{ $tb->tipe_transaksi }}</td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row mb-5 align-items-center">
            <div class="col-lg-6">
                <h2 class="font-weight-bold text-primary heading">
                    Daftar Laporan Tahun ini
                </h2>
                <p class="text-sm mb-2">Ini adalah rincian tentang laporan keuangan masjid dalam sebulan yang telah dilakukan.</p>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card border shadow-sm mb-4">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="d-flex align-items-center py-4 px-5 text-sm">
                                                    <span class="text-xs font-weight-semibold opacity-7 ms-1">Bulan</span>
                                                </th>
                                                <th class="align-items-center py-4 px-5 text-sm opacity-7 ps-2">Pemasukan
                                                </th>
                                                <th class="align-items-center py-4 px-5 text-sm opacity-7 ps-2">Pengeluaran
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                            <tr>
                                                <td class="d-flex align-items-center py-4 px-5 text-sm">
                                                    <span class="text-dark ms-1">{{ $item['bulan'] }}</span>
                                                </td>
                                                <td>
                                                    <span class="text-sm">Rp {{ number_format($item['pemasukan'], 0, ',', '.') }}</span>
                                                </td>
                                                <td>
                                                    <span class="text-sm">Rp {{ number_format($item['pengeluaran'], 0, ',', '.') }}</span>
                                                </td>
                                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card shadow-xs border mb-4">
                    <div class="card-body py-0">
                        <div class="row">
                            <div class="col-4 pe-1">
                                <div class="chart">
                                    <canvas id="chart-doughnut-info" class="chart-canvas"
                                        height="150"></canvas>
                                </div>
                            </div>
                            <div class="col-8 my-auto">
                                <div class="d-flex">
                                    <div>
                                        <h4 class="font-weight-semibold text-lg  mt-4 mb-4">Jumlah Total Pemasukan Tahun ini</h4>
                                        <p class="text-sm mb-1">Current Balance</p>
                                        <h3 class="mb-5 font-weight-bold">Rp {{ number_format($totalPemasukanTahun, 0, ',', '.') }}</h3>
                                    </div>
                                    <div class="ms-auto text-end d-flex flex-column">
                                        <div class="dropdown">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="currentColor"
                                                class="ms-auto cursor-pointer dropdown-toggle  mt-4 "
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <path fill-rule="evenodd"
                                                    d="M10.5 6a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zm0 6a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zm0 6a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <ul class="dropdown-menu dropdown-menu-end  mt-4 me-n4">
                                                <li><a class="dropdown-item" href="#">Action</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#">Another
                                                        action</a></li>
                                                <li><a class="dropdown-item" href="#">Something else
                                                        here</a></li>
                                            </ul>
                                        </div>
                                        <span
                                            class="badge badge-sm border border-success text-success bg-success border-radius-sm mt-auto mb-2">
                                            <svg width="9" height="9" viewBox="0 0 10 9"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M0.46967 4.46967C0.176777 4.76256 0.176777 5.23744 0.46967 5.53033C0.762563 5.82322 1.23744 5.82322 1.53033 5.53033L0.46967 4.46967ZM5.53033 1.53033C5.82322 1.23744 5.82322 0.762563 5.53033 0.46967C5.23744 0.176777 4.76256 0.176777 4.46967 0.46967L5.53033 1.53033ZM5.53033 0.46967C5.23744 0.176777 4.76256 0.176777 4.46967 0.46967C4.17678 0.762563 4.17678 1.23744 4.46967 1.53033L5.53033 0.46967ZM8.46967 5.53033C8.76256 5.82322 9.23744 5.82322 9.53033 5.53033C9.82322 5.23744 9.82322 4.76256 9.53033 4.46967L8.46967 5.53033ZM1.53033 5.53033L5.53033 1.53033L4.46967 0.46967L0.46967 4.46967L1.53033 5.53033ZM4.46967 1.53033L8.46967 5.53033L9.53033 4.46967L5.53033 0.46967L4.46967 1.53033Z"
                                                    fill="#67C23A" />
                                            </svg>
                                            10.5%
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card shadow-xs border mb-4">
                    <div class="card-body py-0">
                        <div class="row">
                            <div class="col-4 pe-1">
                                <div class="chart">
                                    <canvas id="chart-doughnut-dark" class="chart-canvas"
                                        height="150"></canvas>
                                </div>
                            </div>
                            <div class="col-8 my-auto">
                                <div class="d-flex">
                                    <div>
                                        <h4 class="font-weight-semibold text-lg  mt-4  mb-4">Jumlah Total Pengeluaran Tahun ini</h4>
                                        <p class="text-sm mb-1">Current Balance</p>
                                        <h3 class="mb-5 font-weight-bold ">Rp {{ number_format($totalPengeluaranTahun, 0, ',', '.') }}</h3>
                                    </div>
                                    <div class="ms-auto text-end d-flex flex-column">
                                        <div class="dropdown">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="currentColor"
                                                class="ms-auto cursor-pointer dropdown-toggle  mt-4 "
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <path fill-rule="evenodd"
                                                    d="M10.5 6a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zm0 6a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zm0 6a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <ul class="dropdown-menu dropdown-menu-end  mt-4  me-n4">
                                                <li><a class="dropdown-item" href="#">Action</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#">Another
                                                        action</a></li>
                                                <li><a class="dropdown-item" href="#">Something else
                                                        here</a></li>
                                            </ul>
                                        </div>
                                        <span
                                            class="badge badge-sm border border-success text-success bg-success border-radius-sm mt-auto mb-2">
                                            <svg width="9" height="9" viewBox="0 0 10 9"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M0.46967 4.46967C0.176777 4.76256 0.176777 5.23744 0.46967 5.53033C0.762563 5.82322 1.23744 5.82322 1.53033 5.53033L0.46967 4.46967ZM5.53033 1.53033C5.82322 1.23744 5.82322 0.762563 5.53033 0.46967C5.23744 0.176777 4.76256 0.176777 4.46967 0.46967L5.53033 1.53033ZM5.53033 0.46967C5.23744 0.176777 4.76256 0.176777 4.46967 0.46967C4.17678 0.762563 4.17678 1.23744 4.46967 1.53033L5.53033 0.46967ZM8.46967 5.53033C8.76256 5.82322 9.23744 5.82322 9.53033 5.53033C9.82322 5.23744 9.82322 4.76256 9.53033 4.46967L8.46967 5.53033ZM1.53033 5.53033L5.53033 1.53033L4.46967 0.46967L0.46967 4.46967L1.53033 5.53033ZM4.46967 1.53033L8.46967 5.53033L9.53033 4.46967L5.53033 0.46967L4.46967 1.53033Z"
                                                    fill="#67C23A" />
                                            </svg>
                                            33.8%
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Services Section -->
@endsection