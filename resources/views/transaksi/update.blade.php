<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />

        <div class="px-5 py-4 container-fluid">
            <div class="mt-4 row">
                <div class="col-12">
                    <div class="card">
                        <div class="row">
                            <div class="col-6">
                                <div class="pb-0 card-header">
                                    <h5 class="">Update Transaksi</h5>
                                </div>
                            </div>
                            <div class="col-6 text-end">
                                <a href="{{ route('transaksi.index') }}" class="btn btn-dark btn-primary">
                                    <i class="fas fa-arrow-left me-2"></i> Kembali
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
                                @csrf
                                @method('PUT')
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
                                    <input type="number" name="nominal" id="nominal" class="form-control" placeholder="Masukkan jumlah transaksi"
                                        value="{{ old('nominal', $transaksi->nominal) }}">
                                    @error('nominal')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="kategori_transaksi_id">Kategori Transaksi</label>
                                    <select name="kategori_transaksi_id" id="kategori_transaksi_id" class="form-control">
                                        <option value="">Pilih Kategori Transaksi</option>
                                        @foreach ($kategoriTransaksi as $kt)
                                        <option value="{{ old('kategori_transaksi_id', $kt->id) }}" {{ $kt->id == $transaksi->kategori_transaksi_id ? 'selected' : '' }}>{{ $kt->nama_kategori }}</option>
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
                                        <option value="pemasukan" {{ $transaksi->tipe_transaksi == 'pemasukan' ? 'selected' : '' }}>Pemasukan</option>
                                        <option value="pengeluaran" {{ $transaksi->tipe_transaksi == 'pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
                                    </select>
                                    @error('tipe_transaksi')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi">Deskripsi Transaksi</label>
                                    <input type="text" name="deskripsi" id="deskripsi" class="form-control"
                                        placeholder="Masukkan deskripsi transaksi" value="{{ old('deskripsi', $transaksi->deskripsi) }}">
                                    @error('deskripsi')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="tanggal_transaksi">Tanggal Transaksi</label>
                                    <input type="date" name="tanggal_transaksi" id="tanggal_transaksi" class="form-control"
                                        value="{{ old('tanggal_transaksi', isset($transaksi) ? \Carbon\Carbon::parse($transaksi->tanggal_transaksi)->format('Y-m-d') : '') }}">
                                    @error('tanggal_transaksi')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <button type="submit"
                                        class="btn btn-primary btn-lg w-100 mt-4 mb-0">Update Transaksi</button>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
</x-app-layout>