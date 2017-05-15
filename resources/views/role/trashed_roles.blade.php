@extends('layout.main')
@section('title', 'Roles')


@push('scripts')
<!-- Theme JS files -->
<script type="text/javascript"
        src="{!! asset('public/assets/js/plugins/tables/datatables/datatables.min.js') !!}"></script>
<script type="text/javascript"
        src="{!! asset('public/assets/js/plugins/tables/datatables/extensions/responsive.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('public/assets/js/plugins/forms/styling/uniform.min.js') !!}"></script>

<script type="text/javascript">
    $(document).ready(function () {


        $(document).on('click', '#delete_role', function () {

            var id = $(this).data('id');

            $('#role_id').val(id);

            $('#modal_delete').modal('show');


        });

        $('#modal_delete').find('.modal-footer #modal_yes').on('click', function () {

            var form = document.getElementById('role_id').value;
            document.forms[form].submit();


        });
    });
</script>


<!-- /theme JS files -->
<script type="text/javascript">
    $(function () {


        // Table setup
        // ------------------------------

        // Setting datatable defaults
        $.extend($.fn.dataTable.defaults, {
            autoWidth: false,
            responsive: true,
            columnDefs: [{
                orderable: false,
                width: '100px',
                targets: [4]
            }],
            dom: '<"datatable-header"fl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
            language: {
                search: '<span>Search:</span> _INPUT_',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: {'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;'}
            },
            drawCallback: function () {
                $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
            },
            preDrawCallback: function () {
                $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
            }
        });


        // Basic responsive configuration
        $('.datatable-responsive').DataTable(
                {
                    "bLengthChange": false,
                    "pageLength": 10,
                    /*"paginate": false,

                     "bSearch":false*/

                });


        // Column controlled child rows
        $('.datatable-responsive-column-controlled').DataTable({
            responsive: {
                details: {
                    type: 'column'
                }
            },
            columnDefs: [
                {
                    className: 'control',
                    orderable: false,
                    targets: 0
                },
                {
                    width: "100px",
                    targets: [5]
                },
                {
                    orderable: false,
                    targets: [5]
                }
            ],
            order: [1, 'asc']
        });


        // Control position
        $('.datatable-responsive-control-right').DataTable({
            responsive: {
                details: {
                    type: 'column',
                    target: -1
                }
            },
            columnDefs: [
                {
                    className: 'control',
                    orderable: false,
                    targets: -1
                },
                {
                    width: "100px",
                    targets: [6]
                },
                {
                    orderable: false,
                    targets: [6]
                }
            ]
        });


        // Whole row as a control
        $('.datatable-responsive-row-control').DataTable({
            responsive: {
                details: {
                    type: 'column',
                    target: 'tr'
                }
            },
            columnDefs: [
                {
                    className: 'control',
                    orderable: false,
                    targets: 0
                },
                {
                    width: "100px",
                    targets: [5]
                },
                {
                    orderable: false,
                    targets: [5]
                }
            ],
            order: [1, 'asc']
        });


        // External table additions
        // ------------------------------

        // Add placeholder to the datatable filter option
        $('.dataTables_filter input[type=search]').attr('placeholder', 'Type to search...');


        // Enable Select2 select for the length option
        $('.dataTables_length select').select2({
            minimumResultsForSearch: Infinity,
            width: 'auto'
        });

    });
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
                    <li><a href="{{ route('roles.index') }}"> Roles</a></li>
                    <li class="active">Trash</li>
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
                            <h6 class="panel-title">Roles</h6>
                            {{--<div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                </ul>
                            </div>--}}
                        </div>

                        {{--<div class="panel-body">



                        </div>--}}

                        <table class="table datatable-responsive table-striped table-hover table-bordered">
                            <thead>
                            <tr>
                                <th class="">S. No</th>
                                <th class="">Title</th>
                                <th class="" style="text-align: center;">Homepage</th>
                                <th class="">Description</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $role->title }}</td>
                                    <td style="text-align: center;"><code>/{{ $role->homepage->title }}</code></td>
                                    @if($role->description == NULL)
                                        <td>None</td>
                                    @else
                                        <td>{{ $role->description }}</td>
                                    @endif


                                    <td class="text-center">

                                        {!! Form::open(['id' => 'form_role_delete '.$role->id, 'method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'class' => 'form-horizontal']) !!}
                                        <ul class="icons-list">

                                            <li id="restore" title="Restore" class="text-primary-600"><a
                                                        href="{{ route('roles.restore', $role->id) }}"><i
                                                            class="icon-undo2"></i></a></li>

                                            <li id="delete_role" data-toggle="modal"
                                                data-id="{{ 'form_role_delete '.$role->id }}"
                                                title="Delete"

                                                class="text-danger-600"><a

                                                        href="javascript:void(0)"><i
                                                            class="icon-trash-custom"></i></a></li>

                                        </ul>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>


                        </table>


                        {{-- <div class="text-right m-15">
                             {{ $controllers->links() }}
                         </div>--}}


                        <div id="modal_delete" class="modal fade"
                             style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content text-left">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">×
                                        </button>
                                        <h5 class="modal-title">Delete</h5>
                                    </div>

                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this role?</p>
                                        <input type="hidden" id="role_id"/>
                                    </div>


                                    <div class="modal-footer">
                                        {!! Form::button('No',['class' => 'btn btn-link', 'id' => 'modal_no','data-dismiss' => 'modal']) !!}


                                        {!! Form::button('Yes', ['class' => 'btn btn-primary', 'id' => 'modal_yes','type' => 'submit']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>



    </div>

@endsection