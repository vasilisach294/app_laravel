<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    </header>
<hr class="line">
<main>
    <div class="block-products">
        <form action="{{ route('products.store') }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Название продукта</label>
        <input type="text" placeholder='Название' name="name" class="form-control">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Название продукта</label>
        <input type="text" placeholder='Описание' name="description" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Создать</button>
    </form>
    </div>
</main>
</body>
</html>