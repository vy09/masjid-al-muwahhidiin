<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />

        <div class="px-5 py-4 container-fluid">
            <div class="mt-4 row">
                <div class="col-12">
                    <div class="card">
                        <di class="row">
                            <div class="col-6">
                                <div class="pb-0 card-header">
                                    <h5 class="">Tambah Kegiatan Masjid</h5>
                                </div>
                            </div>
                            <div class="col-6 text-end">
                                <a href="{{ route('kegiatan.index') }}" class="btn btn-dark btn-primary">
                                    <i class="fas fa-arrow-left me-2"></i> Kembali
                                </a>
                            </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('kegiatan.update', $kegiatan->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <label for="nama_kegiatan">Nama Kegiatan</label>
                            <input type="text" name="nama_kegiatan" id="nama_kegiatan" class="form-control"
                                placeholder="Masukkan nama kegiatan" value="{{ old('nama_kegiatan', $kegiatan->nama_kegiatan) }}">
                            @error('nama_kegiatan')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <label for="tanggal_kegiatan">Tanggal Kegiatan</label>
                            <input type="date" name="tanggal_kegiatan" id="tanggal_kegiatan" class="form-control"
                                value="{{ old('tanggal_kegiatan', $kegiatan->tanggal_kegiatan) }}">
                            @error('tanggal_kegiatan')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
                                        <input type="time" name="waktu_mulai" id="waktu_mulai" class="form-control" value="{{ old('waktu_mulai', $kegiatan->waktu_mulai) }}">
                                        @error('waktu_mulai')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="waktu_selesai" class="form-label">Waktu Selesai</label>
                                        <input type="time" name="waktu_selesai" id="waktu_selesai" class="form-control" value="{{ old('waktu_selesai', $kegiatan->waktu_selesai) }}">
                                        @error('waktu_selesai')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <label for="tempat_kegiatan">Tempat Kegiatan</label>
                            <input type="text" name="tempat_kegiatan" id="tempat_kegiatan" class="form-control"
                                placeholder="Masukkan tempat kegiatan" value="{{ old('tempat_kegiatan', $kegiatan->tempat_kegiatan) }}">
                            @error('tempat_kegiatan')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <label for="deskripsi_kegiatan">Deskripsi Kegiatan</label>
                            <textarea name="deskripsi_kegiatan" id="deskripsi_kegiatan" class="form-control"
                                placeholder="Masukkan deskripsi kegiatan">{{ old('deskripsi', $kegiatan->deskripsi_kegiatan) }}</textarea>
                            @error('deskripsi_kegiatan')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <label for="gambar_kegiatan">Gambar Kegiatan</label>
                            <input type="file" name="gambar_kegiatan" id="gambar_kegiatan" class="form-control"
                                accept="image/*" value="{{ old('gambar_kegiatan') }}">
                            @if ($kegiatan->gambar_kegiatan)
                                <img src="{{ asset('storage/' . $kegiatan->gambar_kegiatan) }}" alt="Gambar Kegiatan" class="img-thumbnail mt-2">
                            @endif
                            @error('gambar_kegiatan')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <button type="submit"
                                class="btn btn-primary btn-lg w-100 mt-4 mb-0">Tambah Kegiatan</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </main>
</x-app-layout>