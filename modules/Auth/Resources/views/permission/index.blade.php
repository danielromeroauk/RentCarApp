@extends('layouts.master')

@section('style')
    <link href="{{ asset('js/advanced-datatable/css/demo_page.css') }}" rel="stylesheet" />
    <link href="{{ asset('js/advanced-datatable/css/demo_table.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('js/data-tables/DT_bootstrap.css') }}" />
    @stop

@section('content')

    <!--body wrapper start-->
    <div class="wrapper">
        @include('partials.message')
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        {{ trans('auth::ui.permission.names') }}
            <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
                    </header>
                    <div class="panel-body">
                        <div class="adv-table">
                            <a href="{{ url('auth/permission/create') }}"><button class="btn btn-primary" type="button"><i class="fa fa-plus-circle"></i> {{ trans("auth::ui.permission.button_add") }}</button></a>
                            <table  class="display table table-bordered table-striped" id="dynamic-table">
                                <thead>
                                <tr>
                                    <th>{{ trans('auth::ui.permission.name_label') }}</th>
                                    <th>{{ trans('auth::ui.permission.display') }}</th>
                                    <th>{{ trans('auth::ui.permission.description') }}</th>
                                    <th>{{ trans('auth::ui.permission.operation_label') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($permissions as $permission)
                                    <tr class="gradeX">
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->display_name }}</td>
                                        <td>{{ $permission->description }}</td>
                                        <td>
                                            <p>
                                            <a href="{{ url('auth/permission/' . $permission->id . '/edit') }}">
                                                <button class="btn btn-info " type="button"><i class="fa fa-refresh"></i> {{ trans('auth::ui.permission.button_update') }}</button>
                                            </a>
                                            {!! Form::open(['url' => 'auth/permission/'. $permission->id, 'method' => 'delete']) !!}
                                            <button class="btn btn-danger " type="submit"><i class="fa fa-times-circle"></i> {{ trans('auth::ui.permission.button_delete') }}</button>
                                            {!! Form::close() !!}
                                            </p>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>{{ trans('auth::ui.permission.name_label') }}</th>
                                    <th>{{ trans('auth::ui.permission.display') }}</th>
                                    <th>{{ trans('auth::ui.permission.description') }}</th>
                                    <th>{{ trans('auth::ui.permission.operation_label') }}</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@stop

@section('script')
            <!--dynamic table-->
    <script type="text/javascript" language="javascript" src="{{ asset('js/advanced-datatable/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/data-tables/DT_bootstrap.js') }}"></script>
    <!--dynamic table initialization -->
    <script src="{{ asset('js/dynamic_table_init.js') }}"></script>
@stop