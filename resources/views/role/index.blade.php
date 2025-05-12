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
                                    <h5 class="">Jabatan List</h5>
                                </div>

                                <div class="col-6 text-end">
                                    <a href="{{ route('roles.create') }}" class="btn btn-primary mb-3">Add Jabatan</a>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <!-- Add any additional filters or search functionality here -->
                                        </div>
                                    </div>
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

                        <div class="table-responsive">
                            <table class="table text-secondary text-center">

                                <thead>
                                    <tr>
                                        <th
                                            class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            NO</th>
                                        <th
                                            class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Jabatan Name</th>
                                        <th
                                            class="text-center text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Action</th>
                                    </tr>
                                </thead>
                                @if ($role->count() == 0)
                                <tbody>
                                    <tr>
                                        <td colspan="3" class="text-center">No data available</td>
                                    </tr>
                                </tbody>
                                @else
                                <tbody>
                                    @foreach ($role as $r)
                                    <tr>
                                        <td class="align-middle bg-transparent border-bottom">{{ $loop->iteration }}</td>
                                        <td class="align-middle bg-transparent border-bottom">{{ $r->jabatan }}</td>
                                        <td class="text-center align-middle bg-transparent border-bottom">
                                            <a href="{{ route('roles.edit', $r->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('roles.destroy', $r->id) }}" method="POST"
                                                class="d-inline" onsubmit="return confirm('Are you sure you want to delete this role?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-app.footer />
    </main>
</x-app-layout>