<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Penyelenggara;
use App\Models\Preorder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PreorderController extends Controller
{   

    function index(){
        $user = Auth::user();
        $username = $user->username;

        // Mendapatkan penyelenggara berdasarkan username
        $penyelenggara = Penyelenggara::where('username', $username)->first();

        if ($penyelenggara) {
            $id_penyelenggara = $penyelenggara->id_penyelenggara;
            
            // Mendapatkan data event yang dibuat oleh penyelenggara terkait
            $events = Event::where('id_penyelenggara', $id_penyelenggara)->get();
            
            // Mendapatkan semua pre-order dari event yang diselenggarakan oleh penyelenggara
            $preOrders = Preorder::whereIn('id_event', $events->pluck('id_event'))->get();

            // Mengirimkan data ke view
            return view('menu.pre-order', compact('preOrders'));
        } else {
            // Jika penyelenggara tidak ditemukan, kembali ke halaman sebelumnya dengan pesan error
            return redirect()->back()->withErrors(['error' => 'Penyelenggara tidak ditemukan']);
        }    
    }


    public function store(Request $request)
    {
        $data = [
            'id_customer' => $request->id_customer,
            'id_event' => $request->id_event
        ];

        //dd($data);

        Preorder::create($data);
        return redirect()->route('home.index');
    }
}
