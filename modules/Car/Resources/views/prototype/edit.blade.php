@extends('layouts.master')

@section('content')
    <section class="wrapper">
        @include('partials.message')
        <div class="row">
            <div class="col-lg-6">
                <section class="panel">
                    <header class="panel-heading">
                        {{ trans('car::ui.prototype.edit_prototype') }}
                    </header>
                    <div class="panel-body">

                        @include('errors.form_error')

                        {!! Form::model($prototype, ['method' => 'PUT', 'route' => ['car.model.update', $prototype->id], 'class' => 'cmxform form-horizontal', 'id' => 'nameForm']) !!}

                        @include('car::prototype.form', ['button' => trans('car::ui.prototype.button_update')])

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