@extends('layouts.app')
@section('content')
    <div class="col-md-10 offset-md-1">
        <h1>Drivers

        <span class="float-right"><a href="/drivers/create" class="btn btn-primary">Add New Driver</a></span>
            </h1>

        @if(count($drivers) > 0)
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($drivers as $driver)
                    <tr>
                        <th scope="row">{{$driver->id}}</th>
                        <td><img class="small-img rounded mx-auto d-block" src="storage/img/drivers/{{$driver->photo}}" /> </td>
                        <td><a href="/drivers/{{$driver->id}}" title="Edit Driver Details">{{$driver->lastname.', '.$driver->firstname}}</a></td>
                        <td>
                            {!!Form::open(['action'=>['DriversController@destroy',$driver->id],'method'=>'POST','class' => 'inline_form']) !!}
                                {{Form::hidden('_method','DELETE')}}

                                 {{ Form::button('Delete', ['type' => 'submit', 'data-toggle' => 'tooltip','data-placement'=>'top','data-html' => 'true','title'=>'Delete Driver','class'=>'btn btn-outline-danger'] )  }}
                            {!!Form::close()!!}
                            &nbsp; <a href="/drivers/{{$driver->id}}/edit" data-toggle="tooltip" data-placement="top" data-html="true" title="Edit Driver Details" class="btn btn-outline-info"><i class="fas fa-user-edit"></i>edit</a></td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
        @else
            <p>Drivers list is empty.</p>
        @endif
    </div>

@endsection