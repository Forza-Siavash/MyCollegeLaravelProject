</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
        .row.content {
            height: 1500px
        }

        /* Set gray background color and 100% height */
        .sidenav {
            background-color: #f1f1f1;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }

            .row.content {
                height: auto;
            }
        }

    </style>
</head>

<body dir="rtl" style="text-align: right; background-color: whitesmoke">


    <div class="container-fluid">
        <div class="row content ">

            <div class="col-sm-10">
                <hr>
                <h2>راهنما</h2>
                <h4>
                    در منوی سمت راست میتوانید وظایف خود را اضافه کنید و در صورت امکان آن ها را با دوستانتان به اشتراک بگذارید
                </h4>
                <br><br>
                <hr>
                <h2>کاربران</h2>
                <h4>
                    کاربران دو دسته هستنند، ادمین و کابران معمولی. ادمین ها دسترسی به جداول دسته بندی و کاربران و تعریف
                    و ویرایش آن ها دارند
                </h4>
                <br><br>

                <hr>
                <h2>امکانات</h2>
                <h4>
                    امکان ثبت کارهای مورد نظر
                </h4>
                <h4>
                    امکان ثبت دسته بندی برای کار خود
                </h4>
                <h4>
                    امکان ثبت زمان و تاریخ برای کار خود
                </h4>
                <h4>
                    امکان اولویت بندی کارها
                </h4>
                <h4>
                    امکان دعوت دوستان به لیست کار های خود 
                </h4>
                <br><br>

            </div>
            <div class="col-sm-2 sidenav">
                <h4>خانه</h4>
                <ul class="nav nav-pills nav-stacked">
                    @if (auth()->check())

                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="btn btn-primary">
                                خانه
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('tasks') }}" class="btn btn-primary">
                                وظایف
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('createTask') }}" class="btn btn-primary">
                                وظیفه جدید
                            </a>
                        </li>
                        @if (auth()->user()->admin == 1)
                            <li class="nav-item">
                                <a href="{{ route('users') }}" class="btn btn-primary">
                                    کاربران
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('categories') }}" class="btn btn-primary">
                                    دسته بندی ها
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('create') }}" class="btn btn-success">
                                    دسته بندی جدید
                                </a>
                            </li>
                        @endif

                    @endif

                    @if (!auth()->check())
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="btn btn-success">
                                ثبت نام </a>
                        </li>
                    @endif
                    @if (auth()->check())
                        <li class="nav-item">
                            <div class="btn btn-light">
                                @if (auth()->user()->admin == 1)
                                    ادمین خوش آمدید
                                @else
                                    {{ auth()->user()->name }} جان خوش آمدید
                                @endif
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="btn btn-light">
                                ورود </a>
                        </li>
                    @endif

                    @auth
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="btn btn-danger" type="submit">خروج</button>
                            </form>
                        </li>
                    @endauth
            </div>

        </div>
    </div>

    <footer class="container-fluid">
        <p>Footer Text</p>
    </footer>

</body>

</html>
