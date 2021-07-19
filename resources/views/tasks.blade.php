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
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <td>ردیف</td>
                        <td>شناسه</td>
                        <td>دسته</td>
                        <td>توضیحات</td>
                        <td>اولویت</td>
                        <td>تاریخ</td>
                        <td>مهلت</td>
                        <td>معتلق به</td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>

                <body>

                    @php
                        $i = 0;
                    @endphp
                    @foreach ($sharedTasks as $sharedTask)
                        @php
                            $i++;
                        @endphp
                        <tr>
                            <td>
                                <div class="btn btn-warning">{{ $i }}</div>
                            </td>
                            <td>
                                <div class="btn btn-primary">{{ $sharedTask->id }}</div>
                            </td>
                            <td>
                                <div class="btn btn-primary">{{ $sharedTask->task->category->title }}</div>
                            </td>
                            <td>
                                <div class="btn btn-primary">{{ $sharedTask->task->description }}</div>
                            </td>
                            <td>
                                <div class="btn btn-primary">{{ $sharedTask->task->priority }}</div>
                            </td>
                            <td>
                                <div class="btn btn-primary">{{ $sharedTask->task->updated_at }}</div>
                            </td>
                            <td>
                                <div class="btn btn-primary">{{ $sharedTask->task->deadline }}</div>
                            </td>
                            <td>
                                <div class="btn btn-danger">{{ $sharedTask->task->user->name }}</div>
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforeach
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($tasks as $task)

                        @php
                            $i++;
                        @endphp
                        <tr>
                            <td>
                                <div class="btn btn-warning">{{ $i }}</div>
                            </td>
                            <td>
                                <div class="btn btn-primary">{{ $task->id }}</div>
                            </td>
                            <td>
                                <div class="btn btn-primary">{{ $task->category->title }}</div>
                            </td>
                            <td>
                                <div class="btn btn-primary">{{ $task->description }}</div>
                            </td>
                            <td>
                                <div class="btn btn-primary">{{ $task->priority }}</div>
                            </td>
                            <td>
                                <div class="btn btn-primary">{{ $task->updated_at }}</div>
                            </td>
                            <td>
                                <div class="btn btn-primary">{{ $task->deadline }}</div>
                            </td>
                            <td>
                                <div class="btn btn-primary">{{ $task->user->name }}</div>
                            </td>
                            <td><a href="{{ route('editTask', $task->id) }}" class="btn btn-warning">ویرایش</a></td>
                            <td><a href="{{ route('destroyTask', $task->id) }}" class="btn btn-danger"
                                    onclick="return confirm('وظیفه مورد نظر حذف شود؟');">حذف</a></td>

                            {{-- <td><a href="{{ route('edit', $category->id) }}" class="btn btn-warning">ویرایش</a></td>
                            <td><a href="{{ route('destroy', $category->id) }}" class="btn btn-danger"
                                    onclick="return confirm('آیتم مورد نظر حذف شود؟');">حذف</a></td> --}}

                        </tr>
                    @endforeach
                </body>
            </table>

        </div>
    </div>

</body>


</html>
