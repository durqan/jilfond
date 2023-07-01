@extends('index')

@section('home_page')
    <div style="display: flex; justify-content: space-between">
        <div>
            Домашная страница для авторизованных пользователей!
        </div>
        <form action="logout">
            <button type="submit" class="btn btn-primary">Выйти</button>
        </form>
    </div>
@endsection