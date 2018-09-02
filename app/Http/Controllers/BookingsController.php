<?php

namespace App\Http\Controllers;

use App\Airports;
use App\Booking;
use App\PaymentMethod;
use App\Vehicle;
use App\Client;
use App\Driver;
use App\POI;
use App\PC;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function hoursRange( $lower = 0, $upper = 86400, $step = 3600, $format = '' ) {
        $times = array();

        if ( empty( $format ) ) {
            $format = 'g:i a';
        }

        foreach ( range( $lower, $upper, $step ) as $increment ) {
            $increment = gmdate( 'H:i', $increment );

            list( $hour, $minutes ) = explode( ':', $increment );

            $date = new DateTime( $hour . ':' . $minutes );

            $times[(string) $increment] = $date->format( $format );
        }

        return $times;
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //$bookings = Booking::orderBy('pickup_datetime','desc')->paginate(10);
        $bookings = DB::table('bookings')
            ->join('clients','bookings.client_id','=','bookings.client_id')
            ->select('bookings.booking_id','bookings.journey_from','bookings.journey_to','bookings.pickup_datetime','bookings.status','clients.firstname','clients.lastname')
            ->orderBy('bookings.pickup_datetime', 'desc')
            ->paginate(10);
        return view('bookings.list')->with('bookings',$bookings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {



        $data = [
            'airports' => Airports::all()->pluck('name','id'),
            'vehicle' => Vehicle::all()->pluck('full_name','vehicle_id'),
            'booking_sources' => array('1' => 'Our Website','2'=>'Telephone','3'=>'Email','4'=>'From client','5'=>'limos.com','6'=>'other'),
            'payment_method' => PaymentMethod::all()->pluck('name','id'),
            'client' => Client::all()->pluck('full_name','client_id'),
            'poi' => POI::all()->pluck('name','id'),
            'pc' => PC::all()->pluck('name','id'),
            'driver' => Driver::orderBy('lastname')->get()->pluck('full_name','id'),
            'hour'=> $this->hoursRange( 0, 86400, 60 * 15 )
        ];

        return view('bookings.create')->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'booking_source' => 'required',
            'client_id' => 'required',
            'payment_method' => 'required',
            'journey_from' => 'required',
            'journey_to' => 'required',
            'dateandtime_date' => 'required',
            'dateandtime_time' => 'required',
            'subtotal' => 'required',
            'congestion_charge' => 'required',
            'waiting_time' => 'required',
            'service_charge' => 'required',
            'car_park' => 'required',
            'vehicle_id' => 'required',
            'passengers_count' => 'required',
            'driver_id' => 'required',
        ]);

        //concat to create datetime value:
        $journey_date = $request->input('dateandtime_date');
        $journey_time = $request->input('dateandtime_time');
        $combinedDT = date('Y-m-d H:i:s', strtotime("$journey_date $journey_time"));

        if($request->input('is_return') == '1'){
            $return_journey_date = $request->input('return_dateandtime_date');
            $return_journey_time = $request->input('return_dateandtime_time');
            $combineRDT = date('Y-m-d H:i:s', strtotime("$return_journey_date $return_journey_time"));
        }else{
            $combineRDT = null;
        }

        //start saving
        $booking = new Booking();

        $booking->booking_source = $request->input('booking_source');
        $booking->reference = $request->input('reference');
        $booking->client_id = $request->input('client_id');
        $booking->payment_method_id = $request->input('payment_method');
        $booking->payment_processed = $request->input('payment_processed');
        $booking->journey_from = $request->input('journey_from');
        $booking->journey_to = $request->input('journey_to');
        $booking->is_return = $request->input('is_return');
        $booking->return_journey_date = $combineRDT;
        $booking->dropped_datetime = $combineRDT;
        $booking->instructions = $request->input('comments');
        $booking->pickup_datetime = $combinedDT;
        $booking->amount = $request->input('congestion_charge') + $request->input('car_park') + $request->input('waiting_time') + $request->input('service_charge') + $request->input('subtotal');
        $booking->toll_charges = $request->input('congestion_charge');
        $booking->charge_waiting = $request->input('waiting_time');
        $booking->charge_service = $request->input('service_charge');
        $booking->car_park = $request->input('car_park');
        $booking->charge_subtotal = $request->input('subtotal');
        $booking->airport_id = $request->input('airport_id');
        $booking->poi = $request->input('poi');
        $booking->pc = $request->input('pc');
        $booking->vehicle_id = $request->input('vehicle_id');
        $booking->vehicle_info = $request->input('vehicle_info');
        $booking->passengers_count = $request->input('passengers_count');
        $booking->flight_number = $request->input('	flight_number');
        $booking->driver_id = $request->input('driver_id');

        $booking->save();

        return redirect('/bookings')->with('success', 'new booking saved.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
