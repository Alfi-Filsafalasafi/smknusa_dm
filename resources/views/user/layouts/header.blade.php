  
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light mr-auto fixed-top">
    <a class="navbar-brand" href="#"><img src="{{asset('user/img/logo.png')}}" alt="" width="64px"> <b>SMKNUSA DM</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item @yield('homeActive') ml-auto">
          <a class="nav-link @yield('home')" href="{{route('user.user.index')}}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item @yield('produkActive') ml-auto dropdown">
          <a class="nav-link @yield('produk') dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Lihat Produk
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="font-size : 12px;">
            <a class="dropdown-item" href="#">Desain Komunikasi Visual</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Rekayasa Perangkat Lunak</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Teknik Komunikasi Jaringan</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Mekatronika</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Teknik Bodi Otomotif</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Teknik Pengelasan</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Teknik Bodi Kendaraan Ringan</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Teknik Permesinan</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Agribisnis Tanaman Pangan dan Horikultura</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Agribisnis Pengolahan Hasil Pertanian</a>
            <div class="dropdown-divider"></div>
          </div>
        </li>
        <li class="nav-item @yield('caraActive') ml-auto">
          <a class="nav-link @yield('cara')" href="">Cara Pesan</a>
        </li>
        <li class="nav-item @yield('tentangActive') ml-auto">
          <a class="nav-link @yield('tentang')" href="{{route('user.tentang.index')}}">Tentang Kami</a>
        </li>
      </ul>
    </div>
  </nav>