@extends('index')

@section('registration')
    <style>
        html {
            height: 100%;
        }

        body {
            /* Remember to use the other versions for IE 10 and older browsers! */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100%;
            font-family: 'lato', sans-serif;
            color: #fff;
            background: #222222;
            background: #16222A; /* fallback for old browsers */
            background: -webkit-linear-gradient(to top, #16222A , #3A6073); /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to top, #16222A , #3A6073); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }

        .container {
            background:rgba(58,63,68,0.5);
            border-radius: 5px;
            box-shadow: 0 1.5px 0 0 rgba(0,0,0,0.1);
            width:450px;
            display: flex;
            flex-direction: column;
        }

        .logo{
            font-family: "museo-slab";
            font-size:20px;
            text-align: center;
            padding: 20px 20px 0;
            margin:0;
        }

        .login-item {
            color: #ffff;
            padding:25px 25px 0;
            margin: 20px 20px 0;
            border-radius: 3px;
        }

        input {
            border: 0;
            color: inherit;
            font: inherit;
            margin: 0;
            outline: 0;
            padding: 0;
            -webkit-transition: background-color .3s;
            transition: background-color .3s;
        }

        .user:before {
            content: '\f007';
            font: 14px fontawesome;
            color: #5b5b5b;
        }

        .lock:before {
            content: '\f023';
            font: 14px fontawesome;
            color: #5b5b5b;
        }

        .form input[type="password"], .form input[type="text"], .form input[type="submit"] {
            width: 100%;
        }

        .form-login label,
        .form-login input[type="text"],
        .form-login input[type="password"],
        .form-login input[type="submit"] {
            border-radius: 0.25rem;
            padding: 1rem;
            color: #3A3F44;
        }

        .form-login label {
            background-color: #222222;
            border-bottom-right-radius: 0;
            border-top-right-radius: 0;
            padding-left: 1.25rem;
            padding-right: 1.25rem;
        }

        .form-login input[type="text"], .form-login input[type="password"] {
            background-color: #ffffff;
            border-bottom-left-radius: 0;
            border-top-left-radius: 0;
        }
        .form-login input[type="text"]:focus, .form-login input[type="text"]:hover, .form-login input[type="password"]:focus, .form-login input[type="password"]:hover {
            background-color: #eeeeee;
        }
        .form-login input[type="submit"] {
            background-color: #00B9BC;
            color: #eee;
            font-weight: bold;
            text-transform: uppercase;
        }
        .form-login input[type="submit"]:focus, .form-login input[type="submit"]:hover {
            background-color: #197071;
        }
        .form-field {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            margin-bottom: 2rem;
        }


        .hidden {
            border: 0;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }

        .text--center {
            text-align: center;
        }
    </style>
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