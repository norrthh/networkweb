@extends('layouts.admin')

@section('title-site')
    Админ Панель
@endsection



@section('content')
    <div class="admins">
        <label for="#">НикНейм:</label>
        <input placeholder="North_Hemingway" type="text" class="form-control updatename">
        <select class="form-select" id = "type">
            <option value="1">Прокачать аккаунт</option>
            <option value="2">Выдать ДНК</option>
        </select>

        <div class="btn btn-primary" id = "btn-update">Прокачать</div>

        <div class="info">
            <h3>Прокачка аккаунта:</h3>

            <p>
                Если аккаунт, который вы прокачиваете, имеет уровень ниже <span>3</span>, то ему выдается <span>3 уровень</span> <br>
                На аккаунт так же выдается <span>30.000$</span>, <span>30.000 наркотиков и материаллов</span>
            </p>

            <h3>Выдача Дома На Колёсах</h3>

            <p>
                Выдается в том случае,если на аккаунте не имеется <span>никакого транспорта</span>
            </p>
        </div>
    </div>

    <script url = "{{asset('js/admins-js.js')}}"></script>
@endsection
