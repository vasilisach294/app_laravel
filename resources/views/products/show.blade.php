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
    <form action="{{ route('products.index') }}" style="padding-left: 100px; padding-top:10px">
        <button class="btn1">Назад</button>
    </form>
    <div class="product-main">
        <div class="square"></div>
        <div class="product">
            <div class="product-title">{{ $product->name }}</div>
            <div class="product-desc">{{ $product->description }}</div>
            <a href="{{ route('products.edit', $product->id) }}">
                <button class="btn btn-warning">Edit</button>
            </a>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</main>
    {{-- <tr>
        <th scope="row">{{ $product->id }}</th>
        <td>{{ $product->name }}</td>
        <td>{{ $product->description }}</td>
        <td>
            <a href="{{ route('products.edit', $product->id) }}">
                <button class="btn btn-warning">Edit</button>
            </a>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr> --}}
</body>
</html>