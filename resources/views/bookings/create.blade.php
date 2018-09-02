@extends('layouts.app')

@section('content')
    <div class="col-md-10 offset-md-1 col-xs-12">
        <h1>New Booking</h1>
        <hr>

        {!! Form::open(['action' => 'BookingsController@store','method'=>'POST']) !!}

        <div class="row">
                <div class="col-md-6 col-xs-12">
                            <div class="form-group row">
                                {{Form::label('source','Source of Booking',['class'=>'col-md-5 col-form-label text-right'])}}
                                <div class="col-md-7">
                                    {{Form::select('booking_source', $data['booking_sources'], null,['class'=>'form-control'])}}
                                </div>
                            </div>

                            <div class="form-group row">
                                {{Form::label('title','Booking Reference',['class'=>'col-md-5 col-form-label text-right'])}}
                                <div class="col-md-7">
                                    {{Form::text('reference','',['class'=>'form-control'])}}
                                </div>
                            </div>
                </div>
                <div class="col-md-6 col-xs-12">
                            <div class="form-group row">
                                {{Form::label('account','Account',['class'=>'col-md-5 col-form-label text-right'])}}
                                <div class="col-md-7">
                                    {{Form::select('client_id', $data['client'], '',['class'=>'form-control','placeholder'=>'please select'])}}
                                </div>
                            </div>

                            <div class="form-group row">
                                {{Form::label('payment_method','Payment Type',['class'=>'col-md-5 col-form-label text-right'])}}
                                <div class="col-md-7">
                                    {{Form::select('payment_method',  $data['payment_method'], '',['class'=>'form-control','placeholder'=>'Please Select'])}}
                                </div>
                            </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        {{Form::label('title','Collection Address',['class'=>'col-md-3 col-form-label text-right'])}}
                        <div class="col-md-9">
                            {{Form::text('journey_from','',['class'=>'form-control'])}}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{Form::label('title','Going To',['class'=>'col-md-3 col-form-label text-right'])}}
                        <div class="col-md-9">
                            {{Form::text('journey_to','',['class'=>'form-control'])}}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{Form::label('title','Date and Time',['class'=>'col-md-3 col-form-label text-right'])}}
                        <div class="col-md-3">
                            {{Form::date('dateandtime_date', \Carbon\Carbon::now(),['class'=>'form-control'])}}
                        </div>
                        <div class="col-md-3">
                            {{Form::select('dateandtime_time',$data['hour'],null,['class'=>'form-control','placeholder'=>'hour : minute'])}}
                        </div>

                    </div>

                    <div class="form-group row">
                        {{Form::label('title','Return Journey',['class'=>'col-md-3 col-form-label text-right'])}}
                        <div class="col-md-2 form-check form-check-inline">

                            {{Form::select('is_return', ['0'=>'NO','1'=>'YES'],'0',['class' => 'form-control mb-2','id'=>'is_return'])}}
                        </div>
                        <div class="col-md-3">
                            {{Form::date('return_dateandtime_date', \Carbon\Carbon::now(),['class'=>'form-control mb-2' , 'disabled' => 'disabled','id'=>'return_dateandtime_date'])}}
                        </div>
                        <div class="col-md-3">
                            {{Form::select('return_dateandtime_time',$data['hour'],null,['class'=>'form-control mb-2','disabled' => 'disabled','placeholder'=>'hour : minute','id'=>'return_dateandtime_time'])}}
                        </div>

                    </div>
                </div><!-- col-md-12-->

        </div><!-- row -->


