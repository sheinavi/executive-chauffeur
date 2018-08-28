<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Driver;
use DB;

class DriversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
            'email' => 'required',
            'phone' => 'required',
            'photo' => 'image|nullable|max:1999'
        ]);

        //handle file upload
        if($request->hasFile('photo')){
            //Get filename with extension
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

            $extension = $request->file('photo')->getClientOriginalExtension();

            //filenametostore
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('photo')->storeAs('public/img/drivers',$fileNameToStore);

        }else{
            $fileNameToStore = 'no-photo.png';
        }

        $driver = new Driver();
        $driver->firstname = $request->input('firstname');
        $driver->lastname = $request->input('lastname');
        $driver->email = $request->input('email');
        $driver->photo = $fileNameToStore;
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
            'email' => 'required',
            'phone' => 'required',
            'photo' => 'image|nullable|max:1999'
        ]);



        $driver = Driver::find($id);
        $driver->firstname = $request->input('firstname');
        $driver->lastname = $request->input('lastname');
        $driver->email = $request->input('email');
        $driver->phone = $request->input('phone');

        //handle file upload
        if($request->hasFile('photo')){
            //Get filename with extension
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

            $extension = $request->file('photo')->getClientOriginalExtension();

            //filenametostore
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('photo')->storeAs('public/img/drivers',$fileNameToStore);
            $driver->photo = $fileNameToStore;
        }

        $driver->save();

        return redirect('/drivers/'.$id.'/edit')->with('success', $driver->firstname.' '.$driver->lastname.'\'s details updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driver = Driver::find($id);

        if($driver->photo != 'no-photo.png'){
            Storage::delete('public/img/drivers/'.$driver->photo);
        }

        $driver->delete();
        return redirect('/drivers')->with('success', 'driver deleted');
    }
}