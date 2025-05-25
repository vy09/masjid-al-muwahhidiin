<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />

        <div class="px-5 py-4 container-fluid">
            <div class="mt-4 row">
                <div class="col-12">
                    <div class="card">
                        <div class="pb-0 card-header">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="">Tambah Transaksi</h5>
                                    <p class="mb-0 text-sm">
                                        Silahkan isi form dibawah ini untuk menambah transaksi baru.
                                    </p>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="{{ route('transaksi.index') }}" class="btn btn-dark btn-primary">
                                        <i class="fas fa-arrow-left me-2"></i> Kembali
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('transaksi.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="user_id">Penginput Data</label>
                                        <input type="text" name="user_id" id="user_id" class="form-control"
                                            placeholder="Masukkan nama jabatan" value="{{ old('user_id', Auth::user()->name) }}" readonly>
                                        @error('user_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="nominal">Jumlah Transaksi</label>
                                        <!-- Input tampil ke user -->
                                        <input type="text" id="nominal_display" class="form-control" placeholder="Masukkan jumlah transaksi">

                                        <!-- Input hidden untuk dikirim ke server -->
                                        <input type="hidden" name="nominal" id="nominal" value="{{ old('nominal') }}">
                                        @error('nominal')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="kategori_transaksi_id">Kategori Transaksi</label>
                                        <select name="kategori_transaksi_id" id="kategori_transaksi_id" class="form-control">
                                            <option value="">Pilih Kategori Transaksi</option>
                                            @foreach ($kategoriTransaksi as $kt)
                                            <option value="{{ old('kategori_transaksi_id', $kt->id) }}">{{ $kt->nama_kategori }}</option>
                                            @endforeach
                                        </select>
                                        @error('kategori_transaksi_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="tipe_transaksi">Tipe Transaksi</label>
                                        <select name="tipe_transaksi" id="tipe_transaksi" class="form-control">
                                            <option value="">Pilih Tipe Transaksi</option>
                                            <option value="pemasukan">Pemasukan</option>
                                            <option value="pengeluaran">Pengeluaran</option>
                                        </select>
                                        @error('tipe_transaksi')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsi">Deskripsi Transaksi</label>
                                        <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Masukkan deskripsi transaksi">{{ old('deskripsi') }}</textarea>
                                        @error('deskripsi')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="tanggal_transaksi">Tanggal Transaksi</label>
                                        <input type="date" name="tanggal_transaksi" id="tanggal_transaksi" class="form-control"
                                            value="{{ old('tanggal_transaksi') }}">
                                        @error('tanggal_transaksi')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <button type="submit"
                                            class="btn btn-primary btn-lg w-100 mt-4 mb-0">Tambah Transaksi</button>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <script>
                const display = document.getElementById('nominal_display');
                const hidden = document.getElementById('nominal');

                function formatRupiah(angka) {
                    const numberString = angka.replace(/[^,\d]/g, '').toString();
                    const split = numberString.split(',');
                    let sisa = split[0].length % 3;
                    let rupiah = split[0].substr(0, sisa);
                    const ribuan = split[0].substr(sisa).match(/\d{3}/g);

                    if (ribuan) {
                        rupiah += (sisa ? '.' : '') + ribuan.join('.');
                    }

                    return 'Rp ' + rupiah;
                }

                display.addEventListener('input', function() {
                    let value = this.value.replace(/[^\d]/g, '');

                    // Maksimal 13 digit untuk nominal (karena DECIMAL(15,2))
                    if (value.length > 13) {
                        alert("Nominal terlalu besar. Maksimum 13 digit angka diperbolehkan.");
                        value = value.slice(0, 13);
                    }

                    hidden.value = value;
                    this.value = formatRupiah(value);
                });

                // Tampilkan format saat halaman diload jika ada old value
                window.addEventListener('DOMContentLoaded', () => {
                    if (hidden.value) {
                        display.value = formatRupiah(hidden.value);
                    }
                });
            </script>


    </main>
</x-app-layout>