@extends('homepage')
@section('content')
<div class="hero">
    <div class="hero-slide">
        <div class="img overlay" style="background-image: url('assetsfe/images/img_bg.jpg')"></div>
    </div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9 text-center">
                <h1 class="text-white fw-semi-bold fs-2 mb-3" data-aos="fade-up">
                    Selamat datang di Website Masjid Jami’ Al Muwahhidiin!
                </h1>
                <h1 class="text-white fw-semi-bold fs-6 mb-4" data-aos="fade-up">
                    Temukan info kegiatan, laporan keuangan, dan layanan masjid dengan mudah, cepat, dan transparan.
                    Mari bersama membangun masjid yang aktif, terbuka, dan bermanfaat untuk umat.
                </h1>

                <div class="hero-buttons">
                    <a href="{{ route('about') }}" class="btn btn-primary me-0 me-sm-2 mx-1">Get Started</a>
                    <a href="https://www.youtube.com/@irma_almuwahhidiin" class="btn btn-link mt-2 mt-sm-0 glightbox text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-play-circle-fill text-white" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814z" />
                        </svg>
                        Play Video
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    body {
        background-color: #f9f7f1;
    }

    .card-sholat {
        border-radius: 20px;
        color: #fff;
        padding: 20px;
        text-align: center;
    }

    .subuh {
        background: #D66D75;
    }

    .dzuhur {
        background: #60A5FA;
    }

    .ashar {
        background: #22D3EE;
    }

    .maghrib {
        background: #F87171;
    }

    .isya {
        background: #374151;
    }

    .card-sholat img {
        width: 80px;
        margin-bottom: 15px;
    }

    .card-sholat .time-input {
        width: 100%;
        margin-top: 10px;
        border-radius: 8px;
        padding: 5px;
        text-align: center;
        font-weight: bold;
    }
