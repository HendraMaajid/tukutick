<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Pemenang;
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

        //dd($notifikasi);

        return view('tukutick.home', compact('notifikasi'));
    }

    public function myTicket()
    {
        $user = Auth::user();
        $username = $user->username;
        $customer = Customer::where('username', $username)->first();
        $id_customer = $customer->id_customer;
        $notifikasi = Pemenang::where('id_customer', $id_customer)->get();

        return view('tukutick.tiket', compact('notifikasi'));
    }
}