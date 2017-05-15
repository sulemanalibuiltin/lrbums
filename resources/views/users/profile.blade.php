@extends('layout.main')
@section('title', 'User - Profile')

@push('scripts')

<script type="text/javascript">
    $(document).ready(function () {
        $('#btn_notify').on('click', function () {

        });
    });
</script>

@endpush

@section('content')


    {{--<script type="text/javascript">
        $.jGrowl('You are not allowed to access this module', {
            header: 'Access denied',
            theme: 'alert-styled-left bg-danger'
        });
    </script>--}}
    <!-- Page header -->
        <div class="page-header page-header-default">
            <div class="page-header-content">
                <div class="page-title">
                    <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Profile</span>
                    </h4>
                </div>


            </div>

            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ route($homepage) }}"><i
                                    class="icon-home2 position-left"></i> Home</a></li>

                    <li class="active">Profile</li>
                </ul>

            </div>
        </div>
        <!-- /page header -->
        <!-- Content area -->
        <div class="content">

            @if(Session::has('error'))
                <div class="alert bg-danger alert-styled-left">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span
                                class="sr-only">Close</span></button>
                    <span class="text-semibold">Error! </span> {{ Session::get('error') }}{{--<a href="#" class="alert-link"> try submitting again</a>--}}
                </div>
            @elseif(Session::has('success'))
                <div class="alert bg-success alert-styled-left">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span
                                class="sr-only">Close</span></button>
                    <span class="text-semibold">Success! </span> {{ Session::get('success') }}{{--<a href="#" class="alert-link"> try submitting again</a>--}}
                </div>
            @endif

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h6 class="panel-title">Profile</h6>
                            {{--<div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                </ul>
                            </div>--}}
                        </div>

                        <div class="panel-body">

                            <div class="col-md-8">
                                <fieldset class="content-group">

                                    {!! Form::open(['class' => 'form-horizontal', 'id' => 'profile_form' ,'method' => 'put', 'route' => ['profile.update', $user[0]->id]]) !!}

                                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                        <label class="control-label col-lg-2">Title</label>
                                        <div class="col-lg-10">
                                            {{--<input type="text" class="form-control">--}}
                                            {!! Form::text('title', $user[0]->title,['class' => 'form-control']) !!}
                                            <span class="help-block">{{ $errors->first('title') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label class="control-label col-lg-2">Email</label>
                                        <div class="col-lg-10">
                                            {{--<input type="text" class="form-control">--}}
                                            {!! Form::text('email', $user[0]->email,['class' => 'form-control']) !!}
                                            <span class="help-block">{{ $errors->first('email') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                                        <label class="control-label col-lg-2">Contact</label>
                                        <div class="col-lg-10">
                                            {{--<input type="text" class="form-control">--}}
                                            {!! Form::text('contact', $user[0]->contact,['class' => 'form-control']) !!}
                                            <span class="help-block">{{ $errors->first('contact') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                        <label class="control-label col-lg-2">Username</label>
                                        <div class="col-lg-10">
                                            {{--<input type="text" class="form-control">--}}
                                            {!! Form::text('username', $user[0]->username,['class' => 'form-control']) !!}
                                            <span class="help-block">{{ $errors->first('username') }}</span>
                                        </div>
                                    </div>


                                    <div class="text-left">
                                        {!! Form::button('Update <i class="icon-arrow-right14 position-right"></i>', ['class' => 'btn btn-primary', 'id' => 'btn_submit','type' => 'submit']) !!}
                                        {{--<button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>--}}
                                    </div>

                                    {!! Form::close() !!}
                                </fieldset>
                            </div>

                            <div class="col-md-4">
                                <div class="thumb thumb-rounded thumb-slide" style="width: 150px; height: 150px;">
                                    <img src="{{ asset('public/assets/images/extras/icon_user.png') }}" alt="">

                                </div>

                                <div class="caption text-center m-5">
                                    <h6 class="text-semibold no-margin">{{$user[0]->title}}
                                        <small class="display-block">{{$user[0]->designation->title}}</small>
                                    </h6>

                                </div>

                            </div>


                        </div>
                    </div>
                </div>


            </div>

        </div>




    </div>
@endsection