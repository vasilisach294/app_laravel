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
    </header>
<hr class="line">
    <div class="container-sm justfify-content-center mt-2">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Status</th>
                <th scope="col">Comment</th>
                <th scope="col">Owner</th>
                <th scope="col">Control</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <th scope="row">{{ $order->id }}</th>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->comment }}</td>
                        <td>{{ $order->owner->name }}</td>
                        <td>
                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                                <a href="{{ route('orders.show', $order->id) }}">
                                    <button type="button" class="btn btn-success">Show</button>
                                </a>
                                <a href="{{ route('orders.edit', $order->id) }}">
                                    <button type="button" class="btn btn-warning">Edit</button>
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>