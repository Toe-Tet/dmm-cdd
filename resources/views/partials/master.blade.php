<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

@yield('title')

@include('partials.head')

<body class="fixed-nav sticky-footer" id="page-top" style="">
<!-- Navigation-->

@include('partials.nav')

<div class="content-wrapper" style="background-color: #F2F4F7 !important;">
    <div class="container-fluid">

        <div class="container">
            @if(isset($errormsg))
                <div class="alert alert-danger">
                    {!! $errormsg !!}
                </div>
            @elseif(isset($successmsg))
                <div class="alert alert-success">
                    {!! $successmsg !!}
                </div>
            @endif
        </div>

        @include('partials.alerts')

        @yield('content')

    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                {{--<small>Copyright © Aung Si</small>--}}
                <small>Copyright &copy; Uninet. All Rights Reserved. Create by Uninet</small>
            </div>
        </div>
    </footer>

    @include('partials.scripts')

    @include('sweetalert::alert')

    @stack('script')
</div>
</body>

</html>
