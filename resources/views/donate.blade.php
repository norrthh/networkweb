@extends('layouts.app')

@section('title-site')
    Донат
@endsection


@section('content')
    <div class="donate">
        <div class="container">
            <form>
                <div class="mb-3 text-center">
                    <label for="exampleInputEmail1" class="form-label">НикНейм</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3 text-center">
                    <label for="exampleInputPassword1" class="form-label">Сумма Пополнения</label>
                    <input type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Оплатить</button>

                <img src="/img/payment.png" >
            </form>
        </div>
    </div>
@endsection
