@extends('layout.main')
@section('title','Add Role')

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
<script type="text/javascript" src="{!! asset('public/assets/js/core/libraries/jquery_ui/interactions.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('public/assets/js/plugins/extensions/cookie.js') !!}"></script>
<script type="text/javascript" src="{!! asset('public/assets/js/plugins/forms/styling/switchery.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('public/assets/js/plugins/forms/styling/uniform.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('public/assets/js/plugins/trees/fancytree_all.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('public/assets/js/plugins/trees/fancytree_childcounter.js') !!}"></script>

<script type="text/javascript" src="{!! asset('public/assets/js/plugins/forms/selects/bootstrap_select.min.js') !!}"></script>

<script type="text/javascript" src="{!! asset('public/assets/js/pages/form_bootstrap_select.js') !!}"></script>

{{--<script type="text/javascript" src="{!! asset('assets/js/pages/extra_trees.js') !!}"></script>--}}

<script type="text/javascript">
    $(document).ready(function() {

        $(".tree-checkbox-hierarchical").fancytree({
            checkbox: true,
            selectMode: 3,
            select: function(event, data) {
                // Display list of selected nodes
                $('#role_form').submit(function () {
                    var selNodes = data.tree.getSelectedNodes();
                    // convert to title/key array
                    var selKeys = $.map(selNodes, function(node){
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
                    <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Roles</span>
                    </h4>
                </div>

                <div class="heading-elements">
                    <div class="text-right">
                        <a href="{{ route('roles.create') }}" class="btn bg-primary"><i class="fa fa-plus"
                                                                                        style="margin-right:6px;"></i>New</a>

                        {{--{{ Form::button('<i class="fa fa-plus" style="margin-right:6px;"></i>New',['class'=>'btn bg-info']) }}--}}
                        <a href="{{ route('roles.trashed') }}" class="btn bg-danger"><i class="fa fa-trash"
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
                        <a href="{{ route('roles.index') }}">Roles</a>
                    </li>
                    <li class="active">Add New Role</li>
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
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="background-color: #263238; border-color: #263238;">
                            <h6 class="panel-title">Add New Role</h6>
                            {{--<div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                </ul>
                            </div>--}}
                        </div>

                        <div class="panel-body">


                            {!! Form::open(['class' => 'form-horizontal', 'id' => 'role_form' ,'method' => 'post', 'route' => 'roles.store']) !!}
                            <fieldset class="content-group">


                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label class="control-label col-lg-2">Title</label>
                                    <div class="col-lg-10">
                                        {{--<input type="text" class="form-control">--}}
                                        {!! Form::text('title', old('title'),['class' => 'form-control']) !!}
                                        <span class="help-block">{{ $errors->first('title') }}</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Homepage</label>
                                    <div class="col-lg-10">

                                        <select name="homepage" class="bootstrap-select" data-width="100%">
                                            {!! $modules_select !!}
                                            {{--@foreach ($modules as $module)

                                                @if($module->parent_id == 0)

                                                    <optgroup label='{{$module->title}}'>

                                                        @foreach($modules as $cmodule)
                                                            @if($cmodule->parent_id == $module->id)
                                                                <option value='{{ $cmodule->id }}'> {{ $cmodule->title}}</option>

                                                            @endif

                                                        @endforeach
                                                    </optgroup>

                                                @endif

                                            @endforeach--}}

                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-lg-2">Description</label>
                                    <div class="col-lg-10">
                                        {{--<textarea rows="5" cols="5" class="form-control" placeholder=""></textarea>--}}
                                        {!!   Form::textarea('description', NULL, ['size' => '5x5', 'class' => 'form-control', 'placeholder' => '']) !!}
                                    </div>
                                </div>


                                <div class="form-group{{ $errors->has('checked_modules') ? ' has-error' : '' }}">
                                    <input type="hidden" value="" id="checked_modules" name="checked_modules" />
                                    <label class="control-label col-lg-2">Assign Modules</label>
                                    <div class="col-lg-10">
                                        <div class="tree-checkbox-hierarchical well" {!! $errors->first('checked_modules') ? 'style="border: 1px solid #d84315;"' : ''!!} id="role_tree">

                                            <ul>
                                                @foreach($modules as $module)


                                                    @if($module->parent_id == 0)
                                                        <li id="{{$module->id}}" class="folder expanded">{{ $module->title }}
                                                            <ul>
                                                                @foreach($modules as $cmodule)
                                                                    @if($cmodule->parent_id == $module->id)
                                                                        <li id="{{$cmodule->id}}">{{ $cmodule->title }}</li>
                                                                    @endif
                                                                @endforeach

                                                            </ul>
                                                        </li>
                                                    @endif

                                                @endforeach


                                            </ul>
                                        </div>

                                        <span class="help-block">{{ $errors->first('checked_modules') }}</span>
                                    </div>

                                </div>

                            </fieldset>

                            <div class="text-left">
                                {!! Form::button('Submit <i class="icon-arrow-right14 position-right"></i>', ['class' => 'btn btn-primary', 'id' => 'btn_submit','type' => 'submit']) !!}
                                {{--<button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>--}}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

            </div>




    </div>
@endsection