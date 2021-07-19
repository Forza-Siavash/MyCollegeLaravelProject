<div style="padding-top:40px; text-align:right">
    
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <navbar class="navbar-expand-sm ">
                <ul class="navbar-nav">

                    @if (auth()->check())

                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="btn btn-warning">
                                خانه
                            </a>
                        </li>
                        <li class="nav-item" style="padding-right: 10px">
                            <a href="{{ route('tasks') }}" class="btn btn-warning">
                                وظایف
                            </a>
                        </li>
                        <li class="nav-item" style="padding-right: 10px">
                            <a href="{{ route('createTask') }}" class="btn btn-warning">
                                وظیفه جدید
                            </a>
                        </li>
                        @if (auth()->user()->admin == 1)
                            <li class="nav-item" style="padding-right: 10px">
                                <a href="{{ route('users') }}" class="btn btn-warning">
                                    کاربران
                                </a>
                            </li>
                            <li class="nav-item " style="padding-right: 10px">
                                <a href="{{ route('categories') }}" class="btn btn-warning">
                                    دسته بندی ها
                                </a>
                            </li>
                            <li class="nav-item" style="padding-right: 10px">
                                <a href="{{ route('create') }}" class="btn btn-success">
                                    دسته بندی جدید
                                </a>
                            </li>
                        @endif

                    @endif

                    @if (!auth()->check())
                        <li class="nav-item" style="padding-right: 10px">
                            <a href="{{ route('register') }}" class="btn btn-success">
                                ثبت نام </a>
                        </li>
                    @endif
                    @if (auth()->check())
                        <li class="nav-item" style="padding-right: 10px">
                            <div class="btn btn-light">
                                @if (auth()->user()->admin == 1)
                                    ادمین خوش آمدید
                                @else
                                    {{ auth()->user()->name }} جان خوش آمدید
                                @endif
                            </div>
                        </li>
                    @else
                        <li class="nav-item" style="padding-right: 10px">
                            <a href="{{ route('login') }}" class="btn btn-light">
                                ورود </a>
                        </li>
                    @endif

                    @auth
                        <li>
                            <form style="padding-right: 10px" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="btn btn-danger" type="submit">خروج</button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </navbar>
        </div>
    </nav>
</div>
