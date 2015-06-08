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
                        {{ trans('agreement::ui.agreement.names') }}
                        <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
                    </header>
                    <div class="panel-body">
                        <div class="adv-table">
                            <a href="{{ url('agreement/create') }}"><button class="btn btn-primary" type="button"><i class="fa fa-plus-circle"></i> {{ trans("agreement::ui.agreement.button_add") }}</button></a>
                            <table  class="display table table-bordered table-striped" id="dynamic-table">
                                <thead>
                                <tr>
                                    <th>{{ trans('agreement::ui.agreement.code') }}</th>
                                    <th>{{ trans('client::ui.client.lastname_label') }}</th>
                                    <th>{{ trans('client::ui.client.firstname_label') }}</th>
                                    <th>{{ trans('car::ui.brand.name') }}</th>
                                    <th>{{ trans('car::ui.prototype.name') }}</th>
                                    <th>{{ trans('car::ui.color.name') }}</th>
                                    <th>{{ trans('agreement::ui.status.name') }}</th>
                                    <th>{{ trans('agreement::ui.agreement.registration_label') }}</th>
                                    <th>{{ trans('agreement::ui.agreement.delivery_label') }}</th>
                                    <th>{{ trans('agreement::ui.agreement.cash_label') }}</th>
                                    <th>{{ trans('agreement::ui.agreement.operation_label') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($agreements as $agreement)
                                    <tr class="gradeX">
                                        <td>{{ $agreement->code }}</td>
                                        <td>{{ $agreement->client->lastname }}</td>
                                        <td>{{ $agreement->client->firstname }}</td>
                                        <td>{{ $agreement->car->brand->name }}</td>
                                        <td>{{ $agreement->car->prototype->name }}</td>
                                        <td>{{ $agreement->car->color->name }}</td>
                                        <td>{{ $agreement->status->name }}</td>
                                        <td>{{ $agreement->registration_date }}</td>
                                        <td>{{ $agreement->delivery_date }}</td>
                                        <td>{{ $agreement->cash }}</td>
                                        <td>
                                            <p>
                                                <a href="{{ url('agreement/' . $agreement->id . '/edit') }}">
                                                    <button class="btn btn-info " type="button"><i class="fa fa-refresh"></i> {{ trans('agreement::ui.agreement.button_update') }}</button>
                                                </a>
                                                {!! Form::open(['url' => 'agreement/'. $agreement->id, 'method' => 'delete']) !!}
                                                <button class="btn btn-danger " type="submit"><i class="fa fa-wrench"></i> {{ trans('agreement::ui.agreement.button_delete') }}</button>
                                                {!! Form::close() !!}
                                            </p>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>{{ trans('agreement::ui.agreement.code') }}</th>
                                    <th>{{ trans('client::ui.client.lastname_label') }}</th>
                                    <th>{{ trans('client::ui.client.firstname_label') }}</th>
                                    <th>{{ trans('car::ui.brand.name') }}</th>
                                    <th>{{ trans('car::ui.prototype.name') }}</th>
                                    <th>{{ trans('car::ui.color.name') }}</th>
                                    <th>{{ trans('agreement::ui.status.name') }}</th>
                                    <th>{{ trans('agreement::ui.agreement.registration_label') }}</th>
                                    <th>{{ trans('agreement::ui.agreement.delivery_label') }}</th>
                                    <th>{{ trans('agreement::ui.agreement.cash_label') }}</th>
                                    <th>{{ trans('agreement::ui.agreement.operation_label') }}</th>
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