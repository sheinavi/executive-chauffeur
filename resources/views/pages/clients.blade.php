@extends('layouts.app')
@section('content')
    <div class="col-md-10 col-xs-12 offset-md-1">
        <h1>Clients

            <span class="float-right"><a href="/clients/create" class="btn btn-primary">Add New Client</a></span>
        </h1>
        @if(count($clients) >0)
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Action</th>
                    <th scope="col">Client Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clients as $client)
                    <tr>
                        <td>View | Delete</td>
                        <td>{{$client->firstname.' '.$client->lastname}}</td>
                        <td>{{$client->email}}</td>
                        <td>{{$client->phone}}</td>
                    </tr>

                @endforeach


                </tbody>
            </table>
        @else
            <h3 class="alert alert-info">No clients found.</h3>
        @endif
    </div>
@endsection