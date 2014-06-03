@extends('layouts.master')
@section('title')SFM Dashboard @stop


@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-12">

            <div class="page-header">
              <h1>SFM Dashboard <small>Login to continue</small></h1>
            </div>

            {{ Form::open(array('url' => 'login', 'class' => 'form-horizontal')) }}
            <div class="form-group">
                {{ Form::label('email', 'Email address', array('class' => 'col-sm-2 control-label')) }}

                <div class="col-sm-10">
                    {{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}

                    <small><strong>{{ $errors->first('email')}}</strong></small>
                </div>

            </div>

            <div class="form-group">
                {{ Form::label('password', 'Password', array('class' => 'col-sm-2 control-label')) }}
                <div class="col-sm-10">
                    {{ Form::password('password',array('class' => 'form-control')) }}
                    <small><strong>{{ $errors->first('password')}}</strong></small>
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    {{ Form::submit('Sign in',array('class' => 'btn btn-default'))}}
                </div>
            </div>
            {{ Form::close() }}

        </div>
    </div>

</div>
@stop
