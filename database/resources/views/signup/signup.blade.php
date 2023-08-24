<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup/signup.css">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/logiT.png') }}">
    <title>Regestartion</title>
    <script src="https://kit.fontawesome.com/6c65479865.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="{{ route('sign-up') }}" method="post" enctype="multipart/form-data" id="signup-form">
                {!! csrf_field() !!}
                <h1>Create Account</h1>
                {{-- <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div> --}}
                <span>or use your email for registration</span>

                <input type="text" id="name-sign" name="name" placeholder="Name"
                    class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}">
                @if ($errors->has('name'))
                    <span class="invalid-feedback name-error">
                        <strong id="color1">{{ $errors->first('name') }}</strong>
                    </span>
                @endif
                <strong id="color1"><span id="name-error"></span></strong> <!-- Add the error message element -->

                <input type="email" id="email-sign" name="email1" placeholder="Email"
                    class="form-control{{ $errors->has('email1') ? ' is-invalid' : '' }}" value="{{ old('email1') }}">
                @if ($errors->has('email1'))
                    <span class="invalid-feedback email-error">
                        <strong id="color1">{{ $errors->first('email1') }}</strong>
                    </span>
                @endif
                <strong id="color1"><span id="email-error-sign"></span></strong>
                <!-- Add the error message element -->

                <input type="password" name="password1" id="password-sign" placeholder="Password"
                    class="form-control{{ $errors->has('password1') ? ' is-invalid' : '' }}">
                    <span class="input-group-text"  onclick="password_hide();">
                        <i class="fas fa-eye" id="show_eye"></i>
                        <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                    </span>
                @if ($errors->has('password1'))
                    <span class="invalid-feedback password-error">
                        <strong id="color1">{{ $errors->first('password1') }}</strong>
                    </span>
                @endif
                <strong id="color1"><span id="password-error-sign"></span></strong>
                <!-- Add the error message element -->

                <input type="password" class="form-control" name="password1_confirmation" id="conf-Password"
                    placeholder="Confirm Password">
                <strong id="color1"><span id="conf-password-error-sign"></span></strong>
                <!-- Add the error message element -->
                <input type="file" id="image_User" name="image_user" accept="image/*" 
                class="form-control{{ $errors->has('image_user') ? ' is-invalid' : '' }}" />
            <strong id="color1"><span id="image-error-user"></span></strong>
            @if ($errors->has('imageUser_error'))
                <span class="invalid-feedback name-error">
                    <strong id="color1">{{ $errors->first('image_user') }}</strong>
                </span>
            @endif
                <!-- Add the error message element -->

                <button type="submit" class="btn">Sign Up</button>
            </form>
        </div>

        <!-- sign up for lessor sign-up.lessor -->
        <div id="lessor-signup-form" class="form-container sign-up-container-lessor">
            <form action="{{ route('sign-up.lessor') }}" method="post" enctype="multipart/form-data"
                id="form-container signup-lessor-form" class="sign-p-container-lessor">
                {!! csrf_field() !!}
                <h1>Create Account as service provider </h1>
                {{-- <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div> --}}
                <span>or use your email for registration</span>
                <input type="text" placeholder="Name" name="name2" id="name-sign-lessor"
                    class="form-control{{ $errors->has('name2') ? ' is-invalid' : '' }}" />
                <strong id="color1"><span id="name-error-lessor"></span></strong>
                @if ($errors->has('name2'))
                    <span class="invalid-feedback name-error">
                        <strong id="color1">{{ $errors->first('name2') }}</strong>
                    </span>
                @endif

                <input type="email" placeholder="Email" name="email2" id="email-sign-lessor"
                    class="form-control{{ $errors->has('email2') ? ' is-invalid' : '' }}" />
                <strong id="color1"><span id="email-error-sign-lessor"></span></strong>
                @if ($errors->has('email2'))
                    <span class="invalid-feedback name-error">
                        <strong id="color1">{{ $errors->first('email2') }}</strong>
                    </span>
                @endif

                <input type="tel" placeholder="Mobile" name="mobile_number" id="mobile_number"
                    class="form-control{{ $errors->has('mobile_number') ? ' is-invalid' : '' }}" />
                <strong id="color1"><span id="mobile_number-error-sign-lessor"></span></strong>
                @if ($errors->has('mobile_number'))
                    <span class="invalid-feedback name-error">
                        <strong id="color1">{{ $errors->first('mobile_number') }}</strong>
                    </span>
                @endif
                
                    
                <input type="password" placeholder="Password" name="password2" id="password-sign-lessor"
                    class="form-control{{ $errors->has('password2') ? ' is-invalid' : '' }}" />
                    
                    <span class="input-group-text"  onclick="password_show_hide();">
                        <i class="fas fa-eye" id="show_eye"></i>
                        <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                    </span>
                <strong id="color1"><span id="password-error-sign-lessor"></span></strong>
                @if ($errors->has('password2'))
                    <span class="invalid-feedback name-error">
                        <strong id="color1">{{ $errors->first('password2') }}</strong>
                    </span>
                @endif
            
                <input type="password" placeholder="Confirm Password" name="password2_confirmation"
                    id="conf-Password-lessor" />
                <strong id="color1"><span id="conf-password-error-sign-lessor"></span></strong>

                <input type="file" id="image_lessor" name="imagelessor" accept="image/*" 
                class="form-control{{ $errors->has('imagelessor') ? ' is-invalid' : '' }}" />
            <strong id="color1"><span id="image-error-lessor"></span></strong>
            @if ($errors->has('imagelessor'))
                <span class="invalid-feedback name-error">
                    <strong id="color1">{{ $errors->first('imagelessor') }}</strong>
                </span>
            @endif

                <button type="submit" class="btn ">Sign Up</button>
            </form>
        </div>

        <div class="form-container sign-in-container">
            <form action="{{ route('login.check') }}" method="post" novalidate id="login-form">
                @csrf
                <div id="backhome"><a href="{{ route('home.index') }}"><i class="fa-solid fa-house"></i></a></div>
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your account</span>

                <input type="email" name="email"
                    class="form-control{{ $errors->has('email') || (Session::has('login-error') && !empty(Session::get('login-error'))) ? ' is-invalid' : '' }}"
                    id="floatingInputSignIn" placeholder="Email" value="{{ old('email') }}">
                @if ($errors->has('email') || (Session::has('login-error') && !empty(Session::get('login-error'))))
                    <span class="invalid-feedback email-error">
                        <strong id="color1">{{ $errors->first('email') }}</strong>
                        <strong id="color1">{{ Session::get('login-error') }}</strong>
                    </span>
                @endif

                <strong id="color1"><span id="email-error-login"></span></strong>

                <input type="password" name="password"
                    class="form-control{{ $errors->has('password') || (Session::has('login-error') && !empty(Session::get('login-error'))) ? ' is-invalid' : '' }}"
                    id="password-login" placeholder="Password">
                    <span class="input-group-text"  onclick="password_login();">
                        <i class="fas fa-eye" id="show_eyee"></i>
                        <i class="fas fa-eye-slash d-none" id="hide_eyee"></i>
                    </span>
                @if ($errors->has('password') || (Session::has('login-error') && !empty(Session::get('login-error'))))
                    <span class="invalid-feedback password-error">
                        <strong id="color1">{{ $errors->first('password') }}</strong>
                        <strong id="color1">{{ Session::get('login-error') }}</strong>
                    </span>
                @endif

                <strong id="color1"><span id="password-error-login"></span></strong>

                <button type="submit" class="btn">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us, please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                    <p>if you want to enter as service provider, regerster now !</p>
                    <button class="ghost" id="signUp1">Sign Up as service provider</button>
                </div>
            </div>
        </div>
    </div>

    <script src="signup/signup.js"></script>

</body>

</html>
