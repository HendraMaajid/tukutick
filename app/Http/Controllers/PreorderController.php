<?php

namespace App\Http\Controllers;

use App\Models\Preorder;
use Illuminate\Http\Request;

class PreorderController extends Controller
{
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
