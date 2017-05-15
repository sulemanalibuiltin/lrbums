<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
    <link href="{!! asset('public/assets/css/icons/icomoon/styles.css') !!}" rel="stylesheet" type="text/css">
    <link href="{!! asset('public/assets/css/icons/fontawesome/styles.min.css') !!}" rel="stylesheet" type="text/css">
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

    <!-- Theme JS files -->
    <script type="text/javascript"
            src="{!! asset('public/assets/js/plugins/tables/datatables/datatables.min.js') !!}"></script>
    <script type="text/javascript"
            src="{!! asset('public/assets/js/plugins/tables/datatables/extensions/responsive.min.js') !!}"></script>

    <script type="text/javascript"
            src="{!! asset('public/assets/js/plugins/forms/styling/uniform.min.js') !!}"></script>

    <script type="text/javascript" src="{!! asset('public/assets/js/core/app.js') !!}"></script>

    <script type="text/javascript"
            src="{!! asset('public/assets/js/plugins/notifications/pnotify.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('public/assets/js/plugins/notifications/noty.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('public/assets/js/plugins/notifications/jgrowl.min.js') !!}"></script>




    <script type="text/javascript">
        function show() {
            return "Hello";
        }
    </script>


@stack('scripts')
<!-- /theme JS files -->




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

</head>

<body>

{{--<!-- Main navbar -->
<div class="navbar navbar-inverse" style="text-align: left;">
    <div class="navbar-header" style="width: 260px;">

        <a href="{{ URL::to('/') }}" class="navbar-brand logo"  style="font-size: 17px; pointer-events: none; cursor: default;">
            --}}{{--<i class="icon-adjust icon-c-logo">
            </i>--}}{{--<span class="text-capitalize">District <i class="icon-graph"></i> ADP</span></a>


        <ul class="nav navbar-nav visible-xs-block">
            --}}{{--<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>--}}{{--
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>

        </ul>
    </div>

    --}}{{--<div class="nav navbar-nav">
        <a href="{{ URL::to('/') }}" class="logo">
            <span>KP<i class="md md-adjust">
            </i>Inspector</span>
        </a>
    </div>--}}{{--

    --}}{{--<div class="navbar-collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li> <a href="{{ URL::to('/') }}" class="logo" style="font-size: 17px; pointer-events: none; cursor: default;">
                    --}}{{----}}{{--<i class="icon-adjust icon-c-logo">
                    </i>--}}{{----}}{{--<span class="text-capitalize">District <i class="icon-graph">

                    </i> ADP</span></a></li>

            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a>
            </li>


        </ul>

        <ul class="nav navbar-nav navbar-right">

            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{!! asset('assets/images/demo/users/admin.png') !!}" alt="">
                    --}}{{----}}{{--<i class="icon-user2"></i>--}}{{----}}{{--

                    <span>{{ Session::get('user')[0]->title }}</span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
                    <li><a href="{{ route('user.logout') }}"><i class="icon-switch2"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>--}}{{--
</div>
<!-- /main navbar -->--}}


<!-- Main navbar -->
<div class="navbar navbar-inverse">


    <div class="navbar-header">
        {{--<a class="navbar-brand" href="{!! URL('/') !!}"><span class="text-capitalize">District <i class="icon-graph">

                    </i> ADP</span></a>--}}
        <a href="{{ route('home') }}" class="navbar-brand logo" style="font-size: 17px; letter-spacing: 0px; padding: 0px; padding-top: 4px;">
            {{--<i class="icon-adjust icon-c-logo">
            </i>--}}<span class="text-capitalize">LRBUMS</span></span></a>

        <ul class="nav navbar-nav visible-xs-block">
            {{--<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>--}}
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a>
            </li>


        </ul>


        <ul class="nav navbar-nav navbar-right">


            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ asset('public/assets/images/extras/icon_user.png') }}"
                         style="width: 35px; height: 35px; max-height: 0%;" alt="">
                    <span>{{ Session::get('user')[0]->title }}</span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="{{ route('users.profile') }}"><i class="icon-user"></i> My profile</a></li>
                    <li><a href="{{ route('users.change_password') }}"><i class="icon-lock2"></i> Change Password</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{ route('user.logout') }}"><i class="icon-switch2"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->

