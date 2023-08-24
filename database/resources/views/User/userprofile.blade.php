{{-- @extends('User.layouts.mastes')

@section('content') --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/logiT.png') }}">
    <!-- Favicon -->
    <link href="majec/img/favicon.ico" rel="icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Libraries Stylesheet -->
    <link href="{{  ' majec/lib/owlcarousel/assets/owl.carousel.min.css '}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Template Stylesheet -->
    <link  rel="stylesheet" href="{{ asset( 'majec/css/stylee.css ') }}">
    <link  rel="stylesheet" href="{{ asset( 'majec/css/bootstrap.min.css' ) }}">

    <title>profile</title>
</head>
<body>

    <header>
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow-sm px-5 py-3 py-lg-0">
            <a href="{{ route('home.index') }}" class="navbar-brand p-0">
                <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-paint-roller text-secondary me-3"></i> {{ __('private.Elite') }}  </h1>
            </a>
            {{-- <div class="collapse navbar-collapse" id="navbarCollapse">
                <a href="{{ route('home.index') }}" class="nav-item nav-link "> {{ __('private.Home') }} </a>
                </div> --}}
        </nav>
      </header>

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('assit-user/images/hero_1.jpg')}});" data-aos="fade">
    </div>
    
        <div class="container mt-5 mb-5">
            <div class="row gutters">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="account-settings">
                                <div class="user-profile"  >
                                    <div class="user-avatar"  >
                                        <div class="right"   >
                                            @if($user->image)
                                            <img src="{{ asset('assit-user/images/'. $user->image) }}" alt="user Image" style="width: 100px ; height: 100px ; border-radius: 30% " >
                                            @else
                                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="">
                                            @endif                        
                                        </div>                                </div>
                                    <br><br>
                                    <h5 class="user-name">{{$user->name}}</h5>
                                    <h6 class="user-email">{{$user->email}}</h6>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            @if (Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            <form action="{{ route('userprofile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <h6 class="mb-2 text-primary">Personal Details</h6>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="fullName">Full Name :</label>
                                            <input type="text" class="form-control" id="fullName" name="name" placeholder="Enter full name" value="{{$user->name}}">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="eMail">Email :</label>
                                            <input type="email" class="form-control" id="eMail" name="email" placeholder="Enter email ID" value="{{$user->email}}">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="phone">Phone :</label>
                                            <input type="text" class="form-control" id="phone" name="mobile" placeholder="Enter phone number" value="{{$user->mobile}}">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="website">Password :</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter the correct password" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label"><i class="fa fa-image" aria-hidden="true"></i> Image :</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image" value="{{$user->image}}">
                                            <label class="custom-file-label" for="image"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Choose File</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="text-right">
                                            <a href="{{ route('home.index') }}"><button type="button" id="submit" name="submit" class="btn btn-secondary">Cancel</button></a>
                                            <button type="submit" id="submit" name="submit" class="btn btn-custom" style="background-color:#ffe468 ; color :#8cc641 "  >Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="text-center text-white fixed-bottom" style="background-color: #21081a;">
            <!-- Grid container -->
            <div class="container p-4"></div>
            <!-- Grid container -->
          
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
              © 2023 Copyright:
              <a class="text-white" href="https://mdbootstrap.com/">Elite.com</a>
            </div>
            <!-- Copyright -->
          </footer>
          


</body>
</html>


    
{{-- @endsection --}}