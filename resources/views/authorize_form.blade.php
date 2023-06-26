@extends('index')

@section('authorize')
    <form class="mt-5" style="display: flex; flex-direction: column; margin-left: 30px" id="authForm">
        <h3 class="form-label">Форма авторизации</h3>
        <br>
        <div class="alert alert-danger" role="alert" style="display: none; width: 20%">

        </div>
        <div class="alert alert-success" role="alert" style="display: none; width: 20%">

        </div>
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
            <div class="btn btn-primary" style="width: 20%" id="sendAuthForm">Отправить</div>
        </div>
    </form>
    <script>
        $(function () {
            $('#sendAuthForm').on('click', function () {

                let form = $('#authForm').serialize();

                $.ajax({
                    url: 'authorize',
                    method: 'POST',
                    dataType: 'JSON',
                    data: form,
                    error: function (resp) {
                        $('.alert-danger').text(resp['responseJSON']['message']);
                        $('.alert-danger').show();
                    },
                    success: function (resp) {
                        if (resp === 'error_auth') {
                            $('.alert-danger').text(resp['responseJSON']['message']);
                            $('.alert-danger').show();
                        }
                        if (resp === 'success') {
                            $('.alert-danger').hide();
                            $('.alert-success').text('Успешная авторизация');
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