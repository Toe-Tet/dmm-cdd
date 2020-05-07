<nav class="navbar navbar-expand-lg navbar-dark fixed-top admin-navbar" id="mainNav">
    <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown" align="left">
    <a class="nav-link pro text-white" style="margin-left: 250px;" href="#" >CDD Record Keeping System
    </a>
    </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion" style="font-size: 14px; margin-top: 0px; ">
            <li class="nav-item"
                data-toggle="tooltip" data-placement="right" title="Tables" style="border-bottom: 1px solid #f5f5f5;">
                <a class="nav-link text-center" href=""><img src="{{ asset('/assets/images/logo.png') }}" class="py-3" style="width: 100px;" alt="">{{--  Aung Si <span
                class="title">( China - Myanmar Express & Alibaba Agent )</span> --}}</a>
            </li>
            <li class="nav-item"
                data-toggle="tooltip" data-placement="right" title="Tables">
                <a class="nav-link pro_semi_light @if(strpos(Route::getFacadeRoot()->current()->uri(),'/dashboard') !== false) active-nav @else nav-link-text @endif"
                   href="{{ route('dashboard.index') }}">
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item"
                data-toggle="tooltip" data-placement="right" title="Tables">
                <a class="nav-link pro_semi_light @if(strpos(Route::getFacadeRoot()->current()->uri(),'/cdd') !== false) active-nav @else nav-link-text @endif"
                   href="{{ route('cdd.index') }}">
                    <span>CDD</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            {{--<li class="nav-item" style="margin-right: 20px;">--}}
            {{--@if(\Illuminate\Support\Facades\Redis::exists('maintenance'))--}}
            {{--<a class="btn btn-danger" style="margin-right: 10px;" href="{{ route('server.on') }}">--}}
            {{--Server Off--}}
            {{--</a>--}}
            {{--@else--}}
            {{--<a class="btn btn-primary" style="margin-right: 10px;" href="{{ route('server.off') }}">--}}
            {{--Server On--}}
            {{--</a>--}}
            {{--@endif--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
            {{--<a class="btn btn-success" style="margin-right: 10px;" href="{{ route('cache.clear') }}">--}}
            {{--Cache Refresh--}}
            {{--</a>--}}
            {{--</li>--}}
            <li class="nav-item">
                <form id="logout-form" action="{{ route('logout') }}"
                      method="POST" style="display: none;">
                    @csrf
                </form>

                <a class="nav-link nav-link-logout" data-toggle="modal" href="#"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-fw fa-sign-out"></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>
