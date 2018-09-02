<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getHome(){
        return view('pages.home');
    }

    public function getManageBookings(){
        return view('pages.manageBookings');
    }

    public function getConfirmedBookings(){
        return view('pages.confirmedBookings');
    }

    public function getCompletedBookings(){
        return view('pages.completedBookings');
    }

    /*public function getClients(){
        return view('pages.clients');
    }*/

    public function getReminders(){
        return view('pages.reminders');
    }

    public function getReports(){
        return view('pages.reports');
    }

    public function getInvoice(){
        return view('pages.invoice');
    }


}//end of class