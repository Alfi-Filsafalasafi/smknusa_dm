@extends('user.layouts.master')

@section('title')
    Cara Pesan
@endsection

@section('caraActive', 'active')
@section('cara', 'text-success')
@section('content')

   <!-- Keunggulan -->
 <div class="container marketing" style="margin-top:140px;">
   <!-- Three columns of text below the carousel -->
   <h3 class="text-center">Bagaimana cara pesan produk kami ?</h3>
   <div class="row mt-5">
     
     <div class="col-lg-4">
       <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
       <h2>Heading</h2>
       <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
      
     </div><!-- /.col-lg-4 -->
     <div class="col-lg-4">
       <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
       <h2>Heading</h2>
       <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
      
     </div><!-- /.col-lg-4 -->
     <div class="col-lg-4">
       <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
       <h2>Heading</h2>
       <p>And lastly this, the third column of representative placeholder content.</p>
       
     </div><!-- /.col-lg-4 -->
   </div><!-- /.row -->
 </div>

    <main role="main">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 mx-auto ">
                    <img src="{{asset('user/img/baju.jpg')}}" class="bd-placeholder-img" width="100%" height="100%"  alt="">
                    
                </div>
            </div>
        </div>
    </main>

 @endsection