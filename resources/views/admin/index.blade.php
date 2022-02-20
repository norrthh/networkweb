@extends('layouts.admin')

@section('title-site')
    Админ Панель
@endsection

@section('content')
        <div class="index">
            <div class="row">
                <div class="col-sm">
                    <div class="card">
                        <div class="card-body text-center">
                            <p>Количество аккаунтов</p>
                            <span>{{ $users }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card">
                        <div class="card-body text-center">
                            <p>Количество админов</p>
                            <span>{{ $admin }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script url = "{{asset('js/')}}"></script>
@endsection
