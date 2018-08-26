@extends('layouts.app')

@section('content')
    <div class="col-md-8 offset-md-2 col-xs-12">
        <h1>Edit Driver</h1>
        <hr>

        {!! Form::open(['action' => ['DriversController@update',$driver->id],'method'=>'POST']) !!}


        <div class="form-group row">
            {{Form::label('title','First Name',['class'=>'col-md-3 col-form-label'])}}
            <div class="col-md-8">
                {{Form::text('firstname',$driver->firstname,['class'=>'form-control'])}}
            </div>
        </div>

        <div class="form-group row">
            {{Form::label('title','Last Name',['class'=>'col-md-3 col-form-label'])}}
            <div class="col-md-8">
                {{Form::text('lastname',$driver->lastname,['class'=>'form-control'])}}
            </div>
        </div>

        <div class="form-group row">
            {{Form::label('title','E-mail Address',['class'=>'col-md-3 col-form-label'])}}
            <div class="col-md-8">
                {{Form::text('email',$driver->email,['class'=>'form-control'])}}
            </div>
        </div>
        <div class="form-group row">
            {{Form::label('title','Phone Number',['class'=>'col-md-3 col-form-label'])}}
            <div class="col-md-8">
                {{Form::text('phone',$driver->phone,['class'=>'form-control'])}}
            </div>
        </div>

        <div class="form-group row">
            {{Form::label('title','Upload Photo',['class'=>'col-md-3 col-form-label'])}}
            <div class="col-md-8">
                {{Form::open(['url' => 'img/drivers', 'files' => true])}}
            </div>
        </div>

        {{Form::hidden('_method','PUT')}}
        <div class="form-group">
            {{Form::submit('Save',['class'=>'btn btn-success pull-right btn-lg'])}}
        </div>
        {!! Form::close() !!}

    </div>
@endsection