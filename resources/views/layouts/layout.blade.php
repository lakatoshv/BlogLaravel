<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LaravelBlog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ asset('css/clean-blog.min.css') }}">

  </head>

  <body>

    @include("layouts.headerNavigation")

    <!-- Page Header -->
      <header class="masthead" style="background-image: url('{{ asset('img/home-bg-v2.jpg') }}')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>LaravelBlog</h1>
              <hr class="hr">
              <span class="subheading">Цікавий блог про цікаве</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    @yield("content")

    <hr>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-10 col-md-12 mx-auto">
            <ul class="socialIcons">
              <li class="facebook">
                <a href="#">
                  <i class="fa fa-fw fa-facebook"></i>Facebook
                </a>
              </li> 
              <li class="twitter">
                <a href="#">
                  <i class="fa fa-fw fa-twitter"></i>Twitter
                </a>
              </li> 
              <li class="instagram">
                <a href="#">
                  <i class="fa fa-fw fa-instagram"></i>Instagram
                </a>
              </li> 
              <li class="pinterest">
                <a href="#">
                  <i class="fa fa-fw fa-pinterest-p"></i>Pinterest
                </a>
              </li> 
              <li class="vk">
                <a href="#">
                  <i class="fa fa-fw fa-vk"></i>VKontakte
                </a>
              </li> 
              <li class="tumblr">
                <a href="#">
                  <i class="fa fa-fw fa-tumblr"></i>Tumblr
                </a>
              </li> 
               <li class="linkedin">
                <a href="#">
                  <i class="fa fa-fw fa-linkedin"></i>Linkedid
                </a>
              </li> 
              <li class="google-plus">
                <a href="#">
                  <i class="fa fa-fw fa-google-plus"></i>Google+
                </a>
              </li> 
              <li class="yahoo">
                <a href="#">
                  <i class="fa fa-fw fa-yahoo"></i>Yahoo
                </a>
              </li>  
              <li class="skype">
                <a href="#">
                  <i class="fa fa-fw fa-skype"></i>Skype
                </a>
              </li>
            </ul>
            <p class="copyright text-muted">Copyright &copy; Your Website 2018</p>
          </div>
        </div>
      </div>
    </footer>

    <script src="{{ asset('plugins/jquery/jquery.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/clean-blog.min.js') }}"></script>
  </body>

</html> 