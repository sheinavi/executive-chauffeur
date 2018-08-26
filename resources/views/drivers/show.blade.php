@extends('layouts.app')

@section('content')

<div class="col-md-6 offset-md-3">
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{asset('img/drivers/no-photo.png')}}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{$driver->firstname.' '.$driver->lastname}}</h5>
            <p class="card-text">{{$driver->email}} | {{$driver->phone}}</p>
            <a href="/drivers/{{$driver->id}}/edit" class="btn btn-primary">Edit</a>
        </div>
    </div>
</div>
@endsection