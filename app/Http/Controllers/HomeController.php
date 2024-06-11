<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Event;
use App\Models\Pemenang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //mendapatkan data tiket yang didapatkan oleh customer yang sedang login
        $user = Auth::user();
        $username = $user->username;
        //dd($username);
        $customer = Customer::where('username', $username)->first();
        //dd($customer);
        $id_customer = $customer->id_customer;
        //dd($id_customer);
        $notifikasi = Pemenang::where('id_customer', $id_customer)->get();

        $events = Event::all();
       // return view('tukutick.landingpage', compact('events'));



        return view('tukutick.home', compact('notifikasi', 'id_customer', 'events'));
    }

    public function myTicket()
    {
        $user = Auth::user();
        $username = $user->username;
        $customer = Customer::where('username', $username)->first();
        $id_customer = $customer->id_customer;
        $tiketku = Pemenang::where('id_customer', $id_customer)->where('status_transaksi', 'sudah dibayar')->get();

        return view('tukutick.tiket', compact('tiketku'));
    }
}