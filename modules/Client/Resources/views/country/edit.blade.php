@extends('layouts.master')

@section('content')
    <section class="wrapper">
        @include('partials.message')
        <div class="row">
            <div class="col-lg-6">
                <section class="panel">
                    <header class="panel-heading">
                        {{ trans('client::ui.country.edit_country') }}
                    </header>
                    <div class="panel-body">

                        @include('errors.form_error')

                        {!! Form::model($country, ['method' => 'PUT', 'class' => 'form-horizontal', 'route' => ['client.country.update', $country->id]]) !!}

                        @include('client::country.form', ['button' => trans('client::ui.country.button_update')])

                        {!! Form::close() !!}
                    </div>
                </section>
            </div>
        </div>
    </section>
@stop