<x-app-layout :title="'Transaksi Masjid'">
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />
        <div class="container my-3 py-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-md-0 mb-4">
                        <h3 class="font-weight-semibold mb-1">Daftar Kegiatan</h3>
                        <p class="text-sm mb-3">Ini adalah rincian tentang kegiatan acara yang akan dilakukan dan telah dilakukan.</p>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card border shadow-xs mb-4">
                                <div class="card-header border-bottom pb-0">
                                    <div class="d-sm-flex align-items-center mb-3">
                                        <div>
                                            <h6 class="font-weight-semibold text-lg mb-0">Kegiatan Masjid</h6>
                                            <p class="text-sm mb-sm-0">Ini adalah rincian tentang kegiatan masjid</p>
                                        </div>
                                        <div class="ms-auto d-flex">
                                            <a type="button" href="{{ route('kegiatan.create') }}"
                                                class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0 me-2">
                                                <span class="btn-inner--text">Tambah Kegiatan</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 py-0">
                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center justify-content-center mb-0 dataTable">
                                            <thead class="bg-gray-100">
                                                <tr>
                                                    <th>Nama Kegiatan</th>
                                                    <th>Tanggal Kegiatan</th>
                                                    <th>Waktu Kegiatan</th>
                                                    <th>Tempat Kegiatan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($kegiatanMasjid as $kegiatan)
                                                <tr>
                                                    <td>{{ $kegiatan->nama_kegiatan }}</td>
                                                    <td>{{ $kegiatan->tanggal_kegiatan }}</td>
                                                    <td>{{ $kegiatan->waktu_mulai }} - {{ $kegiatan->waktu_selesai }}</td>
                                                    <td>{{ $kegiatan->tempat_kegiatan }}</td>
                                                    <td>
                                                        <a href="{{ route('kegiatan.show', $kegiatan->id) }}" class="btn btn-info">Detail </a>
                                                        <a href="{{ route('kegiatan.edit', $kegiatan->id) }}" class="btn btn-warning">Edit</a>
                                                        <form action="{{ route('kegiatan.destroy', $kegiatan->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
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
        </div>
        <x-app.footer />
    </main>
</x-app-layout>