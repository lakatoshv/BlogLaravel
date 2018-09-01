@extends("layouts.layout")
@section("title")
  <title>LaravelBlog - Авторизація</title>
@endsection

@section('content')
<div class="container">
    <div class="card card-container">
        <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
        <p id="profile-name" class="profile-name-card"></p>
        <b class="text-center">Авторизуйтесь</b><br>
        <p id="profile-name" class="profile-name-card"></p>
        <form class="form-signin" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <span id="reauth-email" class="reauth-email"></span>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" id="inputEmail" class="form-control" placeholder="Електронна пошта" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" id="inputPassword" class="form-control" placeholder="Пароль" name="password" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div id="remember" class="checkbox">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Запам'ятати мене
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Ввійти</button>
        </form>
        <a class="btn btn-link" href="{{ route('password.request') }}">Забули пароль?</a>
        <p id="profile-name" class="profile-name-card"></p>
        <div class="login-or">
            <hr class="hr-or">
            <span class="span-or">Або</span>
        </div>
        <p id="profile-name" class="profile-name-card"></p>
        <b class="text-center">Ввійдіть за допомогою соціальних мереж</b><br>
        <p id="profile-name" class="profile-name-card"></p>
        <a href="#" class="btn btn-lg btn-block" id="facebook">Facebook</a href="#">
        <a href="#" class="btn btn-lg btn-block" id="google-plus">Google</a href="#">
    </div><
</div>
@endsection
