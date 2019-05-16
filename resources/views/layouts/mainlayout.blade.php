<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Sumon Rahman">
    <meta name="description" content="">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>WeVote</title>
    <!-- Place favicon.ico in the root directory -->
    <link rel="icon" type="image/png" href="{{asset('images/favicon.png')}}" />
    <!-- Plugin-CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <!-- Main-Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css')}}">
    <script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>





    @yield('content')



<!-- Footer-Area -->
<footer class="footer-area" id="contact_page">
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title text-center">
                        <h5 class="title">Contact US</h5>
                        <h3 class="dark-color" style="color: #000;font-weight: 800;font-size: 35px;">it is always a pleasure to hear from you</h3>
                        <div class="space-60"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <div class="footer-box">
                        <div class="box-icon">
                            <span class="lnr lnr-map-marker"></span>
                        </div>
                        <p>09, 15 october St. Manouba, 2010</p>
                    </div>
                    <div class="space-30 hidden visible-xs"></div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="footer-box">
                        <div class="box-icon">
                            <span class="lnr lnr-phone-handset"></span>
                        </div>
                        <p>+216 50.500.500</p>
                    </div>
                    <div class="space-30 hidden visible-xs"></div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="footer-box">
                        <div class="box-icon">
                            <span class="lnr lnr-envelope"></span>
                        </div>
                        <p>contact@wevo.io
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer-Bootom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-5">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    <span style="font-weight: 700;">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | WEVO</span>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    <div class="space-30 hidden visible-xs"></div>
                </div>
                <div class="col-xs-12 col-md-7">
                    <div class="footer-menu">
                        <ul>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Features</a></li>
                            <li><a href="#">Pricing</a></li>
                            <li><a href="#">Testimonial</a></li>
                            <li><a href="#">Contacts</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer-Bootom-End -->
</footer>
<!-- Footer-Area-End -->
<!--Vendor-JS-->
<script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('js/vendor/jquery-ui.js') }}"></script>
<script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
<!--Plugin-JS-->
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/contact-form.js')}}"></script>
<script src="{{asset('js/ajaxchimp.js')}}"></script>
<script src="{{asset('js/scrollUp.min.js')}}"></script>
<script src="{{asset('js/magnific-popup.min.js')}}"></script>
<script src="{{asset('js/wow.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

<!--Main-active-JS-->
<script src="{{asset('js/main.js')}}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>

<script>
    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}")
    @endif
</script>
</body>

</html>
