@extends('layout.main')
@section('title', 'Edit Action')

@push('scripts')
<script type="text/javascript">

    $(function () {

        $(".styled, .multiselect-container input").uniform({
            radioClass: 'choice'
        });

        //
        // Contextual colors
        //

        // Primary
        $(".control-primary").uniform({
            radioClass: 'choice',
            wrapperClass: 'border-primary-600 text-primary-800'
        });

        // Danger
        $(".control-danger").uniform({
            radioClass: 'choice',
            wrapperClass: 'border-danger-600 text-danger-800'
        });

        // Success
        $(".control-success").uniform({
            radioClass: 'choice',
            wrapperClass: 'border-success-600 text-success-800'
        });

        // Warning
        $(".control-warning").uniform({
            radioClass: 'choice',
            wrapperClass: 'border-warning-600 text-warning-800'
        });

        // Info
        $(".control-info").uniform({
            radioClass: 'choice',
            wrapperClass: 'border-info-600 text-info-800'
        });

        // Custom color
        $(".control-custom").uniform({
            radioClass: 'choice',
            wrapperClass: 'border-indigo-600 text-indigo-800'
        });

    });

</script>
@endpush


@section('content')


        <!-- Page header -->
        <div class="page-header page-header-default">
            <div class="page-header-content">
                <div class="page-title">
                    <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Modules</span>
                    </h4>
                </div>

                <div class="heading-elements">
                    <div class="text-right">
                        <a href="{{ route('actions.create', $parent_id) }}" class="btn bg-primary"><i class="fa fa-plus" style="margin-right:6px;"></i>New</a>

                        {{--{{ Form::button('<i class="fa fa-plus" style="margin-right:6px;"></i>New',['class'=>'btn bg-info']) }}--}}
                        <a href="{{ route('actions.trashed', $parent_id) }}" class="btn bg-danger"><i class="fa fa-trash" style="margin-right: 6px;"></i>Trash</a>

                        {{--{{ Form::button('<i class="fa fa-trash" style="margin-right:6px;"></i>Trash',['class'=>'btn bg-danger']) }}--}}
                    </div>

                </div>


            </div>

            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ route($homepage) }}"><i
                                    class="icon-home2 position-left"></i> Home</a></li>
                    <li>
                        <a href="{{ route('modules.controllers') }}">Controllers</a>
                    </li>

                    <li>
                        <a href="{{ route('modules.actions', $action[0]->parent_id) }}">Actions</a>
                    </li>
                    <li class="active">Edit Action</li>
                </ul>

            </div>
        </div>
        <!-- /page header -->
        <!-- Content area -->
        <div class="content">

            @if(Session::has('error'))
                <div class="alert bg-danger alert-styled-left">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold">Error! </span> {{ Session::get('error') }}{{--<a href="#" class="alert-link"> try submitting again</a>--}}
                </div>
            @elseif(Session::has('success'))
                <div class="alert bg-success alert-styled-left">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold">Success! </span> {{ Session::get('success') }}{{--<a href="#" class="alert-link"> try submitting again</a>--}}
                </div>
            @endif

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="background-color: #263238; border-color: #263238;">
                            <h6 class="panel-title">Edit Action</h6>
                            {{--<div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                </ul>
                            </div>--}}
                        </div>

                        <div class="panel-body">


                            {!! Form::open(['class' => 'form-horizontal', 'method' => 'put', 'route' => ['actions.update', $action[0]->id]]) !!}
                            <fieldset class="content-group">


                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label class="control-label col-lg-2">Title</label>
                                    <div class="col-lg-10">
                                        {{--<input type="text" class="form-control">--}}
                                        {!! Form::text('title', $action[0]->title,['class' => 'form-control']) !!}
                                        <span class="help-block">{{ $errors->first('title') }}</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Description</label>
                                    <div class="col-lg-10">
                                        {{--<textarea rows="5" cols="5" class="form-control" placeholder=""></textarea>--}}
                                        {!!   Form::textarea('description', $action[0]->description, ['size' => '5x5', 'class' => 'form-control', 'placeholder' => '']) !!}
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('route') ? ' has-error' : '' }}">
                                    <label class="control-label col-lg-2">Route</label>
                                    <div class="col-lg-10">
                                        {{--<input type="text" class="form-control">--}}
                                        {!! Form::text('route', $action[0]->route, ['class' => 'form-control']) !!}
                                        <span class="help-block">{{ $errors->first('route') }}</span>

                                    </div>
                                </div>


                                <div class="form-group form-inline">
                                    <label class="control-label col-lg-2">Menu Status</label>
                                    <div class="col-lg-10">
                                        <label class="radio-inline radio-left col-md-2">
                                            <input type="radio" name="menu_status" class="styled" value="1"
                                                    {{ ($action[0]->menu_status == 1) ? ' checked':'' }}>
                                            Show in menu
                                        </label>

                                        <label class="radio-inline radio-left">
                                            <input type="radio" name="menu_status" class="styled" value="0"
                                                    {{ ($action[0]->menu_status == 0) ? ' checked':'' }}>
                                            Don't show in menu
                                        </label>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-lg-2">Status</label>
                                    <div class="col-lg-10">
                                        <label class="radio-inline radio-left col-md-2">
                                            <input type="radio" name="status" class="styled" value="1"
                                                    {{ ($action[0]->status == 1) ? ' checked': '' }}>
                                            Active
                                        </label>

                                        <label class="radio-inline radio-left">
                                            <input type="radio" name="status" class="styled" value="0"
                                                    {{ ($action[0]->status == 0) ? ' checked': '' }}>
                                            Inactive
                                        </label>
                                    </div>
                                </div>


                            </fieldset>

                            <div class="text-left">
                                {!! Form::button('Update <i class="icon-arrow-right14 position-right"></i>', ['class' => 'btn btn-primary', 'type' => 'submit']) !!}
                                {{--<button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>--}}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

            </div>




    </div>

@endsection