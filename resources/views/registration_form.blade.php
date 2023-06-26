@extends('index')

@section('registration')
    <form class="mt-5" style="display: flex; flex-direction: column; margin-left: 30px" id="regForm">
        <h3 class="form-label">Форма регистрации</h3>
        <br>
        <div class="alert alert-danger" role="alert" style="display: none; width: 20%">

        </div>
        <div class="alert alert-success" role="alert" style="display: none; width: 20%">

        </div>
        <br>
        <div class="form-group">
            <label class="form-label">Имя</label>
            <input class="form-control" style="width: 20%" name="firstname">
        </div>
        <div class="form-group">
            <label class="form-label">Фамилия</label>
            <input class="form-control" style="width: 20%" name="lastname">
        </div>
        <div class="form-group">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" style="width: 20%" placeholder="test@mail.ru" name="email">
        </div>
        <div class="form-group">
            <label class="form-label">Пароль</label>
            <input type="password" class="form-control" style="width: 20%" name="password">
        </div>
        <div class="form-group">
            <label class="form-label">Повтор пароля</label>
            <input type="password" class="form-control" style="width: 20%" name="repeat_password">
        </div>
        <div class="form-group">
            <a href="/">Уже зарегестрирован?</a>
        </div>
        <br>
        <div class="form-group">
            <div class="btn btn-primary" style="width: 20%" id="sendRegForm">Отправить</div>
        </div>
    </form>
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
                        $('.alert').text(resp['responseJSON']['message']);
                        $('.alert').show();
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