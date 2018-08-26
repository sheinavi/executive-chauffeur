<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Driver;
use DB;

class DriversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::orderBy('lastname','asc')->paginate(10);
        return view('pages.drivers')->with('drivers',$drivers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('drivers.create');
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
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required'
        ]);

        $driver = new Driver();
        $driver->firstname = $request->input('firstname');
        $driver->lastname = $request->input('lastname');
        $driver->email = $request->input('email');
        $driver->photo = 'Temp value';
        $driver->phone = $request->input('phone');
        $driver->save();

        return redirect('/drivers')->with('success', $driver->firstname.' '.$driver->lastname.'\'s details saved.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $driver = Driver::find($id);
        return view('drivers.show')->with('driver',$driver);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $driver = Driver::find($id);
        return view('drivers.edit')->with('driver',$driver);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required'
        ]);

        $driver = Driver::find($id);
        $driver->firstname = $request->input('firstname');
        $driver->lastname = $request->input('lastname');
        $driver->email = $request->input('email');
        $driver->photo = 'Temp value';
        $driver->phone = $request->input('phone');
        $driver->save();

        return redirect('/drivers')->with('success', $driver->firstname.' '.$driver->lastname.'\'s details updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
