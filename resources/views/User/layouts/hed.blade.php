<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Elite Maintenance & Décor </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content=" Maintenance & Décor" name=" Maintenance & Décor General maintenance maintenance services ">
    <meta content=" Maintenance & Décor" name=" Maintenance & Décor  General maintenance maintenance services  ">

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
    
    
</head>

    <!-- Navbar Start -->
    <header>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow-sm px-5 py-3 py-lg-0">
        <a href="{{ route('home.index') }}" class="navbar-brand p-0">
            <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-paint-roller text-secondary me-3"></i>Elite</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0 pe-4 border-end border-5 border-primary">
                <a href="{{ route('home.index') }}" class="nav-item nav-link active">Home</a>
                <a href="#about-section" class="nav-item nav-link">About</a>
                <a href="#services-section" class="nav-item nav-link">Service</a>
                
                <a href="#contact-section" class="nav-item nav-link">Contact</a>
            </div>
            <div class="d-none d-lg-flex align-items-center ps-4">
                @if (session('user_id'))
                <li><a href="{{ route('logout') }}" class="fas fa-sign-out-alt" style="color: #fee469; margin:5px ;  "   >Logout</a></li> 
                
            
            
              @else
                  <li><a href="{{ route('sign-up.index') }}" class="nav-link">Sign In</a></li>
              @endif
            
                    <h6 class="text-light m-0"></h6>
                </div>
            </div>
        </div>
    </nav>
  </header>
    <!-- Navbar End -->
   