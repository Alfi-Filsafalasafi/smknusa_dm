@extends('user.layouts.master')

@section('title')
    Home
@endsection

@section('tentangActive', 'active')
@section('tentang', 'text-success')

@section('content')
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in" style="margin-top: 100px;">
      <div class="container">
        <h2></h2>
        <p></p>
      </div>
    </div><!-- End Breadcrumbs -->

    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
  
          <div class="row">
            <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
              <img src="{{asset('user/img/about.jpg')}}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
              <h3>SMKNUSA Deals Marketplace menyediakan produk-produk 
                unggulan dari kreatifitas siswa-siswi SMKN 
                  1 Purwosari.</h3>
              <p class="fst-italic">
              Produk unggulan ini berupa barang dan jasa dari 4 program keahlian yaitu Informatika,
Elektronika, Permesinan, dan Pertanian. dengan keunggulan :
              </p>
              <ul>
                <li><i class="bi bi-check-circle"></i> Mudah dalam proses pembelian, mudah berkomunikasi 
        dengan admin, dan tidak menyulitkan pembeli</li>
                <li><i class="bi bi-check-circle"></i> Produk asli karya siswa SMKN 1 Purwosari, meningkatkan 
        kompetensi siswa, dan mencintai produk dalam negeri</li>
                <li><i class="bi bi-check-circle"></i>Produk yang dijual dijamin memiliki kualitas yang sangat 
        tinggi karena dibuat dengan ketekunan dan keuletan.</li>
              </ul>
              <p>
              SMKNusa DM mengangkat produk-produk unggulan yang sudah diuji dari segi kelayakan dan efektifitas penggunaan
sehingga sudah tidak diragukan lagi dari segi kualitasnya.
Website Deals Marketplace ini dapat menampilkan produk dalam bentuk katalog yang apik.</p>
  
            </div>
          </div>
  
        </div>
      </section><!-- End About Section -->
    </main>
@endsection