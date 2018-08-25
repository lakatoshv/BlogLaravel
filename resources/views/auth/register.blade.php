@extends("layouts.layout")
@section("title")
  <title>LaravelBlog - Реєстрація</title>
@endsection

@section('content')
<div class="container">
    <div class="card card-container">
        <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
        <p id="profile-name" class="profile-name-card"></p>
        <b class="text-center">Реєстрація</b><br>
        <p id="profile-name" class="profile-name-card"></p>
        <form class="form-signin" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <input id="name" type="text" class="form-control" placeholder="Ім'я" name="name" value="{{ old('name') }}"  required autofocus>
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <span id="reauth-email" class="reauth-email"></span>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" id="email" class="form-control" placeholder="Електронна пошта" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" id="password" class="form-control" placeholder="Пароль" name="password" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <input type="password" id="password-confirm" class="form-control" placeholder="Підтвердження паролю" name="password_confirmation" required autofocus>
            </div>
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Зареєструватись</button>
        </form>
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
