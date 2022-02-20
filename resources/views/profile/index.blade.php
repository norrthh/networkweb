@extends('layouts.app')

@section('title-site')
    Личный Кабинет
@endsection

@php
    $skin = explode(",", $users->pChars);
    $skill = explode(",", $users->pGunSkills);

    switch($house->hKlass) {
        case 0: $hKlass = 'N'; break;
        case 1: $hKlass = 'D'; break;
        case 2: $hKlass = 'C'; break;
        case 3: $hKlass = 'B'; break;
        case 4: $hKlass = 'A'; break;
        case 5: $hKlass = 'S'; break;
        default: $hKlass = 'Неизвестно'; break;
    }

    if ($users->pDrug == '-') $drugs= 'Отсутствует';
    if ($users->pMarriedTo == '-') $sex = 'Отсутствует';
    if ($users->pWarns == '0') $drugs = 'Отсутствуют';

    switch($users->pJob) {
        case 0: $pJob = 'Безработный'; break;
        case 1: $pJob = 'Водитель автобуса'; break;
        case 2: $pJob = 'Таксист'; break;
        case 3: $pJob = 'Продавец хотдогов'; break;
        case 4: $pJob = 'Развозчик продуктов'; break;
        case 5: $pJob = 'Механик'; break;
        case 6: $pJob = 'Инкассатор'; break;
        case 7: $pJob = 'Прораб'; break;
        case 8: $pJob = 'Тренер'; break;
        case 9: $pJob = 'Дальнобойщик'; break;
    }
    switch($users->pMember) {
        case 0: $members = 'Гражданский'; break;
        case 1: $members = 'LSPD'; break;
        case 2: $members = 'ФБР'; break;
        case 3: $members = 'Армия СФ'; break;
        case 4: $members = 'Медики СФ'; break;
        case 5: $members = 'La Cosa Nostra'; break;
        case 6: $members = 'Yakuza'; break;
        case 7: $members = 'Мэрия'; break;
        case 8: $members = 'Casino'; break;
        case 9: $members = 'SF News'; break;
        case 10: $members = 'SFPD'; break;
        case 11: $members = 'Автошкола'; break;
        case 12: $members = 'Ballas Gang'; break;
        case 13: $members = 'Vagos Gang'; break;
        case 14: $members = 'Русская Мафия'; break;
        case 15: $members = 'Grove Street'; break;
        case 16: $members = 'LS News'; break;
        case 17: $members = 'Aztecas Gang'; break;
        case 18: $members = 'Rifa Gang'; break;
        case 19: $members = 'Армия ЛВ'; break;
        case 20: $members = 'LV News'; break;
        case 21: $members = 'LVPD'; break;
        case 22: $members = 'Медики ЛС'; break;
        case 23: $members = 'Медики ЛВ'; break;
        case 24: $members = "Hell's Angels MC"; break;
        case 25: $members = 'Warlocks MC'; break;
        case 26: $members = 'Pagans MC'; break;
        default: $members = 'Неизвестно'; break;
    }
@endphp

