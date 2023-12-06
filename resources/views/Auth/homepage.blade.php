<!DOCTYPE html>
<html lang="en">

<head>
  <!-- basic -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- mobile metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <!-- site metas -->
  <title>Educaational Platform</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- fevicon -->
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <!-- bootstrap css -->
  <link rel="stylesheet" href="{{url('public/dist/homepage/css/bootstrap.min.css')}}">
  <!-- style css -->
  <link rel="stylesheet" href="{{url('public/dist/homepage/css/style.css')}}">
  <!-- Responsive-->
  <link rel="stylesheet" href="{{url('public/dist/homepage/css/responsive.css')}}">  
  <!-- Scrollbar Custom CSS -->
  <link rel="stylesheet" href="{{url('public/dist/homepage/css/jquery.mCustomScrollbar.min.css')}}">
  <!-- Tweaks for older IEs-->
  <link rel="stylesheet" href="{{url('https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css')}}">
  <link rel="stylesheet" href="{{url('https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css')}}" media="screen">
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

<style>
  body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
  }

  .header-top {
    background-color: #3498db; /* Set background color for the header top */
    color: #fff; /* Set text color for the header top */
  }

  .logo a {
    color: #3498db; /* Set text color for the logo */
    font-size: 25px; /* Set font size for the logo */
    text-decoration: none;
  }

  .menu-area-main {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .menu-area-main li {
    display: inline-block;
    margin-right: 20px;
  }

  .menu-area-main li a {
    color: #333; /* Set text color for menu items */
    text-decoration: none;
    font-size: 16px; /* Set font size for menu items */
  }

  .menu-area-main li.active a {
    color: #3498db; /* Set text color for active menu item */
    font-weight: bold;
  }
  li.active2 {
    font-size: bold;
    color: yellow;
    display: block;
    font-size: 50px;
}
  </style>
</head>
<!-- body -->

<body class="main-layout">
  <!-- loader  -->
  <div class="loader_bg">
    <div class="loader"><img src="images/loading.gif" alt="#" /></div>
  </div>
  <!-- end loader -->
  <!-- header -->
  <header>
    <!-- header inner -->
    <div class="header-top">
      <div class="header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-3 col logo_section">
              <div class="full">
                <div class="center-desk">
                  <div class="logo">
                    <a href="index.html">Educational Platform</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-10 col-lg-8 col-md-8 col-sm-9">
              <div class="header_information">
                <div class="menu-area">
                  <div class="limit-box">
                    <nav class="main-menu">
                      <ul class="menu-area-main">
                        <li class="active"> <a href="index.html">Home</a> </li>
                        <li> <a href="homepage/login">Login </a> </li>
                        <li> <a href="homepage/registration">Registration</a> </li>
                        <li class="active2"> Welcome To Education Platform</li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
     <!-- end header inner -->

     <!-- end header -->
     <section class="slider_section">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">

            <div class="container-fluid padding_dd">
              <div class="carousel-caption">
                <div class="row">
                  <div class="col-xl-5 col-lg-5 col-md-5 col-sm-10">
                    <div class="text-bg">
                      <h1><strong class="yellow">Educational</strong>  Platform Management System </h1>
                      <p style="font-weight:bold">Education is the passport to the future, for tomorrow belongs to those who prepare for it today</p>
                      <a href="#">Welcome</a>
                    </div>
                  </div>
                  <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
                  <div class="login-box">
  <!-- /.login-logo -->
                    <div class="card card-outline card-primary">
                      <div class="card-header text-center">
                          <h1>Educational Platform</h1>
                      </div>
                    <div class="card-body">
                        <p class="login-box-msg">Login</p>

                      <form action="{{ route('Authlogin') }}" method="POST">
                          @csrf
                          <div class="input-group mb-3">
                            <input type="email" class="form-control" required name="email" placeholder="Email">
                            <span class="text-danger">@error('email') {{$message}} @enderror</span>
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                              </div>
                            </div>
                          </div>
                          <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            <span class="text-danger">@error('password') {{$message}} @enderror</span>
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                              </div>
                            </div>
                          </div>
          <!-- /.col -->
                            <div class="col-14">
                              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
          <!-- /.col -->
                          </div>
                        </div>
                      </form>



    <!-- /.card-body -->
                    </div>
                    <div id="about" class="about">
                      <div class="container">
                        <div class="row">
                          <div class="col-xl-10 col-lg-8 col-md-10 col-sm-12">
                            <div class="about-box">
                              <h2>About <strong class="yellow">Our Website</strong></h2>
                              <p> 
                                Welcome to our Educational Platform website – your all-in-one solution for seamless education management.
                    Experience the ease of attendance tracking, instant grade updates, and so many exciting features.
                                Empowering students,teachers alike, we foster a collaborative learning environment.
                        Discover the future of education administration with our intuitive and secure platform, designed for your success.  </p>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div> 
  <!-- /.card -->
                  </div>

                  </div>
                </div>
              </div>
            </div>
          </div>

  </div>

</section>
</div>
</header>



<!-- about  -->

   <!-- Javascript files-->
          <script src="{{url('public/dist/homepage/js/jquery.min.js')}}"></script>
          <script src="{{url('public/dist/homepage/js/popper.min.js')}}"></script>
          <script src="{{url('public/dist/homepage/js/bootstrap.bundle.min.js')}}"></script>
          <script src="{{url('public/dist/homepage/js/jquery-3.0.0.min.js')}}"></script>
          <script src="{{url('public/dist/homepage/js/plugin.js')}}"></script>
          <!-- sidebar -->
          <script src="{{url('public/dist/homepage/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
          <script src="{{url('public/dist/homepage/js/custom.js')}}"></script>
          <script src="{{url('https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js')}}"></script>


</body>

</html>