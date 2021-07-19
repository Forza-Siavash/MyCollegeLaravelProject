<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>{{ $pageTitle }}</title>

</head>

<body dir="rtl" style="text-align: right; background-color: gainsboro">

    <div class="container  bg-light">
        @include('layouts.topmenu')
        <hr>
        <p class="h4 text-center">{{ $pageTitle }}</p>
        <hr>
        @include('layouts.messages')



        <form action="{{ route('updateUser', $user->id) }}" method="POST">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="name">نام و نام خانوادگی</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ $user->name }}">
            </div>

            <div class="form-group">
                <label for="email">ایمیل</label>
                <input type="email" class="form-control" name="email" value="{{ $user->email }}">
            </div>
            <br>
            <div class="form-group row">
                <label for="title"></label>
                <button type="submit" class="btn btn-success">ویرایش</button>
            </div>

        </form>

    </div>

</body>


</html>
