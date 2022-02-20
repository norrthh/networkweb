@extends('layouts.app')

@section('title-site')
    Личный Кабинет
@endsection


@section('content')
    <div class="login">
        <div class="container">
            <h3 class="text-center">Авторизация на сайте игрового аккаунта</h3>
            {{ Session::get('NickName') }}
            <form style = "padding-top:1.5rem">
                <div class="mb-3 text-center">
                    <label for="exampleInputEmail1" class="form-label">Логин</label>
                    <input type="text" id = "logins" name = "logins" class="logins form-control">
                </div>
                <div class="mb-3 text-center">
                    <label for="exampleInputPassword1" class="form-label">Пароль</label>
                    <input type="password" id = "password" name = "password" class="password form-control">
                </div>
                <button type="submit" id = "btn-login" class="btn btn-primary">Оплатить</button>
            </form>
        </div>
    </div>
@endsection
