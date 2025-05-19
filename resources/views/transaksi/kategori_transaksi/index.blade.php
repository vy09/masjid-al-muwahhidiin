<x-app-layout :title="'Transaksi Masjid'">
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />
        <div class="container my-3 py-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-md-0 mb-4">
                        <h3 class="font-weight-semibold mb-1">Daftar Kategori Transaksi</h3>
                        <p class="text-sm mb-3"></p>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card border shadow-xs mb-4">
                                <div class="card-header border-bottom pb-0">
                                    <div class="d-sm-flex align-items-center mb-3">
                                        <div>
                                            <h6 class="font-weight-semibold text-lg mb-0">Kategori Transaksi</h6>
                                            <p class="text-sm mb-sm-0"></p>
                                        </div>
                                        <div class="ms-auto d-flex">
                                            <a type="button" href="{{ route('kategoriTransaksi.create') }}"
                                                class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0 me-2">
                                                <span class="btn-inner--text">Tambah Kategori</span>
                                            </a>
                                        </div>
                                    </div>
                                    @if (session('success'))
                                    <script>
                                        setTimeout(function() {
                                            document.getElementById('alert').style.display = 'none';
                                        }, 3000);
                                    </script>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endif
                                </div>
                                <div class="card-body px-0 py-0">
                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center justify-content-center mb-0 dataTable">
                                            <thead class="bg-gray-100">
                                                <tr>
                                                    <th>Nama Kategori Transaksi</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($kategoriTransaksi as $k)
                                                <tr>
                                                    <td>{{ $k->nama_kategori }}</td>
                                                    <td>
                                                        <a href="{{ route('kategoriTransaksi.edit', $k->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                        <form action="{{ route('kategoriTransaksi.destroy', $k->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
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