<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Pemenang;
use App\Models\Penyelenggara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemenangController extends Controller
{
    /*function index(){
        return view('pemenang.index');
    }*/

    function index(){
        $user = Auth::user();
        $username = $user->username;

        // Mendapatkan penyelenggara berdasarkan username
        $penyelenggara = Penyelenggara::where('username', $username)->first();

        if ($penyelenggara) {
            $id_penyelenggara = $penyelenggara->id_penyelenggara;

            // Mendapatkan data event yang dibuat oleh penyelenggara terkait
            $events = Event::where('id_penyelenggara', $id_penyelenggara)->get();

            // Mendapatkan semua pemenang dari event yang diselenggarakan oleh penyelenggara
            $pemenang = Pemenang::whereIn('id_event', $events->pluck('id_event'))->get();

            // Mengirimkan data ke view
            return view('menu.pemenang', compact('pemenang'));
        } else {
            // Jika penyelenggara tidak ditemukan, kembali ke halaman sebelumnya dengan pesan error
            return redirect()->back()->withErrors(['error' => 'Penyelenggara tidak ditemukan']);
        }
    }

    public function show($id)
    {
        // Asumsikan 'id' di sini adalah 'id_event' di model Pemenang
        $pemenang = Pemenang::where('id_event', $id)->get();

        $event = Event::find($id);

        //dd($event->nama_event);

        //dd($pemenang);

        return view('tukutick.pemenang', compact('pemenang', 'event'));
    }
}
