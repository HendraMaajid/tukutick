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

    function show($id){
       $id_event = $id;
       //$event = Event::findOrFail($id_event);
       $winners = Pemenang::findOrFail($id_event);
       return view('pemenang.index', compact('winners'));
    }
}
