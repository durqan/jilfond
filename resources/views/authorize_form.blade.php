@extends('index')

@section('authorize')
    <form action="authorize" class="mt-5" style="display: flex; flex-direction: column; margin-left: 30px" id="authForm"
          method="POST">
        <h3 class="form-label">Форма авторизации</h3>
        <br>
        @if(isset($error))
            <div class="alert alert-danger" role="alert" style="width: 20%">
                {{$error}}
            </div>
        @endif
        <br>
        <div class="form-group">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" style="width: 20%" placeholder="test@mail.ru" name="email">
        </div>
        <div class="form-group">
            <label class="form-label">Пароль</label>
            <input type="password" class="form-control" style="width: 20%" name="password">
        </div>
        <div class="form-group">
            <a href="/reg">Пройти регистрацию?</a>
        </div>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" style="width: 20%">Отправить</button>
        </div>
    </form>
@endsection