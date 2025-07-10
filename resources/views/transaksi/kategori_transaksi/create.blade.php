<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
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
                        <div class="row">
                            <div class="col-6">
                                <div class="pb-0 card-header">
                                    <h5 class="">Tambah Kategori Keuangan</h5>
                                </div>
                            </div>
                            <div class="col-6 text-end">
                                <a href="{{ route('kategoriTransaksi.index') }}" class="btn btn-dark btn-primary">
                                    <i class="fas fa-arrow-left me-2"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('kategoriTransaksi.store') }}" method="POST">
                            @csrf
                            <label for="nama_kategori">Nama Kategori</label>
                            <input type="text" name="nama_kategori" id="nama_kategori" class="form-control"
                                placeholder="Masukkan nama kategori, contoh: Zakat"
                                value="{{ old('nama_kategori') }}">
                            @error('nama_kategori')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>

                    <button type="submit"
                        class="btn btn-primary w-100 mt-4 mb-0">Tambah Kategori</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>