@section('content')
    <section class="profile">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 profile__container d-flex">
                    <div class="profile__content">
                        <div class="col-lg-4 col-sm-12">
                            <div class = "row" style = "display:unset">
                                <div class="col-sm profiles" style = "background: rgba(255,255,255,.04);">
                                    <div class="user__skin__content d-flex" style = "background: rgba(255,255,255,.04);">
                                        <img style = "background: rgba(255,255,255,.04);" src="{{ asset('/img/skins/') }}/{{ $skin[0]}}.png" class="user__skin__image" >
                                        <div class="user__name__content" style = "background: rgba(255,255,255,.04);">
                                            <!-- <h1>Reiner Ghost</h1> -->
                                            <div class="block">{{ $users->Name}}</div>
                                            <div class="block">#{{ $users->pID}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="user__navblock__list">
                                        <a class="tablinks" onclick="openTabs(event, 'stats')" id="defaultOpen"><div class="user__navblock">Статистика</div></a>
                                        <a class="tablinks" onclick="openTabs(event, 'infostats')"><div class="user__navblock">Дополнительная информация</div></a>
                                        @if($admin)
                                            @if($admin->level >= 6)
                                                @if(Session::get('ANickName'))
                                                    <a href="{{route('admin')}}" class = "tablinks"><div class="user__navblock">Админ Панель</div></a>
                                                @else
                                                    <a onclick="openTabs(event, 'admin')" class = "tablinks"><div class="user__navblock">Админ Панель</div></a>
                                                @endif
                                            @endif
                                        @endif

                                        @if($businesses or $farms)
                                            <a onclick="openTabs(event, 'biz')" class = "tablinks"><div class="user__navblock">Бизнес</div></a>
                                        @endif

                                        @if($house)
                                            <a onclick="openTabs(event, 'house')" class = "tablinks"><div class="user__navblock">Дома</div></a>
                                        @endif

                                        @if($cars)
                                            <a onclick="openTabs(event, 'cars')" class = "tablinks"><div class="user__navblock">Личный транспорт</div></a>
                                        @endif

                                        <a href="/logout"><div class="user__navblock">Выйти</div></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8 col-sm-12" style = "margin-left: 1rem;border-radius: 1rem;">
                            <div class="user__stats">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="skills">
                                                <div class="row text-center">
                                                    <div class="col-sm">
                                                    <!-- [0] Slinced Pistol |[1] Desert Eagle |[2] ShotGun |[3] MP5 |[4] AK47 |[5] M4A1 !-->
                                                        <div class="icon"><img src = "{{ asset('/img/pistol.png') }}"></div>
                                                        <p style = "color: rgb(86 114 255); font-weight:bold">{{ $skill[0] }}%</p>
                                                    </div>
                                                    <div class="col-sm">
                                                        <div class="icon"><img src="{{ asset('/img/m4.png') }}" alt=""></div>
                                                        <p style = "color: rgb(86 114 255);font-weight:bold">{{ $skill[5] }}%</p>
                                                    </div>
                                                    <div class="col-sm">
                                                        <div class="icon"><img src="{{ asset('/img/ak47.png') }}" alt=""></div>
                                                        <p style = "color: rgb(86 114 255);; font-weight:bold">{{ $skill[4] }}%</p>
                                                    </div>
                                                    <div class="col-sm">
                                                        <div class="icon"><img src="{{ asset('/img/deagle.png') }}" alt=""></div>
                                                        <p style = "color: rgb(86 114 255);; font-weight:bold">{{ $skill[1] }}%</p>
                                                    </div>
                                                    <div class="col-sm">
                                                        <div class="icon"><img src="{{ asset('/img/mp5.png') }}" alt=""></div>
                                                        <p style = "color: rgb(86 114 255);; font-weight:bold">{{ $skill[3] }}%</p>
                                                    </div>
                                                    <div class="col-sm">
                                                        <div class="icon"><img src="{{ asset('/img/shotgun.png') }}"></div>
                                                        <p style = "color: rgb(86 114 255);;font-weight:bold">{{ $skill[2] }}%</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id = "stats"  class="users col-sm tabcontent">
                                        <div class="row">
                                            <div class="col-6"><p class = "textss">Уровень <br> <span>{{ $users->pLevel }}</span></p></div>
                                            <div class="col-6"><p class = "textss">Опыт <br> <span>{{ $users->pExp }}</span></p></div>
                                            <div class="col-6"><p class = "textss">Наличные деньги <br> <span>{{ number_format($users->pCash) }}</span></p></div>
                                            <div class="col-6"><p class = "textss">Депозит <br> <span>{{ number_format($users->pDeposit) }}</span></p></div>
                                            <div class="col-6"><p class = "textss">Донат счет<br> <span>{{ number_format($users->u_donate) }}</span></p></div>
                                            <div class="col-6"><p class = "textss">Фишек в казино<br> <span>{{ number_format($users->pCasinoChips) }}</span></p></div>
                                            <div class="col-6"><p class = "textss">Банковский счет <br> <span>{{ number_format($users->pBank) }}$</span></p></div>
                                            <div class="col-6"><p class="textss">Email <br> <span>{{ $users->pEmail }}</span></p></div>
                                            <div class="col-6"><p class="textss">Номер Телефона: <br><span>{{ $users->pPnumber }}</span></p></div>
                                        </div>
                                    </div>

                                    <div id = "admin" class="users col-sm tabcontent">
                                        <div class="admin-login">
                                            <h3 class="text-center">Авторизация в A-PANEL</h3>

                                            <p>A-Password</p>
                                            <input type="password" id = "apassword" class = "apassword form-control">
                                            <button class="btn btn-primary" id = "admin-auth">Авторизация</button>
                                        </div>
                                    </div>

                                    <div id = "infostats" class="users biz col-sm tabcontent">
                                        <div class="row">
                                            <div class="col-sm"><p>Реферальный аккаунт:</p></div>
                                            <div class="col-sm"><span>{{ $users->pDrug }}</span></div></div>

                                        <div class="row">
                                            <div class="col-sm"><p>Организация (Ранг)</p></div>
                                            <div class="col-sm"><span>{{ $members }} / {{ $users->pRank }}</span></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm"><p>Подработка</p></div>
                                            <div class="col-sm"><span>{{$pJob}}</span></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm"><p>Уровень розыска:</p></div>
                                            <div class="col-sm"><span>{{ $users->pWantedLevel }}</span></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm"><p>Муж/Жена:</p></div>
                                            <div class="col-sm"><span>{{ $sex }}</span></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm"><p>Варны:</p></div>
                                            <div class="col-sm"><span>{{$users->pWarns}}</span></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm"><p>Материалов:</p></div>
                                            <div class="col-sm"><span>{{ number_format($users->pMats)}}</span></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm"><p>Наркотиков:</p></div>
                                            <div class="col-sm"><span>{{ number_format($users->pDrugs) }}</span></div>
                                        </div>
                                    </div>
                                    @if($businesses or $farms)
                                        @if($businesses)
                                            <div id = "biz"  class="users biz col-sm tabcontent">
                                                <h1 class = "text-center">Название: {{ $businesses->bName }}</h1>
                                                <div style = "padding-top:2.5rem">
                                                    <div class="row"><div class="col-sm"><p>Гос.стоимость:</p></div><div class="col-sm"><span>{{ number_format($businesses->bBuyPrice) }}</span></div></div>
                                                    <div class="row"><div class="col-sm"><p>Продуктов:</p></div><div class="col-sm"><span>{{ number_format($businesses->bProducts) }}</span></div></div>
                                                    <div class="row"><div class="col-sm"><p>На банковском счету:</p></div><div class="col-sm"><span>{{ number_format($businesses->bBank) }}</span></div></div>
                                                    <div class="row"><div class="col-sm"><p>На счету электроэнергии:</p></div><div class="col-sm"><span>{{ number_format($businesses->bLandTax) }}</span></div></div>
                                                    <div class="row"><div class="col-sm"><p>Состояние:</p></div><div class="col-sm"><span>@if($businesses->bLocked == 1)Закрыто@else()Открыто@endif</span></div></div>
                                                    <div class="row"><div class="col-sm"><p>Под контролем:</p></div><div class="col-sm"><span>{{ $businesses->bName }}</span></div></div>
                                                    <div class="row"><div class="col-sm"><p>Сообщение при входе:</p></div><div class="col-sm"> <span>{{ $businesses->bMessage }}</span></div></div>
                                                </div>
                                            </div>
                                        @elseif($farms)
                                            <div id = "biz"  class="users biz col-sm tabcontent">
                                                <h1 class = "text-center">Ферма N:{{ $farms->id }}</h1>

                                                <div style = "padding-top:2.5rem">
                                                    <div class="row"><div class="col-sm"><p>Продуктов: </p></div><div class="col-sm"><span>{{ number_format($farms->prods) }}</span></div></div>
                                                    <div class="row"><div class="col-sm"><p>На банковском счету:</p></div><div class="col-sm"><span>{{ number_format(($farms->bank))}}</span></div></div>
                                                    <div class="row"><div class="col-sm"><p>Зарплата сотрудникам</p></div><div class="col-sm"> <span>{{ number_format($farms->zp) }}</span></div></div>
                                                    <div class="row"><div class="col-sm"><p>На счету электроэнергии:</span></p></div><div class="col-sm"><span>{{ number_format($farms->landtax) }} </span></div></div>
                                                    <div class="row"><div class="col-sm"><p>Стоимость закупа зерна: </p></div><div class="col-sm"><span>{{ number_format($farms->grain_price) }}</span></div></div>
                                                    <div class="row"><div class="col-sm"><p>Зерна на складе: </p></div><div class="col-sm"><span>{{ number_format($farms->grain) }}</span></div></div>
                                                    <div class="row"><div class="col-sm"><p>Зерна засеяно: </p></div><div class="col-sm"><span>{{ number_format($farms->grain_sown) }}</span></div></div>
                                                </div>
                                            </div>
                                        @endif
                                    @endif

                                    @if($house)
                                        <div id = "house"  class="users biz col-sm tabcontent">
                                            <h1 class="text-center">Дом №{{ $house->hID }}</h1>
                                            <div style="padding-top:2.5rem">
                                                <div class="row">
                                                    <div class="col-sm"><p>Гос. стоимость</p></h1></div>
                                                    <div class="col-sm"><span>{{ $house->hValue }}</span></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm"><p>Состояние</p></div>
                                                    <div class="col-sm"><span>@if($house->hLock == 0) Закрыто @else  Открыто @endif</span></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm"><p>Класс дома </p></div>
                                                    <div class="col-sm"><span>{{$hKlass}}</span></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm"><p>Гараж</p></div>
                                                    <div class="col-sm"><span>@if($house->hGarageID == -1) Не имеется @else Имеется @endif</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if($cars)
                                        <div id = "cars" class="users biz col-sm tabcontent">
                                            <h1 class = "text-center">Личный транспорт</h1>

                                            <div class="row" style = "padding-top:2.5rem">
                                                @foreach($cars as $cared)
                                                    <div class="col-sm">
                                                        <img src="{{ asset('/img/vehicles/Vehicle_') }}{{$cared->vModel}}.jpg">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src = "{{ asset('/js/profile.js') }}"></script>
@endsection
