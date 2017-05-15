@extends('layout.main')
@section('title','Edit Department')


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

<script type="text/javascript" src="{!! asset('public/assets/js/core/libraries/jquery_ui/core.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('public/assets/js/core/libraries/jquery_ui/effects.min.js') !!}"></script>
<script type="text/javascript"
        src="{!! asset('public/assets/js/core/libraries/jquery_ui/interactions.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('public/assets/js/plugins/extensions/cookie.js') !!}"></script>
<script type="text/javascript" src="{!! asset('public/assets/js/plugins/forms/styling/switchery.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('public/assets/js/plugins/forms/styling/uniform.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('public/assets/js/plugins/trees/fancytree_all.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('public/assets/js/plugins/trees/fancytree_childcounter.js') !!}"></script>

<script type="text/javascript"
        src="{!! asset('public/assets/js/plugins/forms/selects/bootstrap_select.min.js') !!}"></script>

<script type="text/javascript" src="{!! asset('public/assets/js/pages/form_bootstrap_select.js') !!}"></script>

{{--<script type="text/javascript" src="{!! asset('assets/js/pages/extra_trees.js') !!}"></script>--}}

<script type="text/javascript">
    $(document).ready(function () {

        $(".tree-checkbox-hierarchical").fancytree({
            checkbox: true,
            selectMode: 3,
            select: function (event, data) {
                // Display list of selected nodes
                $('#role_form').submit(function () {
                    var selNodes = data.tree.getSelectedNodes();
                    // convert to title/key array
                    var selKeys = $.map(selNodes, function (node) {
                        //return "[" + node.key + "]: '" + node.title + "'";
                        return node.key;
                    });
                    $("#checked_modules").val(selKeys.join(","));

                });

            }
        });


    })
</script>

@endpush


@section('content')

        <!-- Page header -->
        <div class="page-header page-header-default">
            <div class="page-header-content">
                <div class="page-title">
                    <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Departments</span>
                    </h4>
                </div>

                <div class="heading-elements">
                    <div class="text-right">
                        <a href="{{ route('departments.create') }}" class="btn bg-primary"><i class="fa fa-plus"
                                                                                              style="margin-right:6px;"></i>New</a>

                        {{--{{ Form::button('<i class="fa fa-plus" style="margin-right:6px;"></i>New',['class'=>'btn bg-info']) }}--}}
                        <a href="{{ route('departments.trashed') }}" class="btn bg-danger"><i class="fa fa-trash"
                                                                                              style="margin-right: 6px;"></i>Trash</a>

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
                        <a href="{{ route('departments.index') }}">Departments</a>
                    </li>
                    <li class="active">Edit Department</li>
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
                    <span class="text-semibold">Error! </span> {!!   Session::get('error') !!}{{--<a href="#" class="alert-link"> try submitting again</a>--}}
                </div>
            @elseif(Session::has('success'))
                <div class="alert bg-success alert-styled-left">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span
                                class="sr-only">Close</span></button>
                    <span class="text-semibold">Success! </span> {!!  Session::get('success')  !!}{{--<a href="#" class="alert-link"> try submitting again</a>--}}
                </div>
            @endif

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="background-color: #37474f; border-color: #37474f;">
                            <h6 class="panel-title">Edit Department</h6>
                            {{--<div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                </ul>
                            </div>--}}
                        </div>

                        <div class="panel-body">


                            {!! Form::open(['class' => 'form-horizontal', 'id' => 'department_form' ,'method' => 'put', 'route' => ['departments.update', $department[0]->id]]) !!}
                            <fieldset class="content-group">


                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label class="control-label col-lg-2">Title</label>
                                    <div class="col-lg-10">
                                        {{--<input type="text" class="form-control">--}}
                                        {!! Form::text('title', $department[0]->title,['class' => 'form-control']) !!}
                                        <span class="help-block">{{ $errors->first('title') }}</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Short Name</label>
                                    <div class="col-lg-10">
                                        {{--<input type="text" class="form-control">--}}
                                        {!! Form::text('short_name', $department[0]->short_name,['class' => 'form-control']) !!}

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Description</label>
                                    <div class="col-lg-10">
                                        {{--<textarea rows="5" cols="5" class="form-control" placeholder=""></textarea>--}}
                                        {!!   Form::textarea('description', $department[0]->description, ['size' => '5x5', 'class' => 'form-control', 'placeholder' => '']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">District</label>
                                    <div class="col-lg-10">

                                        <select name="district" class="bootstrap-select" data-live-search="true"
                                                data-width="100%">
                                            @foreach($districts as $district)
                                                <option value="{{ $district->id }}"
                                                        @if($district->id == $department[0]->district_id)
                                                        selected="selected"
                                                        @endif
                                                >{{$district->title}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Department Type</label>
                                    <div class="col-lg-10">

                                        <select name="department_type" class="bootstrap-select" data-width="100%">
                                            @foreach($department_types as $department_type)
                                                <option value="{{ $department_type->id }}"
                                                        @if($department_type->id == $department[0]->department_type_id)
                                                        selected="selected"
                                                        @endif
                                                >{{$department_type->title}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Department Level</label>
                                    <div class="col-lg-10">

                                        <select name="department_level" class="bootstrap-select" data-width="100%">

                                            <option value="1"
                                                    @if($department[0]->department_level == 1)
                                                    selected="selected"
                                                    @endif
                                            >Provincial
                                            </option>
                                            <option value="2"
                                                    @if($department[0]->department_level == 2)
                                                    selected="selected"
                                                    @endif
                                            >District
                                            </option>


                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Status</label>
                                    <div class="col-lg-10">
                                        <label class="radio-inline radio-left">
                                            <input type="radio" name="status" class="styled" value="1"
                                                    {{ ($department[0]->status == 1) ? ' checked': '' }}>
                                            Active
                                        </label>

                                        <label class="radio-inline radio-left">
                                            <input type="radio" name="status" class="styled" value="0"
                                                    {{ ($department[0]->status == 0) ? ' checked': '' }}>
                                            Inactive
                                        </label>
                                    </div>
                                </div>


                            </fieldset>

                            <div class="text-left">
                                {!! Form::button('Update <i class="icon-arrow-right14 position-right"></i>', ['class' => 'btn btn-primary', 'id' => 'btn_submit','type' => 'submit']) !!}
                                {{--<button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>--}}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

            </div>




    </div>

@endsection