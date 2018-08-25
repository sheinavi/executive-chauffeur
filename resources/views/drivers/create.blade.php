@extends('layouts.app')

@section('content')
    <div class="col-md-8 offset-md-2 col-xs-12">
    <h1>Add new Driver</h1>
    <hr>

    {!! Form::open(['action' => 'DriversController@store','method'=>'POST']) !!}


            <div class="form-group row">
                {{Form::label('title','First Name',['class'=>'col-md-3 col-form-label'])}}
                <div class="col-md-8">
                        {{Form::text('firstname','',['class'=>'form-control'])}}
                </div>
            </div>

            <div class="form-group row">
                {{Form::label('title','Last Name',['class'=>'col-md-3 col-form-label'])}}
                <div class="col-md-8">
                    {{Form::text('lastname','',['class'=>'form-control'])}}
                </div>
            </div>

        <div class="form-group row">
            {{Form::label('title','E-mail Address',['class'=>'col-md-3 col-form-label'])}}
            <div class="col-md-8">
                {{Form::text('email','',['class'=>'form-control'])}}
            </div>
        </div>
        <div class="form-group row">
            {{Form::label('title','Phone Number',['class'=>'col-md-3 col-form-label'])}}
            <div class="col-md-8">
              {{Form::text('phone','',['class'=>'form-control'])}}
            </div>
        </div>

       <div class="form-group row">
            {{Form::label('title','Upload Photo',['class'=>'col-md-3 col-form-label'])}}
           <div class="col-md-8">
            {{Form::open(['url' => 'img/drivers', 'files' => true])}}
           </div>
        </div>

        <div class="form-group">
            {{Form::submit('Save',['class'=>'btn btn-success pull-right btn-lg'])}}
        </div>
    {!! Form::close() !!}

    </div>
@endsection