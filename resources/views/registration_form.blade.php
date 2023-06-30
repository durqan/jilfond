@extends('index')

@section('registration')
    <link rel="stylesheet" href="{{asset(('css/auth_reg_form.css'))}}">
    <div class="container">
        <div class="logo">Форма регистрации</div>
        <div class="login-item">
            <form class="form form-login" id="regForm">
                <div class="alert alert-danger" role="alert" style="display: none;">

                </div>
                <div class="alert alert-success" role="alert" style="display: none;">

                </div>
                <div class="form-field">
                    <input type="text" class="form-input" placeholder="Имя" name="firstname" required>
                </div>
                <div class="form-field">
                    <input type="text" class="form-input" placeholder="Фамилия" name="lastname" required>
                </div>
                <div class="form-field">
                    <input type="text" class="form-input" placeholder="Электронная почта" name="email" required>
                </div>
                <div class="form-field">
                    <input type="password" class="form-input" placeholder="Пароль" name="password" required>
                </div>
                <div class="form-field">
                    <input type="password" class="form-input" placeholder="Повторите пароль" name="repeat_password" required>
                </div>
                <div class="form-field">
                    <a href="/">Уже зарегестрирован?</a>
                </div>
                <div class="form-field">
                    <div class="btn btn-primary" id="sendRegForm">Отправить</div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(function () {
            $('#sendRegForm').on('click', function () {

                let form = $('#regForm').serialize();

                $.ajax({
                    url: 'do_reg',
                    method: 'POST',
                    dataType: 'JSON',
                    data: form,
                    error: function (resp) {
                        $('.alert-danger').text(resp['responseJSON']['message']);
                        $('.alert-danger').show();
                    },
                    success: function (resp) {
                        if (resp === 'success') {
                            $('.alert-danger').hide();
                            $('.alert-success').text('Успешная регистрация');
                            $('.alert-success').show();

                            setTimeout(function () {
                                location.replace('home_page')
                            }, 3000);
                        }
                    }
                });
            });
        });
    </script>
@endsection