<x-app-layout :title="'Detail Kegiatan Masjid'">
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />
        <div class="container my-3 py-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-md-0 mb-4">
                        <h3 class="font-weight-semibold mb-1">Detail Kegiatan</h3>
                        <p class="text-sm mb-3">Ini adalah rincian lengkap tentang kegiatan masjid yang dipilih.</p>
                        

                    </div>
                    <div class="card border shadow-xs mb-4 rounded-2xl overflow-hidden">
                        <div class="card-body">
                        <a href="{{ route('kegiatan.index') }}" class="btn btn-dark position-absolute" style="top: 1rem; right: 1rem;">Kembali</a>
                            <h4 class="font-weight-semibold text-xl mb-2">{{ $kegiatan->nama_kegiatan }}</h4>
                            <p class="text-muted mb-4">Pengisi: {{ $kegiatan->nama_pengisi ?? 'Belum Ditentukan' }}</p>
                            <div class="mb-3">
                                <h6 class="text-sm font-weight-semibold">Tanggal:</h6>
                                <p>{{ $kegiatan->tanggal_kegiatan }}</p>
                            </div>
                            <div class="mb-3">
                                <h6 class="text-sm font-weight-semibold">Waktu:</h6>
                                <p>{{ $kegiatan->waktu_mulai ?? 'Belum Ditentukan' }} - {{ $kegiatan->waktu_selesai ?? 'Belum Ditentukan' }}</p>
                            </div>
                            <div class="mb-3">
                                <h6 class="text-sm font-weight-semibold">Tempat:</h6>
                                <p>{{ $kegiatan->tempat_kegiatan ?? 'Belum Ditentukan' }}</p>
                            </div>
                            <div class="mb-3">
                                <h6 class="text-sm font-weight-semibold">Deskripsi:</h6>
                                <p>{{ $kegiatan->deskripsi ?? 'Belum Ada Deskripsi' }}</p>
                            </div>
                            <div class="mb-3">
                                <h6 class="text-sm font-weight-semibold">Gambar:</h6>
                                @if($kegiatan->gambar)
                                <img src="{{ asset('storage/' . $kegiatan->gambar) }}" alt="{{ $kegiatan->nama_kegiatan }}" class="w-100" style="aspect-ratio: 3 / 4; max-width: 300px; object-fit: cover; border-radius: 1rem;  display: block;">
                                @endif
                            </div>
                            <div class="d-flex mt-4">
                                <a href="{{ route('kegiatan.edit', $kegiatan->id) }}" class="btn btn-warning me-2">Edit</a>
                                <form action="{{ route('kegiatan.destroy', $kegiatan->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>