<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-app.navbar />

        <!-- get any error validasi -->
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Perhatian!</strong> {{ $errors->first() }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="px-5 py-4 container-fluid">
            <div class="mt-4 row">
                <div class="col-12">
                    <div class="card">
                        <div class="pb-0 card-header">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="">Tambah Jadwal</h5>
                                    <p class="mb-0 text-sm">
                                        Silahkan isi form dibawah ini untuk menambah jadwal baru.
                                    </p>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="{{ route('jumat.index') }}" class="btn btn-dark btn-primary">
                                        <i class="fas fa-arrow-left me-2"></i> Kembali
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('jumat.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <label for="nama_kegiatan">Nama Kegiatan</label>
                                    <input type="text" name="nama_kegiatan" id="nama_kegiatan" class="form-control"
                                        placeholder="Masukkan nama kegiatan" value="{{ old('nama_kegiatan') }}">
                                    @error('nama_kegiatan')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <label for="nama_khatib">Nama Khatib</label>
                                    <input type="text" name="nama_khatib" id="nama_khatib" class="form-control"
                                        placeholder="Masukkan nama kegiatan" value="{{ old('nama_kegiatan') }}">
                                    @error('nama_khatib')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <label for="nama_muadzin">Nama Muadzin</label>
                                    <input name="nama_muadzin" id="nama_muadzin" class="form-control"
                                        placeholder="Masukkan deskripsi kegiatan" value="{{ old('nama_muadzin') }}"></input>
                                    @error('nama_muadzin')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <label for="tanggal_kegiatan">Tanggal Kegiatan</label>
                                    <input type="date" name="tanggal_kegiatan" id="tanggal_kegiatan" class="form-control"
                                        value="{{ old('tanggal_kegiatan') }}">
                                    @error('tanggal_kegiatan')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <label for="tempat_kegiatan">Tempat Kegiatan</label>
                                    <input type="text" name="tempat_kegiatan" id="tempat_kegiatan" class="form-control"
                                        placeholder="Masukkan tempat kegiatan" value="{{ old('tempat_kegiatan') }}">
                                    @error('tempat_kegiatan')
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