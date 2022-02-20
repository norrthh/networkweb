@extends('layouts.admin')

@section('title-site')
    Админ Панель
@endsection



@section('content')
    <div class="admins">
        <h1 class="text-center">Список Промокодов</h1>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Промокод</th>
                <th scope="col">Владелец</th>
                <th scope="col">Количество активаций</th>
            </tr>
            </thead>
            <tbody>
            @foreach($promocode as $promocodes)
                <tr>
                    <th scope="row">{{$promocodes->code}}</th>
                    <td>{{$promocodes->owner}}</td>
                    <td>{{$promocodes->used_count}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script url = "{{asset('js/')}}"></script>
@endsection
