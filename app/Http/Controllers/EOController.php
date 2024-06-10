<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Pemenang;
use App\Models\Penyelenggara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EOController extends Controller
{
    function index(){
        //mendapatkan data tiket yang didapatkan oleh customer yang sedang login
        $user = Auth::user();
        $username = $user->username;
        //dd($username);
        $penyelenggara = Penyelenggara::where('username', $username)->first();
        //dd($customer);
        $id_penyelenggara = $penyelenggara->id_penyelenggara;
        //mendapatkan data event yang dibuat oleh penyelenggara terkait
        $event = Event::where('id_penyelenggara', $id_penyelenggara)->get();

        //dd($event);

        $totalTicketsSold = 0;
        $totalRevenue = 0;

        foreach ($event as $data) {
             // Menghitung jumlah tiket yang terjual untuk event ini
             $ticketsSold = Pemenang::where('id_event', $data->id_event)->count();
             $totalTicketsSold += $ticketsSold;
             
             // Menghitung pendapatan untuk event ini berdasarkan harga tiket
             $totalRevenue += $ticketsSold * $data->hrg_ticket;
        }

        
        return view('admin.dashboardPenyelenggara', compact('event', 'totalTicketsSold', 'totalRevenue'));
           
    }
}
