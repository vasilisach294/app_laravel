<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <header>
        <div class="logo">
            <div class="logo-text">Cozy Room</div>
            <img src="{{asset('images/pic1.png')}}" alt="" height="45px" width="50px">
        </div>
        @if (Route::has('login'))
            <nav>
                <a href="/" class="nav-item">Главная</div>
                <a href="{{ route('products.store') }}" class="nav-item-active">Каталог</div>
                @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="nav-item">
                        Личный кабинет
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="nav-item"
                    >
                        Вход
                    </a>

                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="nav-item">
                            Регистрация
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>
<hr class="line">
    <div class="container-sm justfify-content-center mt-2">
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Product</th>
                    <th scope="col">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user->cart as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td>
                                <input value="{{ $item->pivot->amount }}" name="products[{{ $item->id }}][amount]">
                            </td>   
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <input hidden value="1" name="user_id">
            <input hidden value="0" name="status_id"> 
            <button type="submit" class="btn btn-primary">Оформить заказ</button>
        </form>
    </div>
</body>
</html>