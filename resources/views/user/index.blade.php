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
                                    <h5 class="">User Management</h5>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="{{ route('users.create') }}" class="btn btn-primary">
                                        <i class="fas fa-user-plus me-2"></i> Add Member
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
                        <div class="row justify-content-center">
                            <div class="">

                                @if (session('error'))
                                <div class="alert alert-danger" role="alert" id="alert">
                                    {{ session('error') }}
                                </div>
                                @endif
                            </div>
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
                                            Name</th>
                                        <th
                                            class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Email</th>
                                        <th
                                            class="text-center text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Role</th>
                                        <th
                                            class="text-center text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Creation Date</th>
                                        <th
                                            class="text-center text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $u )
                                    <tr>
                                        <td class="align-middle bg-transparent border-bottom">{{ $loop->iteration }}</td>
                                        <td class="align-middle bg-transparent border-bottom">{{ $u->name }}</td>
                                        <td class="align-middle bg-transparent border-bottom">{{ $u->email }}</td>
                                        <td class="text-center align-middle bg-transparent border-bottom">{{ $u->role->jabatan }}</td>
                                        <td class="text-center align-middle bg-transparent border-bottom">{{ \Carbon\Carbon::parse($u->created_at)->format('d M Y') }}</td>
                                        <td class="text-center align-middle bg-transparent border-bottom">
                                            <a href="{{ route('users.edit', $u->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('users.destroy', $u->id) }}" method="POST"
                                                class="d-inline" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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
        <x-app.footer />
    </main>

</x-app-layout>

<script src="/assets/js/plugins/datatables.js"></script>
<script>
    const dataTableBasic = new simpleDatatables.DataTable("#datatable-search", {
        searchable: true,
        fixedHeight: true,
        columns: [{
            select: [2, 6],
            sortable: false
        }]
    });
</script>