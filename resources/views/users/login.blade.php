<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8"/><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LRBUMS</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
    <link href="{!! asset('public/assets/css/icons/icomoon/styles.css') !!}" rel="stylesheet" type="text/css">
    <link href="{!! asset('public/assets/css/bootstrap.css') !!}" rel="stylesheet" type="text/css">
    <link href="{!! asset('public/assets/css/core.css') !!}" rel="stylesheet" type="text/css">
    <link href="{!! asset('public/assets/css/components.css') !!}" rel="stylesheet" type="text/css">
    <link href="{!! asset('public/assets/css/colors.css') !!}" rel="stylesheet" type="text/css">
{{--<link href="{!! asset('assets/css/icons.css') !!}" rel="stylesheet" type="text/css">--}}
<!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="{!! asset('public/assets/js/plugins/loaders/pace.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('public/assets/js/core/libraries/jquery.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('public/assets/js/core/libraries/bootstrap.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('public/assets/js/plugins/loaders/blockui.min.js') !!}"></script>
    <!-- /core JS files -->


    <style type="text/css">

        .logo {
            color: #ffffff !important;
            font-size: 20px;
            font-weight: 700;
            letter-spacing: .05em;
            line-height: 20px;
            text-transform: uppercase;
        }

        .logo i {
            color: #5fbeaa;
        }

    </style>

    <!-- Theme JS files -->
    <script type="text/javascript" src="{!! asset('assets/js/core/app.js') !!}"></script>
    <!-- /theme JS files -->

</head>

<body class="login-container">

<!-- Main navbar -->
<div class="navbar navbar-inverse">
    <div class="navbar-header" style="width: 100%;">
        {{--<a class="navbar-brand" href="index-2.html"><img src="{!! asset('assets/images/logo_light.png') !!}" alt=""></a>--}}

        <a href="{{ URL::to('/') }}" class="navbar-brand logo"
           style="width: 100%; font-size: 17px; pointer-events: none; cursor: default;">
            {{--<i class="icon-adjust icon-c-logo">
            </i>--}}<span class="text-capitalize">Baluchistan <span style="font-weight: normal; font-style: italic">LRBUMS</span></span></a>

        {{--<ul class="nav navbar-nav pull-right visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
        </ul>--}}
    </div>

    {{--<div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="#">
                    <i class="icon-display4"></i> <span class="visible-xs-inline-block position-right"> Go to website</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="icon-user-tie"></i> <span class="visible-xs-inline-block position-right"> Contact admin</span>
                </a>
            </li>

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-cog3"></i>
                    <span class="visible-xs-inline-block position-right"> Options</span>
                </a>
            </li>
        </ul>
    </div>--}}
</div>
<!-- /main navbar -->


<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">


        <!-- Main content -->
        <div class="content-wrapper">


            <!-- Content area -->
            <div class="content">


                <!-- Simple login form -->
                {{-- <form id="login-form" class="login-form" onsubmit="return check_form()" method="post" action="{{ route('user.authenticate')}}" accept-charset="UTF-8">--}}
                {!! Form::open(['class' => 'login-form', 'method' => 'post', 'route' => 'user.authenticate']) !!}
                {{--<input name="_token" type="hidden" value="{{ csrf_token() }}"/>--}}
                <div class="panel panel-body login-form">
                    <div class="text-left">

                        @if(Session::has('error'))
                            <div class="alert bg-danger alert-styled-left">
                                <button type="button" class="close" data-dismiss="alert"><span>×</span><span
                                            class="sr-only">Close</span></button>
                                <span class="text-semibold">Error! </span> {{ Session::get('error') }}{{--<a href="#" class="alert-link"> try submitting again</a>--}}
                            </div>
                        @endif

                        @if(Session::has('warning'))
                                <div class="alert bg-warning alert-styled-left">
                                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span
                                                class="sr-only">Close</span></button>
                                    <span class="text-semibold">Warning! </span> {{ Session::get('warning') }}{{--<a href="#" class="alert-link"> try submitting again</a>--}}
                                </div>
                        @endif

                        @if(Session::has('success'))
                            <div class="alert bg-danger alert-styled-left">
                                <button type="button" class="close" data-dismiss="alert"><span>×</span><span
                                            class="sr-only">Close</span></button>
                                <span class="text-semibold">Success! </span> {{ Session::get('success') }}{{--<a href="#" class="alert-link"> try submitting again</a>--}}
                            </div>
                        @endif

                        {{--@if ($error = $errors->first('password'))
                            <div class="alert alert-danger no-border">
                                <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                                <span class="text-semibold">Error!</span> {{ $error }}--}}{{--<a href="#" class="alert-link"> try submitting again</a>--}}{{--.
                            </div>
                        @endif

                        @if($error = $errors->first('username'))
                            <div class="alert alert-danger no-border">
                                <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                                <span class="text-semibold">Error!</span> {{ $error }}--}}{{--<a href="#" class="alert-link"> try submitting again</a>--}}{{--.
                            </div>
                        @endif--}}


                        {{--<div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>--}}
                        <div>
                            <img style="display: block; margin-left: auto; margin-right: auto"
                                 src="{!! asset('public/assets/images/extras/app_logo_white.png') !!}" height="90"
                                 align="middle" width="90">
                        </div>
                        <h5 class="content-group text-center">Login to your account
                            <small class="display-block">Enter your credentials below</small>
                        </h5>
                    </div>

                    <div class="form-group has-feedback has-feedback-left{{ $errors->has('username') ? ' has-error' : '' }}">
                        {{--<input type="text" name="username" class="form-control" placeholder="Username" value="{{ old('username')}}">--}}
                        {!! Form::text('username', old('username'),['class' => 'form-control', 'placeholder' => 'Username']) !!}
                        <div class="form-control-feedback">
                            <i class="icon-user text-muted"></i>
                        </div>
                        <span class="help-block">{{ $errors->first('username') }}</span>
                    </div>

                    <div class="form-group has-feedback has-feedback-left{{ $errors->has('password') ? ' has-error' : '' }}">
                        {{--<input type="password" name="password" class="form-control" placeholder="Password" value="{{ old('password')}}">--}}
                        {!! Form::password('password',[ 'class' => 'form-control', 'placeholder' => 'Password']) !!}
                        <div class="form-control-feedback">
                            <i class="icon-lock2 text-muted"></i>
                        </div>
                        <span class="help-block">{{ $errors->first('password') }}</span>

                    </div>

                    <div class="form-group">
                        {!! Form::button('Sign in <i class="icon-circle-right2 position-right"></i>', ['class'=> 'btn btn-primary btn-block', 'type' => 'submit']) !!}
                        {{--<button type="submit" class="btn btn-primary btn-block">Sign in <i
                                    class="icon-circle-right2 position-right"></i></button>--}}
                    </div>

                    <div class="text-center hidden">
                        <a href="login_password_recover.html">Forgot password?</a>
                    </div>
                </div>
                {!! Form::close() !!}
                {{--</form>--}}
            <!-- /simple login form -->


                <!-- Footer -->
                {{--<div class="footer text-muted text-center">
                    &copy; {{ \Carbon\Carbon::today()->format('Y') }}. <a href="{{ url('/') }}">KP Inspector</a> by <a href="http://pmru.gkp.pk" target="_blank">Performance Management & Reforms Unit</a>
                </div>--}}
                <div class="footer text-muted text-center">
                    &copy; {{ \Carbon\Carbon::today()->format('Y') }}. <a href="#" target="_blank">Deputy Commissioner Officer Quetta</a>
                </div>
                <!-- /footer -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->

</body>


</html>
