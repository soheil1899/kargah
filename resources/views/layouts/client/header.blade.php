<nav class="navbar navbar-expand-lg navbar-light border-bottom py-4">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="/">صفحه اصلی</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('workshop')}}">کارگاه های آموزشی</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('show.gallery')}}">گالری تصاویر</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('about')}}">درباره ما</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('contact')}}">تماس با ما</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <ul class="navbar-nav ml-auto pl-5">

                @auth()
                    <li class="nav-item mr-0">
                        @if(auth()->user()->id > 4 )
                            <a class="nav-link" href="{{route('account')}}">حساب کاربری</a>
                        @else
                            <a class="nav-link" href="{{route('admin')}}">پنل مدیریت</a>
                        @endif
                    </li>
                    <li class="nav-item mr-0">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-myform').submit();">
                            خروج
                        </a>
                    </li>
                @else
                    <li class="nav-item mr-0">
                        <a class="nav-link" href="{{route('login')}}">ورود</a>
                    </li>
                    <li class="nav-item mr-0">
                        <a class="nav-link" href="{{route('register')}}">ثبت نام</a>
                    </li>
                @endauth
            </ul>


        </form>

        <form id="logout-myform" class="d-none" action="{{ route('logout') }}" method="POST">
            @csrf
        </form>
    </div>
</nav>
