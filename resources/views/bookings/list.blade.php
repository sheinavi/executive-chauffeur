@extends('layouts.app')
@section('content')
    <div class="col-md-10 offset-md-1 col-xs-12">

        @if(count($bookings) > 0)
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Action</th>
                    <th scope="col">Client</th>
                    <th scope="col">Journey Date</th>
                    <th scope="col">Pickup Address</th>
                    <th scope="col">Destination Address</th>
                    <th scope="col">Status</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                        <tr>
                            <td>View | Delete</td>
                            <td>{{$booking->firstname.' '.$booking->lastname}}</td>
                            <td>{{$booking->pickup_datetime}}</td>
                            <td>{{$booking->journey_from}}</td>
                            <td>{{$booking->journey_to}}</td>
                            <td>{{$booking->status}}</td>
                        </tr>

                    @endforeach


                </tbody>
            </table>
        @else
            <h3 class="alert alert-info">
               No bookings found.
            </h3>
        @endif
    </div>
@endsection