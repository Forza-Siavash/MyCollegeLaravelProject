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
                        <td>عنوان</td>
                        <td>توضیحات</td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>

                <body>
                    @foreach ($categories as $category)
                        <tr class="table-light">
                            <td>{{ $category->id }}</td>
                            <td><a href="{{ route('show', $category->id) }}"
                                    class="btn btn-primary">{{ $category->title }}</a></td>
                            <td>{{ $category->description }}</td>
                            <td><a href="{{ route('edit', $category->id) }}" class="btn btn-warning">ویرایش</a></td>
                            <td><a href="{{ route('destroy', $category->id) }}" class="btn btn-danger"
                                    onclick="return confirm('آیتم مورد نظر حذف شود؟');">حذف</a></td>

                        </tr>
                    @endforeach
                </body>
            </table>

        </div>
    </div>

</body>


</html>