</style>
<section class="features-1">
    <div class="container">
        <div class="row">
            <div class="container mx-auto p-8">
                <h1 class="text-center fm-bold text-primary mb-4">Waktu Sholat</h1>
                <h3 class="text-center text-muted mb-5" id="location-date"></h3>
                <div class="row gap-5 mb-5">
                    <div class="col-md-2 subuh card-sholat">
                        <h3>SUBUH</h3>
                        <p>2 Raka'at</p>
                        <img src="assetsfe/images/sunrise.png" alt="Subuh">
                        <h4 id="subuh"></h4>
                    </div>
                    <div class="col-md-2 dzuhur card-sholat">
                        <h3>DZUHUR</h3>
                        <p>4 Raka'at</p>
                        <img src="assetsfe/images/sun.png" alt="Dzuhur">
                        <h4 id="dzuhur"></h4>
                    </div>
                    <div class="col-md-2 ashar card-sholat">
                        <h3>ASHAR</h3>
                        <p>4 Raka'at</p>
                        <img src="assetsfe/images/sunrese.png" alt="Ashar">
                        <h4 id="ashar"></h4>
                    </div>
                    <div class="col-md-2 maghrib card-sholat">
                        <h3>MAGHRIB</h3>
                        <p>3 Raka'at</p>
                        <img src="assetsfe/images/sunset.png" alt="Maghrib">
                        <h4 id="maghrib"></h4>
                    </div>
                    <div class="col-md-2 isya card-sholat">
                        <h3>ISYA'</h3>
                        <p>4 Raka'at</p>
                        <img src="assetsfe/images/night.png" alt="Isya">
                        <h4 id="isya"></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="features-1">
    <div class="container">
        <div class="row">
            <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                <div class="box-feature">
                    <span class="flaticon-house"></span>
                    <h3 class="mb-3">Tempat Ibadah</h3>
                    <p>
                        Layanan shalat berjamaah wajib dibuka selama waktu-waktu shalat. 
                        Adapun pelaksanaan shalat sunat berjamaah semisal shalat tarawih, shalat Id, sholat gerhanaa dan juga shalat jenazah, 
                        dikelola dan dikoordinasikan oleh Dewan Kemakmuran Masjid.
                    </p>
                </div>
            </div>
            <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="500">
                <div class="box-feature">
                    <span class="flaticon-building"></span>
                    <h3 class="mb-3">ZIS</h3>
                    <p>
                        Layanan Zakat, Infaq dan Shodaqoh yang dikelola secara profesional oleh Dewan Kemakmuran Masjid. 
                        Selain untuk operasional dan perawatan Masjid, 
                        Dewan Kemakmuran Masjid juga untuk program Pendidikan dan Sosial.
                    </p>
                </div>
            </div>
            <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                <div class="box-feature">
                    <span class="flaticon-house-3"></span>
                    <h3 class="mb-3">Kajian</h3>
                    <p>
                        Layanan kajian ilmu di Masjid meliputi kajian Tafsir malam Jum'at, Hafalan Qur'an Jum'at pagi, 
                        Fiqih Sabtu Pagi, Fiqih Muslimah Sabtu sore, 
                        Al Muyassar dan bahasa Arab Malam Ahad dan Iqra Anak-anak setiap hari ba'da Maghrib.
                    </p>
                </div>
            </div>
            <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="600">
                <div class="box-feature">
                    <span class="flaticon-house-1"></span>
                    <h3 class="mb-3">Ambulance</h3>
                    <p>
                        Masjid Jami' Al Muwahhidin menyediakan layanan ambulans jenazah. 
                        Layanan ini mencakup pengantaran jenazah dari rumah, 
                        rumah sakit, atau lokasi lain menuju masjid untuk prosesi penyelenggaraan jenazah hingga ke pemakaman.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="section">
    <div class="container">
        <div class="row text-left mb-5">
            <div class="col-12">
                <h2 class="font-weight-bold heading text-primary mb-4">Infaq Masjid Melalui QR Scan</h2>
            </div>
            <div class="col-lg-4">
                <p class="text-black-50">
                    Masjid Jami’ Al Muwahhidin menyediakan fasilitas Infaq bagi Jama’ah Masjid dengan menggunakan QR Scan Barcode, disamping fasilitas kotak infaq yang sudah tersedia terlebih dahulu.
                </p>
                <p class="text-black-50">
                    Infaq melalui QRIS / QR Scan di Masjid Al Ikhlash adalah berinfaq dengan metode Scan Barcode 
                    dan pembayarannya melalui payment getawey seperti OVO, Gopay, Shopee Pay, Link Aja, Dana dan juga melalui Mobile Banking Jama’ah.
                </p>
                <p class="text-black-50">
                    Semakin mudah berinfaq dan beribadah diMasjid Jami’ Al Muwahhidiindi Sukamaju, Kec. Cilodong, Kota Depok, Jawa Barat,.
                </p>
            </div>
            <div class="col-lg-4">
                <div class="img-about dots">
                    <img src="assetsfe/images/qris.jpg" alt="Image" class="img-fluid" />
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // https://documenter.getpostman.com/view/841292/2s9YsGittd#f8ebe8df-d842-41a2-8302-f3dd139990ba
    document.addEventListener('DOMContentLoaded', function() {
        fetch('/jadwal-sholat')
            .then(res => res.json())
            .then(data => {
                const jadwal = data.jadwal;
                const lokasi = data.lokasi;
                const daerah = data.daerah;
                document.getElementById("location-date").innerText = `${lokasi}, ${daerah} - ${jadwal.tanggal}`;
                document.getElementById("subuh").innerText = jadwal.subuh;
                document.getElementById("dzuhur").innerText = jadwal.dzuhur;
                document.getElementById("ashar").innerText = jadwal.ashar;
                document.getElementById("maghrib").innerText = jadwal.maghrib;
                document.getElementById("isya").innerText = jadwal.isya;
            })
            .catch(error => console.error("Fetch error:", error));
    });
</script>


@endsection