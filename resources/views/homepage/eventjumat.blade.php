@extends('homepage')
@section('content')
<div
    class="hero page-inner overlay"
    style="background-image: url('assetsfe/images/img_bg.jpg')">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9 text-center mt-5">
                <h1 class="heading" data-aos="fade-up">Kegiatan Jumat</h1>
                <nav
                    aria-label="breadcrumb"
                    data-aos="fade-up"
                    data-aos-delay="200">
                    <ol class="breadcrumb text-center justify-content-center">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li
                            class="breadcrumb-item active text-white-50"
                            aria-current="page">
                            Kegiatan Jumat
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row mb-5 align-items-center">
            <div class="col-lg-6">
                <h2 class="font-weight-bold text-primary heading">
                    Daftar Kegiatan Jumat
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
                                                    <span class="text-xs font-weight-semibold opacity-7 ms-1">Nama Khatib
                                                </th>
                                                <th class="align-items-center py-4 px-5 text-sm opacity-7 ps-2">Nama Muadzin
                                                </th>
                                                <th class="align-items-center py-4 px-5 text-sm opacity-7 ps-2">Tanggal Kegiatan
                                                </th>
                                                <th class="align-items-center py-4 px-5 text-sm opacity-7 ps-2">Tempat Kegiatan
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($jumat as $kj)
                                            <tr>
                                                <td class="d-flex align-items-center py-4 px-5 text-sm">
                                                    {{ $kj->nama_khatib }}</span>
                                                </td>
                                                <td>
                                                    <span class="text-sm">{{ $kj->nama_muadzin }}</span>
                                                </td>
                                                <td>
                                                    <span class="text-sm">{{ $kj->tanggal_kegiatan }}</span>
                                                </td>
                                                <td>
                                                    <span class="text-sm">{{$kj->tempat_kegiatan }}</span>
                                                </td>
                                            </tr>
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
        {{ $jumat->links('vendor.pagination.custom') }}
    </div>
</div>
@endsection