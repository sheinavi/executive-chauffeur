@extends('layouts.app')
@section('content')
    <h1>Drivers</h1>
    <hr>
    <p class="float-right"><a href="/drivers/create" class="btn btn-outline-primary">Add New Driver</a></p>


    <div class="col-md-10 offset-md-1">
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
                        <td>{{$driver->photo}}</td>
                        <td>{{$driver->lastname.' '.$driver->firstname}}</td>
                        <td><a href="#" title="Delete driver"><i class="fas fa-trash-alt"></i>delete</a> | <a href="#" title="Edit Driver Details"><i class="fas fa-user-edit"></i>edit</a></td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
        @else
            <p>Drivers list is empty.</p>
        @endif
    </div>

@endsection