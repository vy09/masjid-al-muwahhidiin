@extends('homepage')
@section('content')
<div
    class="hero page-inner overlay"
    style="background-image: url('assetsfe/images/img_bg.jpg')">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9 text-center mt-5">
                <h1 class="heading" data-aos="fade-up">Visi Misi</h1>

                <nav
                    aria-label="breadcrumb"
                    data-aos="fade-up"
                    data-aos-delay="200">
                    <ol class="breadcrumb text-center justify-content-center">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li
                            class="breadcrumb-item active text-white-50"
                            aria-current="page">
                            Visi Misi
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
                <h2 class="font-weight-bold heading text-primary mb-4">Visi Misi</h2>
            </div>
            <div class="col-lg-6">
                <p class="text-black-50">
                   Yayasan Al-Muwahhidiin yang dibentuk pada tahun 1991 sebagai institusi sosial dan keagamaan, 
                   telah banyak memberikan kontribusinya kepada masyarakat Islam, 
                   khususnya masyarakat Keluarahan Sukamaju, Kota Depok, Jawa Barat. Dengan dibangunnya sarana peribadatan berupa Masjid Jami' Al Muwahhidin,
                   serta beberapa lembaga pendidikan telah memudahkan masyarakat untuk melaksanakan ibadahnya secara nyaman dan membimbing masyarakat untuk mengenal Islam secara utuh dan benar.
                </p>
                <p class="text-black-50">
                    Visi dan Misi yang disusun menunjukkan adanya kepedulian Yayasan Al-Muwahhidiin tentang arti pentingnya ibadah bagi masyarakat dan mengenalkan agama kepada generasi mudah sejak dini.
                    Program kerja Yayasan telah disusun dengan baik, namun implementasinya masih perlu ditingkatkan lagi karena beberapa kegiatan tidak berjalan optimal, bahkan ditutup karena ketiadaan murid maupun guru.
                    Hal tersebut tentunya menjadi bahan pelajaran dan pertimbangan dalam mengembangkan berbagai yayasan di masa depan.
                </p>
                <p class="text-black-50">
                    Untuk perkembangan dan kemajuan Yayasan Al-Muwahhidiin di masa yang akan datang, diharapkan Pengurus dapat bekerja lebih keras lagi untuk 
                    memaksimalkan pemanfaatan sarana dan prasarana yang ada 
                    sehingga keinginan untuk mengembangkan syiar Islam akan menjadi lebih baik.
                </p>
            </div>
            <div class="col-lg-6">
                <div class="img-about dots">
                    <img src="assetsfe/images/vismis.jpg" alt="Image" class="img-fluid" />
                </div>
            </div>
        </div>
    </div>
</div>


@endsection