<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-main">
            <div class="sidebar-content">

                <!-- User menu -->
                <div class="sidebar-user">
                    <div class="category-content">
                        <div class="media">
                            {{--<a href="javascript:void(0)" class="media-left"><img
                                        src="{!! asset('assets/images/demo/users/admin.png') !!}"
                                        class="img-circle img-sm" alt=""></a>--}}

                            <div class="media-body">
                                <span class="text-size-mini">Welcome</span>
                                <div class="media-body">
                                    <span class="media-heading text-semibold">{{ Session::get('user')[0]->designation->title }}</span>
                                    <div class="text-size-mini text-muted">
                                        <i class="icon-pin text-size-small"></i>
                                        &nbsp;{{ Session::get('user')[0]->department->title }}
                                    </div>
                                </div>
                                {{--<div class="text-size-mini text-muted">
                                    --}}{{--<i class="icon-pin text-size-small"></i> &nbsp;Santa Ana, CA--}}{{--
                                    <span class="label bg-success">Online</span>
                                </div>--}}
                            </div>

                            {{--<div class="media-right media-middle">
                                <ul class="icons-list">
                                    <li>
                                        <a href="#"><i class="icon-cog3"></i></a>
                                    </li>
                                </ul>
                            </div>--}}
                        </div>
                    </div>
                </div>
                <!-- /user menu -->


                <!-- Main navigation -->
                {{--@yield('navigation')--}}
                <div class="sidebar-category sidebar-category-visible">
                    <div class="category-content no-padding">
                        <ul class="navigation navigation-main navigation-accordion">
                            <!-- Main -->
                            <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i>
                            </li>

                            @inject('modules','\App\Utilities\UserModules')


                            @foreach($modules->getModules() as $module)

                                <li class="{{ ($page == $module['title']) ? 'active': '' }}">
                                    <a href="#" class="{{ (count($module['actions']) > 0) ? 'has-ul' : '' }}">
                                        <i class="{{ $module['icon'] }}"></i><span>{{ $module['title'] }}</span></a>

                                    @if(count($module['actions']))
                                        <ul>

                                            @foreach($module['actions'] as $action)

                                                <li class="{{ ($page == $action->route) ? 'active':'' }}"><a
                                                            href="{{ route($action->route) }}">
                                                        {{ $action->title }}</a></li>
                                            @endforeach

                                        </ul>
                                    @endif

                                    {{--@if(!is_null($module['actions']))

                                        <ul>
                                            @foreach($module['actions'] as $action)
                                                <li><a href="#">{{ $action['title'] }}</a></li>
                                            @endforeach
                                        </ul>
                                    @endif--}}
                                </li>

                            @endforeach



                        </ul>
                    </div>
                </div>

            <!-- /main navigation -->

            </div>
        </div>
        <!-- /main sidebar -->


        @if(Session::has('notify_warning'))
            <script type="text/javascript">

                $.jGrowl('{{Session::get('notify_warning')}}', {

                    theme: 'alert-styled-left bg-warning'
                });
            </script>
        @endif

        @if(Session::has('notify_error'))
            <script type="text/javascript">

                $.jGrowl('{{Session::get('notify_error')}}', {

                    theme: 'alert-styled-left bg-danger'
                });
            </script>
        @endif
        @if(Session::has('notify_success'))
            <script type="text/javascript">

                $.jGrowl('{{Session::get('notify_success')}}', {

                    theme: 'alert-styled-left bg-success'
                });
            </script>
        @endif

        <!-- Main content -->
        <div class="content-wrapper">

            @yield('content')

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->


</div>
<!-- /page container -->


</body>


</html>
