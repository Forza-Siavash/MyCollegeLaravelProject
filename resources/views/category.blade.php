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

<body dir="rtl" style="text-align: right; background-color: whitesmoke">

    <div class="container">

        @include('layouts.topmenu')


        <div class="d-flex justify-content-center">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                    </tr>
                </thead>

                <body>
                    <tr class="table-light">
                        <td>
                            <div class="btn btn-primary">
                                شناسه
                            </div>
                            <div class="btn btn-warning">
                                {{ $category->id }}
                            </div>
                        </td>
                    </tr>
                    <tr class="table-light">
                        <td>
                            <div class="btn btn-primary">
                                عنوان
                            </div>
                            <div class="btn btn-warning">
                                {{ $category->title }}
                            </div>
                        </td>
                    </tr>
                    <tr class="table-light">
                        <td>
                            <div class="btn btn-primary">
                                توضیحات
                            </div>
                            <div class="btn btn-warning">
                                {{ $category->description }}
                            </div>
                        </td>
                    </tr>
                </body>
            </table>

        </div>
    </div>

</body>


</html>
