<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Pemenang;
use App\Models\Penyelenggara;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EOController extends Controller
{
    function index(){
        // Mendapatkan data pengguna yang sedang login
        $user = Auth::user();
        $username = $user->username;
    
        // Mendapatkan data penyelenggara berdasarkan username
        $penyelenggara = Penyelenggara::where('username', $username)->first();
        $id_penyelenggara = $penyelenggara->id_penyelenggara;
    
        // Mendapatkan data event yang dibuat oleh penyelenggara terkait
        $events = Event::where('id_penyelenggara', $id_penyelenggara)->get();
    
        $totalTicketsSold = 0;
        $totalRevenue = 0;
    
        foreach ($events as $event) {
            // Mendapatkan pemenang terkait dengan event ini
            $pemenang = Pemenang::where('id_event', $event->id_event)->get();
            
            foreach ($pemenang as $winner) {
                // Menghitung jumlah transaksi terkait dengan pemenang ini
                $ticketsSold = Transaksi::where('id_pemenang', $winner->id_pemenang)->count();
                $totalTicketsSold += $ticketsSold;
    
                // Menghitung pendapatan untuk event ini berdasarkan harga tiket
                $totalRevenue += $ticketsSold * $event->hrg_ticket;
            }
        }
    
        return view('admin.dashboardPenyelenggara', compact('events', 'totalTicketsSold', 'totalRevenue'));
    }
    
}
