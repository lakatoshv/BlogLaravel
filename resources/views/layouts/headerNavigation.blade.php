<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
  <div class="container">
    <img src="{{ asset('blog.ico') }}" width="50px" height="50px">
    <a class="navbar-brand" href="{{ url('/') }}">LaravelBlog</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fa fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        @guest
        @else
          <li class="nav-item">
            <a class="nav-link" href="{{url('myPosts')}}">Мої пости</a>
          </li>
        @endguest
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/about') }}">Про нас</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/contact') }}">Контакти</a>
        </li>
        @guest
          <li class="nav-item"><a href="{{ route('login') }}" class="nav-link"><i class="fa fa-sign-in"></i> Ввійти</a></li>
          <li class="nav-item"><a href="{{ route('register') }}" class="nav-link"><i class="fa fa-user"></i> Зареєструватись</a></li>
        @else
          <li class="nav-item dropdow">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </li>
            </ul>
          </li>
           <li class="nav-item">
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Вийти</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
              </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>