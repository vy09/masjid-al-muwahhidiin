@extends('homepage')
@section('content')
<div
    class="hero page-inner overlay"
    style="background-image: url('assetsfe/images/img_bg.jpg')">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9 text-center mt-5">
                <h1 class="heading" data-aos="fade-up">Tentang</h1>

                <nav
                    aria-label="breadcrumb"
                    data-aos="fade-up"
                    data-aos-delay="200">
                    <ol class="breadcrumb text-center justify-content-center">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li
                            class="breadcrumb-item active text-white-50"
                            aria-current="page">
                            Tentang
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row text-left mb-5">
            <div class="col-12">
                <h2 class="font-weight-bold heading text-primary mb-4">Tentang</h2>
            </div>
            <div class="col-lg-6">
                <p class="text-black-50">
                    Masjid Jami’ Al Muwahhidin, salah satu masjid besar yang terletak di Sukamaju,
                    Kec. Cilodong, Kota Depok, Jawa Barat, merupakan salah satu masjid dengan kegiatan yang rutin menyelenggarakan berbagai program dan kegiatan keagamaan, baik mingguan maupun bulanan, yang terbuka bagi masyarakat sekitar maupun jamaah dari luar daerah.
                </p>
                <p class="text-black-50">
                    Selain kegiatan keagamaan, masjid ini juga memiliki program sosial dan pembangunan yang terus berjalan,
                    termasuk penggalangan dana untuk renovasi dan peningkatan fasilitas masjid. Komunitas remaja masjid yang tergabung
                    dalam IRMA (Ikatan Remaja Masjid Al-Muwahhidiin) turut aktif dalam menghidupkan masjid dengan berbagai kegiatan positif
                    dan edukatif bagi generasi muda. Melalui media sosial seperti Instagram dan situs resmi, pengurus masjid juga rutin
                    membagikan informasi kegiatan dan laporan keuangan secara terbuka, menjadikan masjid ini bukan hanya sebagai tempat ibadah,
                    tetapi juga sebagai pusat pembinaan dan pemberdayaan masyarakat yang transparan dan aktif.
                </p>
            </div>
            <div class="col-lg-6">
                <div class="img-about dots">
                    <img src="assetsfe/images/img_about.png" alt="Image" class="img-fluid" />
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section pt-0">
    <div class="container">
        <div class="row justify-content-between mb-5">
            <div class="col-12">
                <h2 class="font-weight-bold heading text-primary mb-4" style="text-align: right;">Layanan</h2>
            </div>
            <div class="col-lg-7 mb-5 mb-lg-0">
                <div class="img-about dots">
                    <img src="assetsfe/images/ambulance.jpg" alt="Image" class="img-fluid" />
                </div>
            </div>
            <div class="col-lg-4" style="text-align: right;">
                <div class="d-flex feature-h">
                    <p class="text-black-50">
                        Masjid Jami' Al Muwahhidin menyediakan layanan ambulans jenazah sebagai bagian dari upaya untuk meringankan beban keluarga yang sedang berduka.
                        Layanan ini mencakup pengantaran jenazah dari rumah, rumah sakit, atau lokasi lain menuju masjid untuk prosesi penyelenggaraan jenazah,
                        termasuk seperti pemandian, pengafanan, dan salat jenazah, hingga ke pemakaman.
                        Ambulans ini dilengkapi dengan peralatan standar untuk memastikan jenazah dihormati selama perjalanan, termasuk tandu, pendingin,
                        dan perlengkapan kebersihan. Tim pengemudi dan petugas ambulans yang berpengalaman juga siap memberikan pelayanan penuh empati
                        dan profesional untuk memastikan proses ini berjalan dengan lancar dan sesuai syariat.
                        Layanan ini tersedia untuk seluruh masyarakat tanpa memandang status sosial,
                        sebagai bentuk kepedulian dan dukungan dari masjid dalam melayani umat.
                    </p>
                </div>
                <div class="d-flex feature-h">
                    <div class="feature-text">
                        <h3 class="heading">Hubungi</h3>
                        <p class="text-black-50">
                            +62 896-3472-9296
                        </p>
                    </div>
                    <span class="wrap-icon me-3 m-2">
                        <span class="icon-person"></span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section pt-0">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="font-weight-bold heading text-primary mb-4">Lokasi Masjid</h2>
            </div>
            <div class="col-12">
                <div class="rounded-2xl shadow-lg overflow-hidden">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7929.720052507666!2d106.8427872935791!3d-6.4120244999999985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ebeace720245%3A0x726380fc47e71ae5!2sMasjid%20Jami%27%20Al-Muwahhidiin!5e0!3m2!1sid!2sid!4v1746690178897!5m2!1sid!2sid"
                        width="100%"
                        height="450"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection