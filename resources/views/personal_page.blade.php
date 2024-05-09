@extends('index')

@section('personal_page')
    <link rel="stylesheet" href="{{asset(('css/auth_reg_form.css'))}}">
    <div class="container">
        <div class="logo">Личные данные</div>
        <div class="login-item">
            <form class="form form-login" id="personal_page_form">
                <div class="alert alert-danger" role="alert" style="display: none;">

                </div>
                <div class="alert alert-success" role="alert" style="display: none;">

                </div>
                <div class="form-field">
                    <input type="text" class="form-input" placeholder="Имя" name="firstname"
                           value="{{$user['firstname']}}" required>
                </div>
                <div class="form-field">
                    <input type="text" class="form-input" placeholder="Фамилия" name="lastname"
                           value="{{$user['lastname']}}" required>
                </div>
                <div class="form-field">
                    <input type="text" class="form-input" placeholder="Электронная почта" name="email"
                           value="{{$user['email']}}" required>
                </div>
                <div class="form-field">
                    <input type="text" class="form-input" placeholder="Пароль" name="password">
                </div>
                <div class="form-field" style="display: flex; justify-content: space-between">
                    <div class="btn btn-primary" id="back_to_home_page">Назад</div>
                    <div class="btn btn-primary">Сохранить</div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(function (){
            $('#back_to_home_page').on('click', function (){
                location.replace('/home_page');
            });
        })
    </script>
@endsection
