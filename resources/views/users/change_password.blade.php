@extends('layout.main')
@section('title', 'User - Change Password')

@push('scripts')
<script type="text/javascript">

    $(document).ready(function () {

        $(".alert").delay(4000).fadeOut(300, function () {
            $(this).alert('close');
        });

        $('#changepassword_form').submit(function () {


            var current_password = document.forms["changepassword_form"]["current_password"].value;
            var new_password = document.forms["changepassword_form"]["new_password"].value;
            var confirm_new_password = document.forms["changepassword_form"]["confirm_new_password"].value;

            if (current_password == '') {
                document.getElementById('current_password_error').innerHTML = "Password required";
                return false;
            }
            else {
                document.getElementById('current_password_error').innerHTML = "";
            }
            if (new_password == '') {
                document.getElementById('new_password_error').innerHTML = "New Password required";
                return false;
            }
            else {
                document.getElementById('new_password_error').innerHTML = "";
            }

            if (confirm_new_password == '') {
                document.getElementById('confirm_new_password_error').innerHTML = "Confirm Password required";
                return false;
            }
            else if (confirm_new_password != new_password) {
                document.getElementById('confirm_new_password_error').innerHTML = "Confirm Password doesn't match with New Password";
                return false;
            }
            else {
                document.getElementById('confirm_new_password_error').innerHTML = "";
            }


        })
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

                    <li class="active">Change Password</li>
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
                            <h6 class="panel-title">Change Password</h6>
                            {{--<div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                </ul>
                            </div>--}}
                        </div>

                        <div class="panel-body">

                            <div class="col-md-8">
                                <fieldset class="content-group">

                                    {!! Form::open(['class' => 'form-horizontal', 'id' => 'changepassword_form' ,'method' => 'put', 'route' => ['password.update', $user[0]->id]]) !!}

                                    <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                                        <label class="control-label col-lg-3">Current Password</label>
                                        <div class="col-lg-9">
                                            {{--<input type="text" class="form-control">--}}
                                            {!! Form::password('current_password',['class' => 'form-control']) !!}
                                            <span class="help-block"
                                                  id="current_password_error">{{ $errors->first('current_password') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                                        <label class="control-label col-lg-3">New Password</label>
                                        <div class="col-lg-9">
                                            {{--<input type="text" class="form-control">--}}
                                            {!! Form::password('new_password',['class' => 'form-control']) !!}
                                            <span class="help-block"
                                                  id="new_password_error">{{ $errors->first('new_password') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('confirm_new_password') ? ' has-error' : '' }}">
                                        <label class="control-label col-lg-3">Confirm New Password</label>
                                        <div class="col-lg-9">
                                            {{--<input type="text" class="form-control">--}}
                                            {!! Form::password('confirm_new_password',['class' => 'form-control']) !!}
                                            <span class="help-block"
                                                  id="confirm_new_password_error">{{ $errors->first('confirm_new_password') }}</span>
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