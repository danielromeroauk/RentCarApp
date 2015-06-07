@extends('layouts.master')

@section('content')
    <section class="wrapper">
        @include('partials.message')
        <div class="row">
            <div class="col-lg-6">
                <section class="panel">
                    <header class="panel-heading">
                        {{ trans('car::ui.car.new_car') }}
                    </header>
                    <div class="panel-body">

                        @include('errors.form_error')

                        {!! Form::open(array('route' => 'car.store', 'class' => 'form-horizontal')) !!}

                        @include('car::form', ['button' => trans('car::ui.car.button_add')])

                        {!! Form::close() !!}
                    </div>
                </section>
            </div>
        </div>
    </section>
@stop