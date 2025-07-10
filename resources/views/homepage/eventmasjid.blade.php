@extends('homepage')
@section('content')
<div
    class="hero page-inner overlay"
    style="background-image: url('assetsfe/images/img_bg.jpg')">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9 text-center mt-5">
                <h1 class="heading" data-aos="fade-up">Kegiatan Masjid</h1>
                <nav
                    aria-label="breadcrumb"
                    data-aos="fade-up"
                    data-aos-delay="200">
                    <ol class="breadcrumb text-center justify-content-center">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li
                            class="breadcrumb-item active text-white-50"
                            aria-current="page">
                            Kegiatan Masjid
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container my-3 py-3">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h3 class="font-weight-semibold mb-1">Kegiatan Masjid</h3>
                    <p class="text-sm mb-3">Temukan berbagai kegiatan yang akan datang dan yang telah selesai di masjid.</p>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-12">
                    <form action="{{ route('eventmasjid') }}" method="GET" class="d-flex align-items-center justify-content-center">
                        <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Cari kegiatan, pengisi, atau tempat..." class="form-control me-2 py-0" style="max-width: 500px;">
                        <button type="submit" class="btn btn-primary btn-lg">Cari</button>
                    </form>
                </div>
            </div>

            <div class="row">
                @foreach($kegiatanMasjid as $kegiatan)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card shadow-xs h-100 rounded-2xl overflow-hidden">
                        @if($kegiatan->gambar)
                        <img src="{{ asset('storage/' . $kegiatan->gambar) }}" alt="{{ $kegiatan->nama_kegiatan }}"
                            class="w-100" style="aspect-ratio: 3 / 4; object-fit: cover; border-radius: 1rem 1rem 0 0;">
                        @endif
                        <div class="card-body">
                            <h5 class="font-weight-semibold">{{ $kegiatan->nama_kegiatan }}</h5>
                            <p class="text-muted mb-2">Pengisi: {{ $kegiatan->nama_pengisi ?? 'Belum Ditentukan' }}</p>
                            <p class="text-muted mb-2">
                                <i class="fa fa-calendar"></i> {{ $kegiatan->tanggal_kegiatan }}
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fa fa-clock"></i> {{ $kegiatan->waktu_mulai ?? '-' }} - {{ $kegiatan->waktu_selesai ?? '-' }}
                            </p>
                            <p class="text-muted mb-2">
                                <i class="fa fa-map-marker-alt"></i> {{ $kegiatan->tempat_kegiatan ?? 'Belum Ditentukan' }}
                            </p>
                            <p class="text-muted mb-3">{{ Str::limit($kegiatan->deskripsi, 100, '...') ?? 'Belum Ada Deskripsi' }}</p>
                            <button type="button" class="btn btn-info w-100" data-bs-toggle="modal" data-bs-target="#eventDetailModal-{{ $kegiatan->id }}">Lihat Detail</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $kegiatanMasjid->links('vendor.pagination.custom') }}
            </div>
        </div>
    </div>
</div>

@foreach($kegiatanMasjid as $kegiatan)
<!-- Modal -->
<div class="modal fade" id="eventDetailModal-{{ $kegiatan->id }}" tabindex="-1" aria-labelledby="eventDetailModalLabel-{{ $kegiatan->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eventDetailModalLabel-{{ $kegiatan->id }}">{{ $kegiatan->nama_kegiatan }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Tanggal:</strong> {{ $kegiatan->tanggal_kegiatan }}</p>
                <p><strong>Waktu:</strong> {{ $kegiatan->waktu_mulai ?? 'Belum Ditentukan' }} - {{ $kegiatan->waktu_selesai ?? 'Belum Ditentukan' }}</p>
                <p><strong>Tempat:</strong> {{ $kegiatan->tempat_kegiatan ?? 'Belum Ditentukan' }}</p>
                <p><strong>Deskripsi:</strong> {{ $kegiatan->deskripsi ?? 'Belum Ada Deskripsi' }}</p>
                @if($kegiatan->gambar)
                <img src="{{ asset('storage/' . $kegiatan->gambar) }}" alt="{{ $kegiatan->nama_kegiatan }}" class="w-100" style="object-fit: cover; border-radius: 1rem; display: block;">
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection