<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<title>CDD Record Keeping System</title>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS-->
    <link href="{{ asset('/assets/template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

<script src="{{ asset('/assets/template/vendor/bootstrap/js/bootstrap.js') }}"></script>

<!-- Custom fonts for this template-->
    {{--<link href="/assets/template/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">--}}
    <link href='https://fonts.googleapis.com/css?family=Actor' rel='stylesheet'>
    <!-- Custom styles for this template-->
    {{--<link href="/assets/template/css/sb-admin.css" rel="stylesheet">--}}

    {{-- Custome CSS --}}
    <link rel="stylesheet" href="{{ asset('/assets/template/css/mystyle.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/libs/toastr/toastr.min.css') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('/assets/images/favicon.png') }}"/>
    <script src="{{ asset('/assets/template/vendor/jquery/jquery.min.js') }}" type="text/javascript"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}

    <style>
        .login-page {
            width: 360px;
            padding: 5% 0 0;
            margin: auto;
        }
        .form {
            position: relative;
            z-index: 1;
            background: #FFFFFF;
            max-width: 360px;
            margin: 0 auto 100px;
            padding: 45px;
            text-align: center;
            /*box-shadow: 0px 1px 5px 0px #ced1d4;*/
        }
        .form .input {
            /*font-family: "Roboto", sans-serif;*/
            outline: 0;
            background: #f2f2f2;
            width: 100%;
            border: 0;
            margin: 15px 0 0;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;
        }
        .form button {
            /*font-family: "Roboto", sans-serif;*/
            text-transform: uppercase;
            outline: 0;
            background: #235EA4;
            width: 100%;
            border: 0;
            padding: 15px;
            margin: 15px 0 0;
            color: #FFFFFF;
            font-size: 14px;
            -webkit-transition: all 0.3 ease;
            transition: all 0.3 ease;
            cursor: pointer;
        }
        .form button:hover,.form button:active,.form button:focus {
            background: #2467b5;
        }
        .form .message {
            margin: 15px 0 0;
            color: #b3b3b3;
            font-size: 12px;
        }
        .form .message a {
            color: #4CAF50;
            text-decoration: none;
        }
        .form .register-form {
            display: none;
        }
        .container {
            position: relative;
            z-index: 1;
            max-width: 300px;
            margin: 0 auto;
        }
        .container:before, .container:after {
            content: "";
            display: block;
            clear: both;
        }
        .container .info {
            margin: 50px auto;
            text-align: center;
        }
        .container .info h1 {
            margin: 0 0 15px;
            padding: 0;
            font-size: 36px;
            font-weight: 300;
            color: #1a1a1a;
        }
        .container .info span {
            color: #4d4d4d;
            font-size: 12px;
        }
        .container .info span a {
            color: #000000;
            text-decoration: none;
        }
        .container .info span .fa {
            color: #EF3B3A;
        }
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
        body {
            background: white; /* fallback for old browsers */

            font-family: "Roboto", sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
    </style>

</head>

<body class="">

<div class="login-page">
    <img src="{{ asset('/assets/images/logo.png') }}" class="center" style="padding-bottom: 20px; width: 160px" alt="">
    <div class="form" style="padding-top: 10px;">
        <table width="100%" style="margin-bottom: 10px;">
            <tr>
                <td align="center">
                    <h6 style="line-height: 24px;" class="pro_semi_light" id="login-title">CDD Record <br>Keeping System</h6>
                    {{-- <h5 style=" color: #963b00;">Aung Si</h5> --}}
                </td>
                <td align="right" {{-- style="border-left: 1px solid lightgray;" --}}>
                    {{-- <h6 style="color: gray" id="login-title">Staff Login</h6> --}}
                </td>
            </tr>
        </table>

{{--         <form class="register-form" action="{{ route('login.post') }}" style="padding-bottom: 35px;" method="POST">
            @csrf
            <input class="input" type="email" value="{{ old('email') }}"  name="email" placeholder="email address"/>
            <input class="input" type="password" name="password" placeholder="password"/>
            <button type="submit">Login</button>
            <div style="position: absolute; left: 10%;">
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} style="margin-top: 30px;"> {{ __('Remember Me') }}
            </div>
            <div style="position: absolute; right: 10%;">
                <p class="message" style="margin-top: 30px;"><a href="#" style="color: #894200;">Admin Login</a></p>
            </div>
            <p class="message">Already registered? <a href="#">Sign In</a></p>
        </form> --}}
        <form class="login-form" action="{{ route('login.post') }}" method="POST" style="padding-bottom: 35px;">
            @csrf
            <input class="input" type="text" name="email" value="{{ old('email') }}" placeholder="email address"/>
            <span style="font-size: 12px; font-weight: bold;" class="text-danger"><i>{{ $errors->first('email') }}</i></span>
            <input class="input" type="password" name="password" placeholder="password"/>
            <button type="submit">login</button>
            {{--<div class="row">--}}
            {{--<div class="col-md-6">--}}
            {{--<div class="checkbox" style="margin-top: 20px;">--}}
            {{--<label>--}}
            {{-- <div style="position: absolute; left: 10%;">
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} style="margin-top: 30px;"> {{ __('Remember Me') }}
            </div> --}}
            {{-- <div style="position: absolute; right: 10%;">
                <p class="message" style="margin-top: 30px;"><a href="#" style="color: #894200;">Staff Login</a></p>
            </div> --}}
            {{--</label>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-6">--}}
            {{--<a class="btn btn-link" style="margin-top: 13px;" href="#">--}}
            {{--{{ __('Forgot Your Password?') }}--}}
            {{--</a>--}}
            {{--</div>--}}
            {{--</div>--}}

        </form>
    </div>
</div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    {{--<footer class="sticky-footer" style="width: 100%;">--}}
        {{--<div class="container">--}}
            {{--<div class="text-center">--}}
                {{--<small>Copyright © Your Website 2018</small>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</footer>--}}
    <script>
        $('.message a').click(function(){
            $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
            if($("#login-title").html() == "Staff Login"){
                $('#login-title').html("Admin Login");
            } else {
                $('#login-title').html("Staff Login");
            }
        });

    </script>
    <script src="{{ asset('/assets/libs/toastr/toastr.min.js') }}"></script>
    {!! Toastr::message() !!}

</body>

</html>
