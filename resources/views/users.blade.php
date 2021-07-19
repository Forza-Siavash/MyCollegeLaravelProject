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

    <div class="container bg-light">

        @include('layouts.topmenu')
        <hr>
        <p class="h4 text-center">{{ $pageTitle }}</p>
        <hr>
        @include('layouts.messages')
        
        <div class="d-flex justify-content-center">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <td>شناسه</td>
                        <td> نام و نام خانوادگی</td>
                        <td>ایمیل</td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>

                <body>
                    @foreach ($users as $user)
                        <tr class="table-light">
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><a href="{{ route('editUser', $user->id) }}" class="btn btn-warning">ویرایش</a></td>
                            <td><a href="{{ route('destroyUser', $user->id) }}" class="btn btn-danger"
                                    onclick="return confirm('کاربر مورد نظر حذف شود؟');">حذف</a></td>

                        </tr>
                    @endforeach
                </body>
            </table>

        </div>
    </div>

</body>


</html>
