@extends('layout.main')
@section('title', 'Home')


@section('content')

    @if(Session::has('notify_success_login'))

        <script type="text/javascript">

            $.jGrowl('{{Session::get('notify_success_login')}}', {

                theme: 'alert-styled-left bg-success'
            });
        </script>
    @endif

        <!-- Page header -->
        <div class="page-header page-header-default">
            <div class="page-header-content">
                <div class="page-title">
                    <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Dashboard</span>
                    </h4>
                </div>

            </div>

            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ route(App\Models\Module::where('id',Session::get('user')[0]->role->homepage_id)->first()->route) }}"><i
                                    class="icon-home2 position-left"></i> Dashboard</a></li>
                    <li class="active">Home</li>
                </ul>

            </div>
        </div>
        <!-- /page header -->
        <!-- Content area -->
        <div class="content">

            <div class="row">


                <div class="col-lg-4">

                    <!-- Members online -->
                    <div class="panel bg-teal-400">
                        <div class="panel-body">
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="reload"></a></li>
                                </ul>
                            </div>

                            <h3 class="no-margin">3,450</h3>
                            Members online
                            <div class="text-muted text-size-small">489 avg</div>
                        </div>


                    </div>
                    <!-- /members online -->

                </div>

                <div class="col-lg-4">

                    <!-- Current server load -->
                    <div class="panel bg-pink-400">
                        <div class="panel-body">
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="reload"></a></li>
                                </ul>
                            </div>

                            <h3 class="no-margin">49.4%</h3>
                            Current server load
                            <div class="text-muted text-size-small">34.6% avg</div>
                        </div>


                    </div>
                    <!-- /current server load -->

                </div>

                <div class="col-lg-4">

                    <!-- Today's revenue -->
                    <div class="panel bg-blue-400">
                        <div class="panel-body">
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="reload"></a></li>
                                </ul>
                            </div>

                            <h3 class="no-margin">$18,390</h3>
                            Today's revenue
                            <div class="text-muted text-size-small">$37,578 avg</div>
                        </div>


                    </div>
                    <!-- /today's revenue -->

                </div>
            </div>


        </div>
        <!--Content area -->


@endsection