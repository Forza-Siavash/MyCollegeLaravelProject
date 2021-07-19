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

    <div class="container  bg-light">
        
        @include('layouts.topmenu')
        <hr>
        <p class="h4 text-center">ثبت نام</p>
        <hr>
        @include('layouts.messages')
        
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">نام و نام خوانوادگی</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{old('name')}}">
                @error('name')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
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
                <label for="title">تکرار رمز عبور</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                    name="password_confirmation">
                @error('password_confirmation')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <br>
            <div class="form-group row">
                <label for="title"></label>
                <button type="submit" class="btn btn-success">ثبت نام</button>
            </div>
        </form>

    </div>

</body>


</html>
