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
        //dd($id_event, $jml_ticket, $jml_po);

        // Cek apakah ada preorder untuk event ini
        if ($jml_po == 0) {
            return redirect()->back()->with('error', 'Belum ada yang melakukan preorder untuk event ini.');
        }

        // Ambil data event
        $event = Event::findOrFail($id_event);

        // Ambil ID customer yang sudah menang di event ini
        $customer_sudah_menang = Pemenang::where('id_event', $id_event)
                                        ->pluck('id_customer')
                                        ->toArray();

        // Mendapatkan data hasil Gacha dengan mengecualikan customer yang sudah menang
        $query = Preorder::whereNotIn('id_customer', $customer_sudah_menang)
                        ->inRandomOrder();

        // Tentukan limit berdasarkan kondisi
        if ($jml_ticket > $jml_po) {
            $hasilGatcha = $query->limit($jml_po)->get();
        } else {
            $hasilGatcha = $query->limit($jml_ticket)->get();
        }

        // Cek apakah jumlah preorder yang tersedia mencukupi
        $jumlah_preorder_tersedia = Preorder::whereNotIn('id_customer', $customer_sudah_menang)->count();
        $jumlah_yang_dibutuhkan = ($jml_ticket > $jml_po) ? $jml_po : $jml_ticket;

        if ($jumlah_preorder_tersedia < $jumlah_yang_dibutuhkan) {
            // Handle jika tidak ada cukup customer yang bisa menang
            return redirect()->back()->with('error', 'Tidak ada cukup customer yang memenuhi syarat untuk gacha ini. Customer yang tersedia: ' . $jumlah_preorder_tersedia . ', dibutuhkan: ' . $jumlah_yang_dibutuhkan);
        }

        // Hitung jumlah tiket yang tersisa
        $tiket_tersisa = $event->jml_ticket - count($hasilGatcha);

        // Simpan data pemenang ke dalam tabel pemenang
        foreach ($hasilGatcha as $gatcha) {
            $data = [
                'id_event' => $id_event,
                'id_customer' => $gatcha->id_customer,
                'status_transaksi' => 'belum dibayar'
            ];

            //dd($data);

            Pemenang::create($data);
        }

        // Update jumlah tiket pada event
        $event->update(['jml_ticket' => $tiket_tersisa]);

        return redirect()->route('pemenang.index')->with('success', 'Gacha berhasil! ' . count($hasilGatcha) . ' pemenang baru telah dipilih.');
    }
}