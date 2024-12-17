<nav class="site-nav">
    <div class="container">
        <div class="site-navigation">
            <a href="{{url('/')}}" class="logo m-0">Hoang Viet Tour <span class="text-primary">.</span></a>

            <ul class="js-clone-nav d-none d-lg-inline-block text-left site-menu float-right">
                <li class="active"><a href="{{url('/')}}">Trang chủ</a></li>
                <li class="has-children">
                    <a href="#">Địa điểm</a>
                    <ul class="dropdown">
                        @foreach($categories as $c)
                            <li><a href="{{url('categoryTour', $c->category_id)}}">{{$c->category_name}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="has-children">
                    <a href="#">Tour của tôi</a>
                    <ul class="dropdown">
                            <li><a href="{{url('unpaid')}}">Chưa thanh toán</a></li>
                            <li><a href="{{url('paid')}}">Đã thanh toán</a></li>
                    </ul>
                </li>
                <li><a href="{{url('newsPage')}}">Tin tức</a></li>
                @if(auth()->check())
                    <li class="has-children">
                        <a href="#">{{auth()->user()->name}}</a>
                        <ul class="dropdown">
                            <li><a href="{{url('/logout')}}">Logout</a></li>
                        </ul>
                    </li>
                @else
                    <li><a href="{{url('/login')}}">Đăng nhập</a></li>
                @endif
            </ul>

            <a href="#"
                class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none light"
                data-toggle="collapse" data-target="#main-navbar">
                <span></span>
            </a>

        </div>
    </div>
</nav>