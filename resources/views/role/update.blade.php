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
                                    <h5 class="">Edit Jabatan</h5>
                                </div>
                            </div>
                            <div class="col-6 text-end">
                                <a href="{{ route('roles.index') }}" class="btn btn-dark btn-primary">
                                    <i class="fas fa-arrow-left me-2"></i> Kembali
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('roles.update', $role->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <label for="jabatan">Nama Jabatan</label>
                                <input type="text" name="jabatan" id="jabatan" class="form-control"
                                    value="{{ $role->jabatan }}" placeholder="Masukkan nama jabatan">
                                @error('jabatan')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <button type="submit"
                                    class="btn btn-primary btn-lg w-100 mt-4 mb-0">Update Jabatan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>