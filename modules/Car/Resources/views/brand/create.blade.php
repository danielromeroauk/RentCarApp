@extends('layouts.master')

@section('content')
    <section class="wrapper">
        @include('partials.message')
        <div class="row">
            <div class="col-lg-6">
                <section class="panel">
                    <header class="panel-heading">
                        {{ trans('car::ui.brand.new_brand') }}
                    </header>
                    <div class="panel-body">

                        @include('errors.form_error')

                        {!! Form::open(array('url' => 'car/brand', 'class' => 'cmxform form-horizontal', 'id' => 'nameForm')) !!}

                        @include('car::brand.form', ['button' => trans('car::ui.brand.button_add')])

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