<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Pemenang;
use App\Models\Preorder;
use Illuminate\Http\Request;

class GachaController extends Controller
{
    public function store($id_event, $jml_ticket, $jml_po)
    {
        // Ambil data event
        $event = Event::findOrFail($id_event);

        // Mendapatkan data hasil Gatcha
        if ($jml_ticket > $jml_po) {
            $hasilGatcha = Preorder::inRandomOrder()->limit($jml_po)->get();
        } else {
            $hasilGatcha = Preorder::inRandomOrder()->limit($jml_ticket)->get();
        }

        // Hitung jumlah tiket yang tersisa
        $tiket_tersisa = $event->jml_ticket - count($hasilGatcha);

        // Update jumlah tiket pada event
        $event->update(['jml_ticket' => $tiket_tersisa]);

        // Simpan data pemenang ke dalam tabel pemenangModel
        foreach ($hasilGatcha as $gatcha) {
            $data = [
                'id_event' => $id_event,
                'id_customer' => $gatcha->id_customer,
                'status_pembayaran' => 'belum dibayar'
            ];

            Pemenang::create($data);
        }

        return redirect()->route('penyelenggara.index');
    }
}
