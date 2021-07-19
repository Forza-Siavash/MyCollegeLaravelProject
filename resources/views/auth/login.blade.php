<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>ثبت نام</title>

</head>

<body dir="rtl" style="text-align: right; background-color: gainsboro">

    <div class="container bg-light">
        
        @include('layouts.topmenu')
        <hr>
        <p class="h4 text-center">ورود</p>
        <hr>
        @include('layouts.messages')

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">ایمیل</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{old('email')}}">
                @error('email')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="title">رمز عبور</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                @error('password')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="title">مرا به خاطر بسپار</label>
                <input type="checkbox" class="form-check-input" name="remember ">
            </div>
            <br>
            <div class="form-group row">
                <label for="title"></label>
                <button type="submit" class="btn btn-success">ورود</button>
            </div>
        </form>

    </div>

</body>


</html>
