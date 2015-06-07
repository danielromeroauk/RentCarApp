@extends('layouts.master')

@section('content')
    <section class="wrapper">
        @include('partials.message')
        <div class="row">
            <div class="col-lg-6">
                <section class="panel">
                    <header class="panel-heading">
                        {{ trans('car::ui.car.edit_car') }}
                    </header>
                    <div class="panel-body">

                        @include('errors.form_error')

                        {!! Form::model($car, ['method' => 'PUT', 'class' => 'cmxform form-horizontal', 'id' => 'carForm', 'route' => ['car.update', $car->id]]) !!}

                        @include('car::form', array('car' => $car) + compact('brands', 'prototypes', 'colors', 'conditions'), ['button' => trans('car::ui.car.button_update')])

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