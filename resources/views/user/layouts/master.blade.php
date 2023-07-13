<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="{{asset('user/css/carousel.css')}}" rel="stylesheet">
    <link href="{{asset('user/css/album.css')}}" rel="stylesheet">
    
    <link href="{{asset('user/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('user/css/style.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{asset('user/img/logo-header.png')}}">


    <title>SMKNUSA DM | @yield('title')</title>

    <style>
        .has-error{
            color: red;
        }
        .strikethrough {
            text-decoration: line-through; /* Opsional, ubah warna garis coretan jika diperlukan */
            color: gray;
        }
        .harga{
            color: #28a745;
        }
        .inline-container {
            display: flex;
            align-items: center;
        }
        .inline-container h1,
        .inline-container div {
            margin-right: 5px;
        }
        .td {
            vertical-align: top;
            text-align: left;
        }
        .hargabarang{
            font-weight:bolder;
            color: #28a745;
        }
    </style>

  </head>
  <body>
    @includeif('user.layouts.header')

    @yield('content')

    @includeif('user.layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
 </body>
</html>