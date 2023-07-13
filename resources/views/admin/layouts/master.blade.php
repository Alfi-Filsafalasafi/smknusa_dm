<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SMKNUSA - Deals Marketplace</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{asset('dashmin-1.0.0/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('dashmin-1.0.0/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('dashmin-1.0.0/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('dashmin-1.0.0/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('dashmin-1.0.0/css/style.css')}}" rel="stylesheet">

    <style>
        .has-error{
            color: red;
        }
        .strikethrough {
            text-decoration: line-through;
            text-decoration-color: #009CFF; /* Opsional, ubah warna garis coretan jika diperlukan */
            color: gray;
        }
        .harga{
            color: #009CFF;
        }
        .inline-container {
            display: flex;
            align-items: center;
        }
        .inline-container h1,
        .inline-container div {
            margin: 0;
        }
        .td {
  vertical-align: top;
  text-align: left;
}


    </style>

</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary">SMKNUSA DM</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{asset('img/user/'.Auth::user()->foto)}}" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                        @if(Auth::user()->hak_akses == 'Super Admin')
                            <span>Super Admin</span>
                        @else
                            @if(isset($jurusan))
                            <span>Admin {{$jurusan->nama}}</span>
                            @endif
                        @endif
                    </div>
                </div>
                @if(Auth::user()->hak_akses == 'Super Admin')
                    <div class="navbar-nav w-100">
                    <a href="{{route('admin.dashboard')}}" class="nav-item nav-link @yield('dashboard')"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="{{route('iklan_utama.index')}}" class="nav-item nav-link @yield('iklanUtama')"><i class="fa fa-th me-2"></i>Banner Iklan</a>
                    <a href="{{route('user.index')}}" class="nav-item nav-link @yield('user')"><i class="fa fa-solid fa-user me-2"></i>Admin Jurusan</a>
                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pengaturan</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="" class="dropdown-item">Keunggulan</a>
                            <a href="signup.html" class="dropdown-item">Cara Pesan</a>
                            <a href="blank.html" class="dropdown-item">Tentang Kami</a>
                        </div>
                    </div> -->
                    <a href="{{route('edit_profile.index', ['user' => Auth::user()->id])}}" class="nav-item nav-link @yield('editProfile')"><i class="fa fa-id-card me-2"></i>Edit Profile</a>
                </div>
                @else
                <div class="navbar-nav w-100">
                    <a href="{{route('admin.dashboard')}}" class="nav-item nav-link @yield('dashboard')"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="{{route('iklan_jurusan.index')}}" class="nav-item nav-link @yield('iklanJurusan')"><i class="fa fa-th me-2"></i>Banner Iklan</a>
                    <a href="{{route('barang_jasa.index')}}" class="nav-item nav-link @yield('barangJasa')"><i class="fa fa-tags me-2"></i>Produk dan Jasa</a>
                    <a href="{{route('edit_profile.index', ['user' => Auth::user()->id])}}" class="nav-item nav-link @yield('editProfile')"><i class="fa fa-id-card me-2"></i>Edit Profile</a>
                </div>
                @endif
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="{{asset('img/user/'.Auth::user()->foto)}}" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">{{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                        Log Out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Widgets Start -->
                @yield('content')
            <!-- Widgets End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">SMKNUSA DEALS MARKETPLACE</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Develop by <a href="">AM SMKN 1 PURWOSARI</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a> -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('dashmin-1.0.0/lib/chart/chart.min.js')}}"></script>
    <script src="{{asset('dashmin-1.0.0/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('dashmin-1.0.0/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('dashmin-1.0.0/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('dashmin-1.0.0/lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('dashmin-1.0.0/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('dashmin-1.0.0/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('dashmin-1.0.0/js/main.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
    
        $('.show_confirm').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Apakah anda yakin akan menghapus data ini ?`,
                text: "",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                form.submit();
                }
            });
        });
    
    </script>
    
</body>

</html>