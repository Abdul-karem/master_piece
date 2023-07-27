@extends('User.layouts.master')
@section('content')
    <div class="site-block-wrap">
        <div class="owl-carousel with-dots">
            <div class="site-blocks-cover overlay overlay-2" style="background-image: url(assit-user/images/hero_1.jpg);"
                data-aos="fade" id="home-section">


                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-6 mt-lg-5 text-center">
                            <h1 class="text-shadow">Serve you here</h1>
                            <p class="mb-5 text-shadow">Where life thrives, look for professional maintenance service
                                providers. </p>


                        </div>
                    </div>
                </div>


            </div>

            <div class="site-blocks-cover overlay overlay-2" style="background-image: url(assit-user/images/hero_2.jpg);"
                data-aos="fade" id="home-section">


                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-6 mt-lg-5 text-center">
                            <h1 class="text-shadow">Serve you here</h1>
                            <p class="mb-5 text-shadow">Where life thrives, look for professional maintenance service
                                providers. </p>


                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.css">
    <style>
        .slider-container {
            position: relative;
            display: flex;
            align-items: center;
            gap: 15px;
            margin: 15px;
        }

        .slider-container .slider-input {
            display: none;
        }

        .slider-container .slider {
            flex: 1;
            margin-right: 10px;
        }

        .slider-container .slider-label {
            font-size: 12px;

        }

        .form-group .btn {
            margin-left: 10px;
            height: 30px;
            line-height: 10px;
            /* قيمة يجب أن تكون متساوية لارتفاع الزر */
        }
        .error {
      border-color: red !important;
  }

  .error-message {
      color: red;
      font-size: 0.875rem;
      margin-top: 0.25rem;
  }


    </style>




    <div class="site-section" id="properties-section">
        <div class="container" style="margin: auto ; padd">
            <form style="display: inline-flex; width: 40%;"action="{{ route('home.index') }}" method="GET"
                class="my-form">
                <div style="width: 100%; " class="form-group" style="background-color: #8cc641 ">
                    <label for="price_range">Price Range:</label>
                    <span class="slider-label" id="min_price_label">{{ request('min_price', '0') }}</span>
                    -<span class="slider-label" id="max_price_label">{{ request('max_price', '500') }}</span>
                    <button type="submit" class="btn btn-secondary" style="background-color: #8cc641 ">Search</button>

                    <div class="slider-container">
                        <input type="hidden" name="min_price" id="min_price" class="slider-input"
                            value="{{ request('min_price') }}">
                        <input type="hidden" name="max_price" id="max_price" class="slider-input"
                            value="{{ request('max_price') }}">
                        <div id="price_range" class="slider"></div>
                    </div>
                </div>
            </form>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.js"></script>
            <script>
                var priceRangeSlider = document.getElementById("price_range");
                var minPriceInput = document.getElementById("min_price");
                var maxPriceInput = document.getElementById("max_price");
                var minPriceLabel = document.getElementById("min_price_label");
                var maxPriceLabel = document.getElementById("max_price_label");

                noUiSlider.create(priceRangeSlider, {
                    start: [{{ request('min_price', '0') }}, {{ request('max_price', '500') }}],
                    connect: true,
                    step: 1,
                    range: {
                        'min': 0,
                        'max': 100
                    }
                });

                priceRangeSlider.noUiSlider.on('update', function(values, handle) {
                    var value = parseInt(values[handle]);

                    if (handle === 0) {
                        minPriceInput.value = value;
                        minPriceLabel.textContent = value;
                    } else {
                        maxPriceInput.value = value;
                        maxPriceLabel.textContent = value;
                    }
                });
            </script>

            <!-- Form 2 -->

            <form style="display: inline-flex; width: 40%;" action="{{ route('home.index') }}" method="GET"
                class="my-form">
                <div class="form-group">
                    <label for="location">Location/Title:</label>
                    <button style="display: inline" type="submit" class="btn btn-secondary"
                        style="background-color: #8cc641 ">Search</button>

                    <div class="slider-container">
                        <input style="width: 400px; display: inline; border-radius:5px; height:30px" type="text"
                            name="location" id="location" class="form-control" placeholder="Name or Location"
                            value="{{ request('location') }}">

                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="site-section" id="properties-section">
        <div class="container">
            <div class="row large-gutters">
                @foreach ($products as $item)
                    <div class="col-md-6 col-lg-4 mb-5 mb-lg-5 ">
                        <div class="ftco-media-1">
                            <div class="ftco-media-1-inner">
                                <a href="{{ route('home.show', ['home' => $item->id]) }}" class="d-inline-block mb-4">
                                    {{-- @if ($item->image)
                      <img src="{{ asset('image/'. $item->image) }}" alt="Office Image" class="img-fluid" style="width: 100px;">
                    @else
                      <i class="fa fa-picture-o fa-5x" aria-hidden="true"></i>
                    @endif  --}}
                                    <img style="height: 500px; width:480px; object-fit: cover"
                                        src="{{ asset('assit-user/images/' . $item->image) }}"
                                        alt="Free website template by Free-Template.co" class="img-fluid">
                                </a>
                                <div class="ftco-media-details">
                                    <h3>{{ $item->name }}</h3>
                                    <p>{{ $item->location }}</p>
                                    <strong>{{ $item->price }}$</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
   

    <!-- About Start -->
    <section class="site-section" id="about-section">
        <div class="container">

            <div class="row large-gutters">
                <div class="col-lg-6 mb-5">

                    <div class="owl-carousel slide-one-item with-dots">
                        <div><img style="height: 670px" src="{{ asset('assit-user/images/img.jpg') }}"
                                alt="Free website template by Free-Template.co" class="img-fluid"></div>
                        <div><img style="height: 670px" src="{{ asset('assit-user/images/f.jpg') }}"
                                alt="Free website template by Free-Template.co" class="img-fluid"></div>
                        <div><img style="height: 670px" src="{{ asset('assit-user/images/r.jpg') }}"
                                alt="Free website template by Free-Template.co" class="img-fluid"></div>
                    </div>

                </div>

                <!-- About Start -->
                <div class="container-fluid py-5">
                    <div class="container py-5">
                        <div class="row gx-0 mb-3 mb-lg-0">
                            <div class="col-lg-6 my-lg-5 py-lg-5">
                                <div class="about-start bg-primary p-5">
                                    <h1 class="display-5 mb-4">Welcome To Elite</h1>
                                    <p style="font-size: large;"> We are a company that is considered solution for all your
                                        maintenance and decoration needs! With years of experience and a team of skilled
                                        professionals, we are dedicated to providing top-notch services Technicians and
                                        craftsmen can also communicate with us and display their services on our website .
                                    </p>

                                </div>
                            </div>
                            <div class="col-lg-6" style="min-height: 400px;">
                                <div class="position-relative h-100">
                                    <img class="position-absolute w-100 h-100" src="{{ asset('majec/img/about-1.jpg') }}"
                                        alt="About Image" style="object-fit: cover;">
                                </div>
                            </div>
                        </div>
                        <div class="row gx-0">
                            <div class="col-lg-6" style="min-height: 400px;">
                                <div class="position-relative h-100">
                                    <img class="position-absolute w-100 h-100" src="majec/img/about-2.jpg"
                                        style="object-fit: cover;">
                                </div>
                            </div>
                            <div class="col-lg-6 my-lg-5 py-lg-5">
                                <div class="about-end bg-primary p-5">
                                    <h1 class="display-5 mb-4">Why Choose Us?</h1>
                                    <p style="font-size: large">At Elite we understand the importance of creating Service
                                        meets your unique requirements. Whether it's a residential property, commercial
                                        space, or industrial facility, our team is well-equipped to handle projects of any
                                        scale with utmost precision and attention to detail </p>
                                    {{-- <a href="" class="btn btn-secondary rounded-pill py-md-3 px-md-5 mt-4">Get A Quote</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

    </section>
    <!-- About End -->

    <!-- Services Start -->

    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h1 class="display-5">Services</h1>
                <hr class="w-25 mx-auto text-primary" style="opacity: 1;">
            </div>
            <div class="row gy-4 gx-3">
                <div class="col-lg-4 col-md-6 pt-5">
                    <div
                        class="service-item d-flex flex-column align-items-center justify-content-center text-center p-5 pt-0">
                        <div class="service-icon p-3">
                            <div><i class="fa fa-2x fa-paint-brush"></i></div>
                        </div>
                        <h3 class="mt-5">Painting Services</h3>
                        <a class="btn shadow-none text-secondary" href="javascript:void(0);"
                            onclick="openPopup('painting')">View Detail<i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pt-5">
                    <div
                        class="service-item d-flex flex-column align-items-center justify-content-center text-center p-5 pt-0">
                        <div class="service-icon p-3">
                            <div><i class="fa fa-2x fa-paint-roller"></i></div>
                        </div>
                        <h3 class="mt-5">Carpentry Services</h3>
                        <a class="btn shadow-none text-secondary" href="javascript:void(0);"
                            onclick="openPopup('carpentry')">View Detail<i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pt-5">
                    <div
                        class="service-item d-flex flex-column align-items-center justify-content-center text-center p-5 pt-0">
                        <div class="service-icon p-3">
                            <div><i class="fa fa-2x fa-brush"></i></div>
                        </div>
                        <h3 class="mt-5">Electrical Services</h3>
                        <a class="btn shadow-none text-secondary" href="javascript:void(0);"
                            onclick="openPopup('electrical')">View Detail<i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pt-5">
                    <div
                        class="service-item d-flex flex-column align-items-center justify-content-center text-center p-5 pt-0">
                        <div class="service-icon p-3">
                            <div><i class="fa fa-2x fa-eraser"></i></div>
                        </div>
                        <h3 class="mt-5">Plumbing Services</h3>
                        <a class="btn shadow-none text-secondary" href="javascript:void(0);"
                            onclick="openPopup('plumbing')">View Detail<i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pt-5">
                    <div
                        class="service-item d-flex flex-column align-items-center justify-content-center text-center p-5 pt-0">
                        <div class="service-icon p-3">
                            <div><i class="fa fa-2x fa-spray-can"></i></div>
                        </div>
                        <h3 class="mt-5">Flooring Services</h3>
                        <a class="btn shadow-none text-secondary" href="javascript:void(0);"
                            onclick="openPopup('flooring')">View Detail<i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pt-5">
                    <div
                        class="service-item d-flex flex-column align-items-center justify-content-center text-center p-5 pt-0">
                        <div class="service-icon p-3">
                            <div><i class="fa fa-2x fa-city"></i></div>
                        </div>
                        <h3 class="mt-5">HVAC Services</h3>
                        <a class="btn shadow-none text-secondary" href="javascript:void(0);"
                            onclick="openPopup('hvac')">View Detail<i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pop-up Modal -->
    <div id="popupModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #fee469 ">
                    <h5 class="modal-title" id="popupModalLabel">View Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        onclick="closePopup()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="popupContent">
                        <h5> </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </section>
    <!-- Services End -->

    <!-- best service Start -->
    <section>
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                    <h1 class="display-5">Our best service providers</h1>
                    <hr class="w-25 mx-auto text-primary" style="opacity: 1;">
                </div>
                <div class="row g-3">
                    <div class="col-lg-4 col-md-6">
                        <div class="team-item">
                            <img class="img-fluid w-100" src="{{ asset('majec/img/team-1.jpg') }}">
                            <div class="team-text">
                                <div class="team-social">
                                    {{-- <a class="btn btn-lg btn-secondary btn-lg-square rounded-circle me-2" href="#"><i class="fab fa-twitter"></i></a> --}}
                                    <a class="btn btn-lg btn-secondary btn-lg-square rounded-circle me-2"
                                        href="https://www.facebook.com/profile.php?id=100024884409430" target="planck "><i
                                            class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-lg btn-secondary btn-lg-square rounded-circle me-2"
                                        href="https://www.linkedin.com/in/abdul-kareem-aljamal/" target="planck "><i
                                            class="fab fa-linkedin-in"></i></a>
                                </div>
                                <div class="mt-auto mb-3">
                                    <h4 class="mb-1">Mahmoud </h4>
                                    <span class="text-uppercase">Paints and decoration</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="team-item">
                            <img class="img-fluid w-100" src="{{ asset('majec/img/team-2.jpg') }}">
                            <div class="team-text">
                                <div class="team-social">
                                    {{-- <a class="btn btn-lg btn-secondary btn-lg-square rounded-circle me-2" href="#"><i class="fab fa-twitter"></i></a> --}}
                                    <a class="btn btn-lg btn-secondary btn-lg-square rounded-circle me-2"
                                        href="https://www.facebook.com/profile.php?id=100024884409430" target="planck "><i
                                            class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-lg btn-secondary btn-lg-square rounded-circle me-2"
                                        href="https://www.linkedin.com/in/abdul-kareem-aljamal/" target="planck "><i
                                            class="fab fa-linkedin-in"></i></a>
                                </div>
                                <div class="mt-auto mb-3">
                                    <h4 class="mb-1">John </h4>
                                    <span class="text-uppercase">Paints and decoration</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="team-item">
                            <img class="img-fluid w-100" src="{{ asset('majec/img/team-3.jpg') }}">
                            <div class="team-text">
                                <div class="team-social">
                                    {{-- <a class="btn btn-lg btn-secondary btn-lg-square rounded-circle me-2" href="#"><i class="fab fa-twitter"></i></a> --}}
                                    <a class="btn btn-lg btn-secondary btn-lg-square rounded-circle me-2"
                                        href="https://www.facebook.com/profile.php?id=100024884409430"><i
                                            class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-lg btn-secondary btn-lg-square rounded-circle me-2"
                                        href="https://www.linkedin.com/in/abdul-kareem-aljamal/"><i
                                            class="fab fa-linkedin-in"></i></a>
                                </div>
                                <div class="mt-auto mb-3">
                                    <h4 class="mb-1">Khaled</h4>
                                    <span class="text-uppercase">Paints and decoration</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Team End -->
    </section>

    <!-- best service  End -->




    {{-- contact us section --}}
    <section class="ftco-section" id="contact-section">
        <div class="container " style="background-color: #fee469 ">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Contact US</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="wrapper">
                        <div class="row no-gutters mb-5">
                            <div class="col-md-7">
                                <div class="contact-wrap w-100 p-md-5 p-4">
                                    <h3 class="mb-4">Tell us your feedback</h3>
                                    <div id="form-message-warning" class="mb-4"></div>
                                    <div id="form-message-success" class="mb-4">

                                    </div>
                                    <form action="{{ route('contact.store') }}" method="POST" id="contactForm"
                                        name="contactForm" class="contactForm">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="name"></label>
                                                    <input type="text" class="form-control bg-light border-0 "
                                                        name="name" id="name" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="email"></label>
                                                    <input type="email" class="form-control bg-light border-0  "
                                                        name="email" id="email" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="subject"></label>
                                                    <input type="text" class="form-control bg-light border-0  "
                                                        name="subject" id="subject" placeholder="Subject">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="#"></label>
                                                    <textarea name="message" class="form-control bg-light border-0 " id="message" cols="30" rows="4"
                                                        placeholder="Message"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="submit" value="Send Message" class="btn btn-primary"
                                                        style="background-color:#8cc641 ">
                                                    <div class="submitting"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-5 d-flex align-items-stretch">

                                <div style="width: 100%"><iframe width="100%" height="100%" frameborder="0"
                                        scrolling="no" marginheight="0" marginwidth="0"
                                        src="https://maps.google.com/maps?width=100%25&amp;height=400&amp;hl=en&amp;q=%D8%A7%D9%84%D8%B3%D9%84%D8%B7+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a
                                            href="https://www.maps.ie/distance-area-calculator.html">distance
                                            maps</a></iframe></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="dbox w-100 text-center">

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div style="width: 100% ;height: 70px ">
        </div>
    </section>
    {{-- pop up --}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        function openPopup(service) {
            var serviceDetails;
            switch (service) {
                case 'painting':
                    serviceDetails =
                        "Professional interior and exterior painting services for residential and commercial properties.";
                    break;
                case 'carpentry':
                    serviceDetails =
                        "Skilled carpenters offering furniture repairs, custom cabinetry, shelving installations, and trim work.";
                    break;
                case 'electrical':
                    serviceDetails =
                        "Qualified electricians providing electrical repairs, installations, and upgrades for homes and businesses.";
                    break;
                case 'plumbing':
                    serviceDetails =
                        "Expert plumbers offering plumbing repairs, installations, and maintenance for pipes, fixtures, and drainage systems.";
                    break;
                case 'flooring':
                    serviceDetails =
                        "Installation, repair, and refinishing of various types of flooring, including hardwood, laminate, tile, and vinyl.";
                    break;
                case 'hvac':
                    serviceDetails =
                        "Heating, ventilation, and air conditioning system installations, repairs, and maintenance for optimal indoor comfort.";
                    break;
            }
            document.getElementById("popupContent").innerHTML = serviceDetails;
            $('#popupModal').modal('show');
        }

        function closePopup() {
            $('#popupModal').modal('hide');
        }
    </script>

    {{-- pop up --}}


    <script>
      // Get the form element
      const contactForm = document.getElementById('contactForm');
  
      // Add event listener to the form on submit
      contactForm.addEventListener('submit', function(event) {
          // Prevent the form from submitting
          event.preventDefault();
  
          // Validate each input field
          const nameInput = document.getElementById('name');
          const emailInput = document.getElementById('email');
          const subjectInput = document.getElementById('subject');
          const messageInput = document.getElementById('message');
  
          // Validate name field
          if (nameInput.value.trim() === '') {
              displayErrorMessage(nameInput, 'Please enter your name.');
              return false;
          }
  
          // Validate email field
          if (emailInput.value.trim() === '') {
              displayErrorMessage(emailInput, 'Please enter your email address.');
              return false;
          }
  
          // Validate subject field
          if (subjectInput.value.trim() === '') {
              displayErrorMessage(subjectInput, 'Please enter a subject.');
              return false;
          }
  
          // Validate message field
          if (messageInput.value.trim() === '') {
              displayErrorMessage(messageInput, 'Please enter a message.');
              return false;
          }
  
          // If all inputs are valid, submit the form
          this.submit();
      });
  
      // Function to display error messages
      function displayErrorMessage(inputElement, message) {
          // Remove any existing error message
          const errorElement = inputElement.nextElementSibling;
          if (errorElement && errorElement.classList.contains('error-message')) {
              errorElement.remove();
          }
  
          // Create error message element
          const error = document.createElement('div');
          error.className = 'error-message';
          error.textContent = message;
  
          // Insert error message below the input element
          inputElement.parentNode.insertBefore(error, inputElement.nextElementSibling);
  
          // Add error class to input element
          inputElement.classList.add('error');
      }
  </script>
@endsection
