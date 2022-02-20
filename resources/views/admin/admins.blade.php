@extends('layouts.admin')

@section('title-site')
    Админ Панель
@endsection



@section('content')
    <div class="admins">
        <h1 class="text-center">Список Администраций</h1>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">НикНейм</th>
                <th scope="col">Уровень адм</th>
                <th scope="col">Ответов в репорт:</th>
                <th scope="col">Блокировок</th>
                <th scope="col">Варнов:</th>
                <th scope="col">Дмг:</th>
                <th scope="col">Норма(за неделю):</th>
            </tr>
            </thead>
            <tbody>
            @foreach($admins as $admined)
                <tr>
                    <td>{{$admined->Name}}</td>
                    <td>{{$admined->level}}</td>
                    <td>{{$admined->s_Reports}}</td>
                    <td>{{$admined->s_Bans}}</td>
                    <td>{{$admined->s_Warns}}</td>
                    <td>{{$admined->s_Prisons}}</td>
                    <td>{{intval($admined->s_OTime / 60)}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script url = "{{asset('js/')}}"></script>
@endsection