<hr>


        <div class="row">
                        <div class="col-md-4">
                                        <div class="form-group row">
                                            {{Form::label('title','Sub Total',['class'=>'col-md-7 col-form-label text-right'])}}
                                            <div class="col-md-5">
                                                {{Form::text('subtotal','0.00',['class'=>'form-control calculate-me'])}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            {{Form::label('title','Congestion Charge',['class'=>'col-md-7 col-form-label text-right'])}}
                                            <div class="col-md-5">
                                                {{Form::text('congestion_charge','0.00',['class'=>'form-control calculate-me'])}}
                                            </div>
                                        </div>
                        </div>

                        <div class="col-md-4">
                                        <div class="form-group row">
                                            {{Form::label('title','Waiting Time',['class'=>'col-md-7 col-form-label text-right'])}}
                                            <div class="col-md-5">
                                                {{Form::text('waiting_time','0.00',['class'=>'form-control calculate-me'])}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            {{Form::label('title','Service Charge',['class'=>'col-md-7 col-form-label text-right'])}}
                                            <div class="col-md-5">
                                                {{Form::text('service_charge','0.00',['class'=>'form-control calculate-me'])}}
                                            </div>
                                        </div>
                        </div>

                 <div class="col-md-4">
                            <div class="form-group row">
                                {{Form::label('title','Car Parking',['class'=>'col-md-7 col-form-label text-right'])}}
                                <div class="col-md-5">
                                    {{Form::text('car_park','0.00',['class'=>'form-control calculate-me'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('title','Total',['class'=>'col-md-7 col-form-label text-right strong-text'])}}
                                <div class="col-md-5">
                                    {{Form::text('total',null,['disabled' => 'disabled','class'=>'form-control','id' => 'booking-total','placeholder'=>'0.00'])}}
                                </div>
                            </div>
                 </div>


        </div><!-- row -->

<hr>

        <div class="row">
            <div class="col-md-6">
                            <div class="form-group row">
                                {{Form::label('Airport','Airport and Terminal',['class'=>'col-md-5 col-form-label text-right'])}}
                                <div class="col-md-7">
                                    {{Form::select('airport_id', $data['airports'], '0',['class'=>'form-control'])}}
                                </div>
                            </div>

                            <div class="form-group row">
                                {{Form::label('POI','POI',['class'=>'col-md-5 col-form-label text-right'])}}
                                <div class="col-md-7">
                                    {{Form::select('poi', $data['poi'], '',['placeholder'=>'select' ,'class'=>'form-control'])}}
                                </div>
                            </div>

                            <div class="form-group row">
                                {{Form::label('PC','PC',['class'=>'col-md-5 col-form-label text-right'])}}
                                <div class="col-md-7">
                                    {{Form::select('pc', $data['pc'], '',['class'=>'form-control','placeholder' => 'select'])}}
                                </div>
                            </div>

                            <div class="form-group row">
                                {{Form::label('payment_processed','Payment Processed',['class'=>'col-md-5 col-form-label text-right'])}}
                                <div class="col-md-7">
                                    {{Form::select('payment_processed', ['0' => 'No', '1' => 'Yes'], '0',['class'=>'form-control'])}}
                                </div>
                            </div>

                            <div class="form-group row">
                                {{Form::label('preferred_vehicle','Preferred Vehicle',['class'=>'col-md-5 col-form-label text-right'])}}
                                <div class="col-md-7">
                                    {{Form::select('vehicle_id', $data['vehicle'], null,['class'=>'form-control'])}}
                                </div>
                            </div>



                            <div class="form-group row">
                                {{Form::label('vehicle_info','Vehicle Info',['class'=>'col-md-5 col-form-label text-right'])}}
                                <div class="col-md-7">
                                    {{Form::text('vehicle_info',null,['class'=>'form-control'])}}
                                </div>
                            </div>

            </div><!-- 6 -->
            <div class="col-md-6">
                        <div class="form-group row">
                            {{Form::label('Passengers_Count','Number of Passengers',['class'=>'col-md-5 col-form-label text-right'])}}
                            <div class="col-md-7">
                                {{Form::number('passengers_count',1,['class'=>'form-control','min'=>1])}}
                            </div>
                        </div>

                        <div class="form-group row">
                            {{Form::label('comments','Instructions',['class'=>'col-md-5 col-form-label text-right'])}}
                            <div class="col-md-7">
                                {{Form::textarea('comments',' ',['class'=>'form-control','rows' => 5, 'cols' => 10])}}
                            </div>
                        </div>

                        <div class="form-group row">
                            {{Form::label('title','Flight Number',['class'=>'col-md-5 col-form-label text-right'])}}
                            <div class="col-md-7">
                                {{Form::text('flight_number','',['class'=>'form-control'])}}
                            </div>
                        </div>


                        <div class="form-group row">
                            {{Form::label('Driver Name','Driver Name',['class'=>'col-md-5 col-form-label text-right'])}}
                            <div class="col-md-7">
                                {{Form::select('driver_id', $data['driver'], null,['class'=>'form-control','placeholder'=>'please select'])}}
                            </div>
                        </div>

            </div><!-- 6 -->

        </div>


        <div class="form-group">
            {{Form::submit('Save Booking',['class'=>'btn btn-success pull-right btn-lg'])}}
        </div>
        {!! Form::close() !!}

    </div>
@endsection