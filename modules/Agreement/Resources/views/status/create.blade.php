@extends('layouts.master')

@section('content')
    <section class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ trans('agreement::ui.status.new_status') }}</div>
                        <div class="panel-body">
                            @include('errors.form_error')

                            {!! Form::open(array('url' => 'agreement/status', 'class' => 'cmxform form-horizontal', 'id' => 'nameForm')) !!}

                            @include('agreement::status.form', ['button' => trans('agreement::ui.status.button_add')])

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('js/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/validation/validation-init.js') }}"></script>
@stop