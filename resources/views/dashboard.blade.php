<x-app-layout :title="'Dashboard Masjid'">

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />
        <div class="container-fluid py-4 px-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-md-flex align-items-center mb-3 mx-2">
                        <div class="mb-md-0 mb-3">
                            <h3 class="font-weight-bold mb-0">Hello, {{ auth()->user()->name }}</h3>
                            <p class="mb-0">Selamat Datang di KeuMas Al-Muwahhidin</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-3">
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-xl-0">
                    <div class="card border shadow-xs mb-4">
                        <div class="card-body text-start p-3 w-100">
                            <div
                                class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                                <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M4.5 3.75a3 3 0 00-3 3v.75h21v-.75a3 3 0 00-3-3h-15z" />
                                    <path fill-rule="evenodd"
                                        d="M22.5 9.75h-21v7.5a3 3 0 003 3h15a3 3 0 003-3v-7.5zm-18 3.75a.75.75 0 01.75-.75h6a.75.75 0 010 1.5h-6a.75.75 0 01-.75-.75zm.75 2.25a.75.75 0 000 1.5h3a.75.75 0 000-1.5h-3z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="w-100">
                                        <p class="text-sm text-secondary mb-1">Saldo saat ini</p>
                                        <h4 class="mb-2 font-weight-bold">Rp. {{ number_format($sisaSaldo, 0, ',', '.') }} </h4>
                                        <div class="d-flex align-items-center">
                                            <span class="text-sm text-success font-weight-bolder">
                                                <i class="fa fa-chevron-up text-xs me-1"></i>10.5%
                                            </span>
                                            <span class="text-sm ms-1"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0">
                    <div class="card border shadow-xs mb-4">
                        <div class="card-body text-start p-3 w-100">
                            <div
                                class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M7.5 5.25a3 3 0 013-3h3a3 3 0 013 3v.205c.933.085 1.857.197 2.774.334 1.454.218 2.476 1.483 2.476 2.917v3.033c0 1.211-.734 2.352-1.936 2.752A24.726 24.726 0 0112 15.75c-2.73 0-5.357-.442-7.814-1.259-1.202-.4-1.936-1.541-1.936-2.752V8.706c0-1.434 1.022-2.7 2.476-2.917A48.814 48.814 0 017.5 5.455V5.25zm7.5 0v.09a49.488 49.488 0 00-6 0v-.09a1.5 1.5 0 011.5-1.5h3a1.5 1.5 0 011.5 1.5zm-3 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                                        clip-rule="evenodd" />
                                    <path
                                        d="M3 18.4v-2.796a4.3 4.3 0 00.713.31A26.226 26.226 0 0012 17.25c2.892 0 5.68-.468 8.287-1.335.252-.084.49-.189.713-.311V18.4c0 1.452-1.047 2.728-2.523 2.923-2.12.282-4.282.427-6.477.427a49.19 49.19 0 01-6.477-.427C4.047 21.128 3 19.852 3 18.4z" />
                                </svg>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="w-100">
                                        <p class="text-sm text-secondary mb-1">Pemasukan Bulan Ini</p>
                                        <h4 class="mb-2 font-weight-bold">Rp. {{ number_format($totalPemasukanBulanIni, 0, ',', '.') }}</h4>
                                        <div class="d-flex align-items-center">
                                            <span class="text-sm text-success font-weight-bolder">
                                                <i class="fa fa-chevron-up text-xs me-1"></i>55%
                                            </span>
                                            <span class="text-sm ms-1">from 243</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0">
                    <div class="card border shadow-xs mb-4">
                        <div class="card-body text-start p-3 w-100">
                            <div
                                class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M3 6a3 3 0 013-3h12a3 3 0 013 3v12a3 3 0 01-3 3H6a3 3 0 01-3-3V6zm4.5 7.5a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0v-2.25a.75.75 0 01.75-.75zm3.75-1.5a.75.75 0 00-1.5 0v4.5a.75.75 0 001.5 0V12zm2.25-3a.75.75 0 01.75.75v6.75a.75.75 0 01-1.5 0V9.75A.75.75 0 0113.5 9zm3.75-1.5a.75.75 0 00-1.5 0v9a.75.75 0 001.5 0v-9z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="w-100">
                                        <p class="text-sm text-secondary mb-1">Pengeluaran Bulan Ini</p>
                                        <h4 class="mb-2 font-weight-bold">Rp. {{ number_format($totalPengeluaranBulanIni, 0, ',', '.') }}</h4>
                                        <div class="d-flex align-items-center">
                                            <span class="text-sm text-success font-weight-bolder">
                                                <i class="fa fa-chevron-up text-xs me-1"></i>22%
                                            </span>
                                            <span class="text-sm ms-1">from $369.30</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card border shadow-xs mb-4">
                        <div class="card-body text-start p-3 w-100">
                            <div
                                class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.25 2.25a3 3 0 00-3 3v4.318a3 3 0 00.879 2.121l9.58 9.581c.92.92 2.39 1.186 3.548.428a18.849 18.849 0 005.441-5.44c.758-1.16.492-2.629-.428-3.548l-9.58-9.581a3 3 0 00-2.122-.879H5.25zM6.375 7.5a1.125 1.125 0 100-2.25 1.125 1.125 0 000 2.25z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="w-100">
                                        <p class="text-sm text-secondary mb-1">Total Sedekah Minggu ini</p>
                                        <h4 class="mb-2 font-weight-bold">Rp. {{ number_format($totalSodakohMingguan, 0, ',', '.') }}</h4>
                                        <div class="d-flex align-items-center">
                                            <span class="text-sm text-success font-weight-bolder">
                                                <i class="fa fa-chevron-up text-xs me-1"></i>18%
                                            </span>
                                            <span class="text-sm ms-1">from $19,800.40</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row my-4">
                <div class="col-lg-4 col-md-6 mb-md-0 mb-4">
                    <div class="card shadow-xs border h-100">
                        <div class="card-header pb-0">
                            <h6 class="font-weight-semibold text-lg mb-0">Balances over time</h6>
                            <p class="text-sm">Here you have details about the balance.</p>
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="filter" id="12months" value="12months" autocomplete="off" checked>
                                <label class="btn btn-white px-3 mb-0" for="12months">12 months</label>

                                <input type="radio" class="btn-check" name="filter" id="30days" value="30days" autocomplete="off">
                                <label class="btn btn-white px-3 mb-0" for="30days">30 days</label>

                                <input type="radio" class="btn-check" name="filter" id="7days" value="7days" autocomplete="off">
                                <label class="btn btn-white px-3 mb-0" for="7days">7 days</label>
                            </div>
                        </div>
                        <div class="card-body py-3">
                            <div class="chart mb-2">
                                <canvas id="chart-barsz" class="chart-canvas" height="240"></canvas>
                            </div>
                            <button class="btn btn-white mb-0 ms-auto">View report</button>
                        </div>

                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script>
                            let chartInstance;

                            function fetchDataAndRenderChart(filter = '12months') {
                                fetch(`/chart-data?filter=${filter}`)
                                    .then(res => res.json())
                                    .then(data => {
                                        const labels = data.map(item => item.label);
                                        const pemasukan = data.map(item => parseFloat(item.pemasukan));
                                        const pengeluaran = data.map(item => parseFloat(item.pengeluaran));

                                        const ctx = document.getElementById('chart-barsz').getContext('2d');
                                        if (chartInstance) chartInstance.destroy();

                                        chartInstance = new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels: labels,
                                                datasets: [{
                                                        label: 'Pemasukan',
                                                        data: pemasukan,
                                                        backgroundColor: '#67c23a'
                                                    },
                                                    {
                                                        label: 'Pengeluaran',
                                                        data: pengeluaran,
                                                        backgroundColor: '#ee321d'
                                                    }
                                                ]
                                            },
                                            options: {
                                                responsive: true,
                                                plugins: {
                                                    legend: {
                                                        position: 'top'
                                                    },
                                                    title: {
                                                        display: true,
                                                        text: 'Grafik Transaksi'
                                                    }
                                                },
                                                scales: {
                                                    y: {
                                                        beginAtZero: true
                                                    }
                                                }
                                            }
                                        });
                                    });
                            }

                            // Load default
                            fetchDataAndRenderChart();

                            // Listen to radio button changes
                            document.querySelectorAll('input[name="filter"]').forEach(radio => {
                                radio.addEventListener('change', () => {
                                    if (radio.checked) {
                                        fetchDataAndRenderChart(radio.value);
                                    }
                                });
                            });
                        </script>
                    </div>

                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="card shadow-xs border">
                        <div class="card-header border-bottom pb-0">
                            <div class="d-sm-flex align-items-center mb-3">
                                <div>
                                    <h6 class="font-weight-semibold text-lg mb-0">Daftar Kegiatan </h6>
                                    <p class="text-sm mb-sm-0 mb-2">berikut detail daftar kegiatan</p>
                                </div>
                            </div>
                            <div class="pb-3 d-sm-flex align-items-center">
                                <!-- Tombol Tab -->
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="btnradiotable" id="btnradiotable2" autocomplete="off" checked>
                                    <label class="btn btn-white px-3 mb-0" for="btnradiotable2">Kegiatan Masjid</label>

                                    <input type="radio" class="btn-check" name="btnradiotable" id="btnradiotable3" autocomplete="off">
                                    <label class="btn btn-white px-3 mb-0" for="btnradiotable3">Kegiatan Jumat</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 py-0">
                            <div class="table-responsive p-0" id="tableMasjid">
                                <table class="table align-items-center justify-content-center mb-0 dataTable">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7">Nama Kegiatan</th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Tanggal Kegiatan</th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Waktu Kegiatan</th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Tempat Kegiatan</th>
                                    </thead>
                                    <tbody>
                                        @foreach($kegiatanMasjid as $kegiatan)
                                        <tr>
                                            <td>{{ $kegiatan->nama_kegiatan }}</td>
                                            <td>{{ $kegiatan->tanggal_kegiatan }}</td>
                                            <td>{{ $kegiatan->waktu_mulai }} - {{ $kegiatan->waktu_selesai }}</td>
                                            <td>{{ $kegiatan->tempat_kegiatan }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="table-responsive p-0" style="display: none;" id="tableJumat">
                                <table class="table align-items-center justify-content-center mb-0 dataTable">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7">Nama Kegiatan</th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Nama Imam</th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Nama Muadzin</th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Tanggal Kegiatan</th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Tempat Kegiatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($jumat as $kj)
                                        <tr>
                                            <td>{{ $kj->nama_kegiatan }}</td>
                                            <td>{{ $kj->nama_khatib}}</td>
                                            <td>{{ $kj->nama_muadzin }}</td>
                                            <td>{{ $kj->tanggal_kegiatan}}</td>
                                            <td>{{ $kj->tempat_kegiatan }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                document.getElementById('btnradiotable2').addEventListener('change', function() {
                    document.getElementById('tableMasjid').style.display = 'block';
                    document.getElementById('tableJumat').style.display = 'none';
                });

                document.getElementById('btnradiotable3').addEventListener('change', function() {
                    document.getElementById('tableMasjid').style.display = 'none';
                    document.getElementById('tableJumat').style.display = 'block';
                });
            </script>

            <x-app.footer />
        </div>
    </main>

</x-app-layout>