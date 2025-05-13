@extends('homepage')
@section('content')
<div
    class="hero page-inner overlay"
    style="background-image: url('assetsfe/images/img_bg.jpg')">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9 text-center mt-5">
                <h1 class="heading" data-aos="fade-up">Remaja Masjid</h1>

                <nav
                    aria-label="breadcrumb"
                    data-aos="fade-up"
                    data-aos-delay="200">
                    <ol class="breadcrumb text-center justify-content-center">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li
                            class="breadcrumb-item active text-white-50"
                            aria-current="page">
                            Remaja Masjid
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
                    Ikatan Remaja Masjid (IRMA) Al-Muwahhidiin adalah komunitas pemuda yang aktif di lingkungan Masjid Jami’ Al-Muwahhidiin, Sukamaju, Kota Depok, Jawa Barat.
                    Dengan semangat #HadirMemakmurkanMasjid, IRMA Al-Muwahhidiin berkomitmen untuk menjadikan masjid sebagai pusat kegiatan positif bagi generasi muda.
                    Kami rutin menyelenggarakan berbagai kegiatan keagamaan dan sosial,
                    seperti Tabligh Akbar dalam rangka memperingati Isra Mi'raj Nabi Muhammad SAW
                </p>
                <p class="text-black-50">
                    Selain kegiatan keagamaan, IRMA Al-Muwahhidiin juga aktif dalam pengembangan organisasi dan identitas komunitas.
                    Salah satu langkah yang kami ambil adalah melakukan pembaruan logo organisasi, yang mencerminkan semangat baru dalam memakmurkan masjid dan memperkuat peran pemuda dalam dakwah Islam .
                    Kami juga memanfaatkan platform digital seperti Instagram dan TikTok untuk menyebarkan informasi dan inspirasi kepada masyarakat luas .
                </p>
                <p class="text-black-50">
                    IRMA Al-Muwahhidiin berperan penting dalam membina karakter pemuda yang berakhlak mulia, disiplin, dan bertanggung jawab.
                    Melalui berbagai kegiatan yang mereka selenggarakan, IRMA Al-Muwahhidiin tidak hanya memperkuat iman dan pengetahuan agama anggotanya,
                    tetapi juga mempererat hubungan sosial antar sesama muslim di lingkungan mereka.
                </p>
            </div>

            <div class="col-lg-6">
                <div class="img-about dots">
                    <img src="assetsfe/images/irma.jpg" alt="Image" class="img-fluid" />
                </div>
            </div>
            <div class="d-flex feature-h">
                <div class="feature-text">
                    <h3 class="heading">Instagram IRMA</h3>
                    <p class="text-black-50">
                        silahkan ikuti kegiatan IRMA Al-Muwahhidiin di Instagram
                    </p>
                </div>
                <span class="wrap-icon me-3 m-2">
                    <a href="https://www.instagram.com/irma_almuwahhidiin/"><span class="icon-instagram"></span></a>
                </span>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row text-left mb-5">
            <div class="col-12">
                <h2 class="font-weight-bold heading text-primary mb-4">Support IRMA Al-Muwahhidiin</h2>
            </div>
            <div class="col-lg-4">
                <div class="img-about dots">
                    <img src="assetsfe/images/qris.jpg" alt="Image" class="img-fluid" />
                </div>
            </div>
            <div class="col-lg-6">
                <p class="text-black-50">
                    IRMA Masjid Jami’ Al Muwahhidin menyediakan fasilitas Infaq bagi Jama’ah Masjid dengan menggunakan QR Scan Barcode, disamping fasilitas kotak infaq yang sudah tersedia terlebih dahulu.
                </p>
                <p class="text-black-50">
                    Infaq melalui QRIS / QR Scan di Masjid Al Ikhlash adalah berinfaq dengan metode Scan Barcode
                    dan pembayarannya melalui payment getawey seperti OVO, Gopay, Shopee Pay, Link Aja, Dana dan juga melalui Mobile Banking Jama’ah.
                </p>
                <p class="text-black-50">
                    Semakin mudah berinfaq dan beribadah diMasjid Jami’ Al Muwahhidiindi Sukamaju, Kec. Cilodong, Kota Depok, Jawa Barat,.
                </p>
            </div>

        </div>
    </div>
</div>
@endsection