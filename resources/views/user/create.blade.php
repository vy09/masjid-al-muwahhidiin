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
                                    <h5 class="">Tambah User</h5>
                                    <p class="mb-0 text-sm">
                                        Silahkan isi form dibawah ini untuk menambah user baru.
                                    </p>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="{{ route('users.index') }}" class="btn btn-dark btn-primary">
                                        <i class="fas fa-arrow-left me-2"></i> Kembali
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="card">
                                    <div class="card-body">
                                        @if (session('error'))
                                        <div class="alert alert-danger" role="alert" id="alert">
                                            {{ session('error') }}
                                        </div>
                                        @endif
                                        @if (session('success'))
                                        <div class="alert alert-success" role="alert" id="alert">
                                            {{ session('success') }}
                                        </div>
                                        @endif
                                        <form action="{{ route('users.store') }}" method="POST">
                                            @csrf
                                            <div class="div">
                                                <label for="name">Nama</label>
                                                <input type="text" name="name" id="name" class="form-control"
                                                    placeholder="Masukkan nama lengkap">
                                                @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="div">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" id="email" class="form-control"
                                                    placeholder="Masukkan email">
                                                @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="div">
                                                <label for="password">Password</label>
                                                <input type="password" name="password" id="password"
                                                    class="form-control" placeholder="Masukkan password">
                                                @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="div">
                                                <label for="password_confirmation">Konfirmasi Password</label>
                                                <input type="password" name="password_confirmation" id="password_confirmation"
                                                    class="form-control" placeholder="Masukkan konfirmasi password">
                                                @error('password_confirmation')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="div">
                                                <label for="role_id">Role</label>
                                                <select name="role_id" id="role_id" class="form-control">
                                                    <option value="" disabled selected>Pilih role</option>
                                                    @foreach ($role as $r)
                                                    <option value="{{ $r->id }}">{{ $r->jabatan }}</option>
                                                    @endforeach
                                                </select>
                                                @error('role_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>


                                            <button type="submit"
                                                class="btn btn-primary btn-lg w-100 mt-4 mb-0">Tambah User</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>