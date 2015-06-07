@extends('layouts.master')

@section('content')
    <section class="wrapper">
        @include('partials.message')
        <div class="row">
            <div class="col-lg-6">
                <section class="panel">
                    <header class="panel-heading">
                        {{ trans('client::ui.client.edit_client') }}
                    </header>
                    <div class="panel-body">

                        @include('errors.form_error')

                        {!! Form::model($client, ['method' => 'PUT', 'class' => 'cmxform form-horizontal', 'id' => 'clientForm', 'route' => ['client.update', $client->id]]) !!}

                        @include('client::form', array('client' => $client) + compact('countries'), ['button' => trans('client::ui.client.button_update')])

                        {!! Form::close() !!}
                    </div>
                </section>
            </div>
        </div>
    </section>
@stop

@section('script')
    <script src="{{ asset('js/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/validation/validation-init.js') }}"></script>
@stop