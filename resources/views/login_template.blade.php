<!DOCTYPE html>


<html lang="en">

    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        <title>WOW!</title>
        <meta name="description" content="Latest updates and statistic charts">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

        <!--begin::Web font -->
      @include('head')
        <script>
            WebFont.load({
                google: {
                    "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
                },
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
        </script>
       
        <script>
            (function(i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function() {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-37564768-1', 'auto');
            ga('send', 'pageview');
        </script>
    </head>

    <!-- end::Head -->

    <!-- begin::Body -->
    <body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

        <!-- begin:: Page -->
        <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #9816f4;">
  <a class="navbar-brand"style="color: white;" href="#">WOW!</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" style="color: white;" href="{{route('admin.login')}}"> Admin<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
         <a class="nav-link" style="color: white;" href="{{route('login')}}"> User<span class="sr-only">(current)</span></a>
      </li>


  </div>
</nav>
        <div class="m-grid m-grid--hor m-grid--root m-page">
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url('/images/bg-3.jpg');">
                <div class="m-grid__item m-grid__item--fluid    m-login__wrapper">
                    <div class="m-login__container">
                        <div class="m-login__logo">
                            <a href="#">
                                <img src="{{asset('demo/demo10/media/img/logo/logo.png')}}">
                            </a>
                        </div>
       
                         @section('login')
                        @show

                         @section('register')
                        @show

                         @section('forget')
                        @show

                         @section('change_pass')
                        @show

                         
               
               
          
                   
                 
                    
                    </div>
                </div>
            </div>
        </div>

        <!-- end:: Page -->
<!--begin::Base Scripts -->
<script src="{{asset('js/vendors.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('js/scripts.bundle.js')}}" type="text/javascript"></script>
<!--end::Base Scripts -->
    </body>

    <!-- end::Body -->
</html>