  
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
            <a class="dropdown-item @yield('dkv')" href="{{route('user.produk.jurusan', ['id_jurusan' => '3', 'nama_jurusan' => 'dkv'])}}">Desain Komunikasi Visual</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item @yield('rpl')" href="{{route('user.produk.jurusan', ['id_jurusan' => '1', 'nama_jurusan' => 'rpl'])}}">Rekayasa Perangkat Lunak</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item @yield('tkj')" href="{{route('user.produk.jurusan', ['id_jurusan' => '2', 'nama_jurusan' => 'tkj'])}}">Teknik Komunikasi Jaringan</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item @yield('mkt')" href="{{route('user.produk.jurusan', ['id_jurusan' => '4', 'nama_jurusan' => 'mkt'])}}">Mekatronika</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item @yield('tpbo')" href="{{route('user.produk.jurusan', ['id_jurusan' => '6', 'nama_jurusan' => 'tpbo'])}}">Teknik Bodi Otomotif</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item @yield('tl')" href="{{route('user.produk.jurusan', ['id_jurusan' => '8', 'nama_jurusan' => 'tl'])}}">Teknik Pengelasan</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item @yield('tkro')" href="{{route('user.produk.jurusan', ['id_jurusan' => '5', 'nama_jurusan' => 'tkro'])}}">Teknik Kendaraan Ringan Otomatif</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item @yield('tpm')" href="{{route('user.produk.jurusan', ['id_jurusan' => '7', 'nama_jurusan' => 'tpm'])}}">Teknik Permesinan</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item @yield('atph')" href="{{route('user.produk.jurusan', ['id_jurusan' => '9', 'nama_jurusan' => 'atph'])}}">Agribisnis Tanaman Pangan dan Horikultura</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item @yield('aphp')" href="{{route('user.produk.jurusan', ['id_jurusan' => '10', 'nama_jurusan' => 'aphp'])}}">Agribisnis Pengolahan Hasil Pertanian</a>
            <div class="dropdown-divider"></div>
          </div>
        </li>
        <li class="nav-item @yield('caraActive') ml-auto">
          <a class="nav-link @yield('cara')" href="{{route('user.cara_pesan')}}">Cara Pesan</a>
        </li>
        <li class="nav-item @yield('tentangActive') ml-auto">
          <a class="nav-link @yield('tentang')" href="{{route('user.tentang.index')}}">Tentang Kami</a>
        </li>
      </ul>
    </div>
  </nav>