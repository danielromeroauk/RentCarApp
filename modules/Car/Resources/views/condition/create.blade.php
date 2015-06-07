@extends('layouts.master')

@section('content')
    <section class="wrapper">
        @include('partials.message')
        <div class="row">
            <div class="col-lg-6">
                <section class="panel">
                    <header class="panel-heading">
                        {{ trans('car::ui.condition.new_cond') }}
                    </header>
                    <div class="panel-body">

                        @include('errors.form_error')

                        {!! Form::open(array('url' => 'car/condition', 'class' => 'form-horizontal')) !!}

                        @include('car::condition.form', ['button' => trans('car::ui.condition.button_add')])

                        {!! Form::close() !!}
                    </div>
                </section>
            </div>
        </div>
    </section>
@stop