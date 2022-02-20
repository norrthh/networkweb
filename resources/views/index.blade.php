<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Network Role Play || Главная</title>

    <link href="{{ asset('css/main-header-menu.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body style = "background-image:url(/img/about.jpg); background-size: cover">
    @include('modules.header')
    <section>
        <div class="container">
            <center style = "margin-top: 30vh;">
                <h1>Выбери свою роль и начни играть уже сейчас!</H1>
                <!-- <button  class = "download">Присоединиться</button> -->
                <a class="download" style = "margin-top: 2rem;display: block;width: 300px;" href="#first-link">Присоединиться</a>
            </center>
        </div>
    </section>


    <section class = "howtostartsection">
        <div><a name="first-link"></a><div>
        <div class="container">
            <h4 class="text-center"><b>Как начать играть?</b></h4>
            <hr>
            <div class="row AHAHASHD">
                <div class="col-sm">
                    <div class="number-text">
                        <div class="number">1</div>
                        <p>Скачайте и установите GTA SA</p>
                    </div>
                    <p>Для того что бы играть на нашем проекте Houston RP невозможно обойтись без легендарной игры Grand Theft Auto: San-Andreas. Скачайте игру без каких либо дополнений или модификаций</p>
                </div>
                <div class="col-sm">
                    <div class="number-text">
                        <div class="number">2</div>
                        <p>Скачайте и установите SA-MP</p>
                    </div>
                    <p>Как только инсталляция Grand Theft Auto: San-Andreas завершилась,нужно установить особый лаунчер SA-MP. Скачать подходящую версию вы можете на нашем сайте. После чего понадобится указать папку с GTA</p>
                </div>
                <div class="col-sm">
                    <div class="number-text">
                        <div class="number">3</div>
                        <p>Запустите лаунчер SA-MP</p>
                    </div>
                    <p>Запустите лаунчер SA-MP и добавьnt один из наших серверов в избранное для быстрого доступа. Введите свой никнейм в специальное поле в формате Имя_Фамилия (North_Hemingway) и начинайте играть!</p>
                </div>
            </div>
        </div>
    </section>

    <section class = "social_block">
        <div class="container">
            <h4 class="text-center">Мы в социальных сетях</h4>
            <hr>
            <div class="row">
                <div class="col-sm">
                    <div class="vked">
                        <div class="row">
                            <div class="col-3">
                                <img src="/img/vk.png">
                            </div>
                            <div class="col-sm">
                                <p>VK Официальное сообщество</p>
                                <a href="https://vk.com/houstonsamp" class="vk">Перейти</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm">
                    <div class="dis">
                        <div class="row">
                            <div class="col-3">
                                <img src="/img/Discord.png">
                            </div>
                            <div class="col-sm">
                                <p>Наш Discord канал</p>
                                <a href="https://discord.gg/fUbkqjsG" class="ds">Перейти</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm">
                    <div class="vked">
                        <div class="row">
                            <div class="col-3">
                                <img src="/img/vk.png">
                            </div>
                            <div class="col-sm">
                                <p>VK Мастерская проекта</p>
                                <a href="https://vk.com/workshophouston" class="vk">Перейти</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-sm">
                    <div class="row">
                        <div class="col-sm">
                            <div class="imgvk"></div>
                        </div>
                        <div class="col-sm">
                            <p>VK Мастерская проекта</p>
                            <a href="https://vk.com/workshophouston" class="vk">Перейти</a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>

    @include('modules.footer')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src = "{{ asset('js/main-header-menu.js') }}"></script>
    <script src = "{{ asset('js/main.js') }}"></script>

</body>
</html>
