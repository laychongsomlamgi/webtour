<!-- /*
* Template Name: Tour
* Template Author: Untree.co
* Tempalte URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />
    <link rel="icon" type="image/png" href="{{asset('admin/assets/img/plane-removebg.png')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('app/fonts/material-icon/css/material-design-iconic-font.min.css')}}">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Source+Serif+Pro:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('app/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('app/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('app/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('app/css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('app/fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{asset('app/fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('app/css/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('app/css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('app/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('app/css/styleLogin.css')}}">

    <title>Đăng nhập</title>
</head>

<body>
    <div class="main">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="{{ asset('app/images/signin-image.jpg')}}" alt="sing up image"></figure>
                        <a href="{{url('/register')}}" class="signup-image-link btn-login-return" >Tạo tài khoản</a>
                        <a href="{{url('/')}}" class="signup-image-link btn-login-return mt-4" >Trang chủ</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">ĐĂNG NHẬP</h2>
                        <form action="{{route('login')}}" method="POST" class="register-form" id="login-form">
                            @csrf
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="email" id="your_name" placeholder="Email" />
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="your_pass" placeholder="Mật khẩu" />
                            </div>
                            @if ($message = Session::get('error'))
                                <div class="alert alert-danger alert-block">
                                    <strong>{{$message}}</strong>
                                </div>
                            @endif
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Nhớ mật khẩu</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Đăng nhập" />
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Đăng nhập bằng tài khoản</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>

    </div>

    <script src="{{ asset('app/js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{ asset('app/js/popper.min.js')}}"></script>
    <script src="{{ asset('app/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('app/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('app/js/jquery.animateNumber.min.js')}}"></script>
    <script src="{{ asset('app/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{ asset('app/js/jquery.fancybox.min.js')}}"></script>
    <script src="{{ asset('app/js/aos.js')}}"></script>
    <script src="{{ asset('app/js/moment.min.js')}}"></script>
    <script src="{{ asset('app/js/daterangepicker.js')}}"></script>

    <script src="{{ asset('app/js/typed.js')}}"></script>
    <!-- JS -->
    <script src="{{ asset('app/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('app/js/main.js')}}"></script>
    <script src="{{ asset('app/js/custom.js')}}"></script>

</body>

</html>