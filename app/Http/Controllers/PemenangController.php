<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Pemenang;
use Illuminate\Http\Request;

class PemenangController extends Controller
{
    /*function index(){
        return view('pemenang.index');
    }*/

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
