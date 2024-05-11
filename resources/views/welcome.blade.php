<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <title>Laravel</title>
    </head>
    <body>
                    <header>
                        <div class="logo">
                            <div class="logo-text">Cozy Room</div>
                            <img src="{{asset('images/pic1.png')}}" alt="" height="45px" width="50px">
                        </div>
                        @if (Route::has('login'))
                            <nav>
                                <a href="/" class="nav-item-active">Главная</div>
                                <a href="{{ route('products.store') }}" class="nav-item">Каталог</div>
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="nav-item">
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="nav-item"
                                    >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="nav-item">
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </header>
<hr class="line">
         <main>
              <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="margin-left: 100px; margin-right: 100px; padding-top:10px">
                <div class="carousel-inner" style="height: 384px;">
                  <div class="carousel-item active">
                    <img src="{{asset('images/pic3.jpg')}}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="{{asset('images/pic2.jpg')}}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="{{asset('images/pic1.jpg')}}" class="d-block w-100" alt="...">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"  data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Предыдущий</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"  data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Следующий</span>
                </button>
              </div>
              <div class="block-aboutus">
                <img src="{{asset('images/pic5.jpg')}}" alt="" height="550px" width="400px">
                <div class="block-text-aboutus">
                <div class="text-aboutus">Cozy Room — магазин товаров для жизни, полный красивых вещей. Мы собираем ассортимент из предметов домашнего декора, текстиля, посуды, косметики и многого другого. Чтобы окружающая обстановка и повседневный отдых каждого покупателя Cozy Room стали намного красивее.</div>
                <a href="{{ route('products.store') }}" class="text-aboutus">Перейти в каталог товаров</div>
                </div>
              </div>
        </main>           
    </body>
</html>
