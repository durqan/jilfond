@extends('index')

@section('authorize')
    <link rel="stylesheet" href="{{asset(('css/auth_reg_form.css'))}}">
    <div class="container">
        <div class="logo">Форма авторизации</div>
        <div class="login-item">
            @if(isset($error))
                <div class="alert alert-danger" role="alert" style="width: 20%">
                    {{$error}}
                </div>
            @endif
            <form action="authorize" method="post" class="form form-login">
                <div class="form-field">
                    <input id="login-username" type="text" class="form-input" placeholder="Электронная почта" name="email" required>
                </div>

                <div class="form-field">
                    <input id="login-password" type="password" class="form-input" placeholder="Пароль" name="password" required>
                </div>
                <div class="form-field">
                    <a href="/reg">Пройти регистрацию?</a>
                </div>
                <div class="form-field">
                    <input type="submit" value="Войти">
                </div>
            </form>
        </div>
    </div>
@endsection