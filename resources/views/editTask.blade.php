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


        <form action="{{ route('updateTask', $task->id) }}" method="POST">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="description">توضیحات</label>
                <input type="text" class="form-control" name="description" value="{{ $task->description }}">
            </div>
            <div class="form-group">
                <label for="priority">اولویت</label>
                <input type="text" class="form-control" name="priority" value="{{ $task->priority }}">
            </div>
            <br>
            <div class="form-group">
                <label for="title">دسته بندی</label>
                <select name="category_id">
                    @foreach ($categories as $category)
                        @if ($task->category->id == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->id }}:
                                {{ $category->title }}</option>

                        @else
                            <option value="{{ $category->id }}">{{ $category->id }}: {{ $category->title }}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="deadline">مهلت:</label>
                <input type="date" name="deadline" value="{{ $task->deadline }}">
            </div>
            <br>
            <div class="form-group">
                <label for="users_id">شناسه های کاربرای که میخواهید به آنان دسترسی بدهید را وارد کنید (20 - 80 -
                    ...)</label>
                <input type="text" class="form-control" name="users_id" value="@foreach ($users_id as $item){{ $item }} @endforeach">
            </div>
            <br>
            <div class=" form-group row">
                <label for="title"></label>
                <button type="submit" class="btn btn-success">ویرایش</button>
            </div>

        </form>

    </div>

</body>


</html>
