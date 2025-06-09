<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Event;
use App\Models\Pemenang;
use App\Models\Penyelenggara;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
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

            // Mendapatkan semua pemenang dari event yang diselenggarakan oleh penyelenggara
            $pemenang = Pemenang::whereIn('id_event', $events->pluck('id_event'))->get();

            // Mendapatkan semua transaksi yang terkait dengan pemenang
            $transaksi = Transaksi::whereIn('id_pemenang', $pemenang->pluck('id_pemenang'))->get();

            // Mengirimkan data ke view
            return view('menu.transaksi', compact('transaksi'));
        } else {
            // Jika penyelenggara tidak ditemukan, kembali ke halaman sebelumnya dengan pesan error
            return redirect()->back()->withErrors(['error' => 'Penyelenggara tidak ditemukan']);
        }
    }

    function show($transaksi){
        // Mengambil id_pemenang
        $id_pemenang = $transaksi;
    
        // Mengambil data pemenang terkait
        $pemenang = Pemenang::where('id_pemenang', $id_pemenang)->first();
        if (!$pemenang) {
            return redirect()->route('home.index')->with('error', 'Pemenang tidak ditemukan');
        }
        
        // Mengambil id_event dari pemenang
        $id_event = $pemenang->id_event;
        
        // Mengambil data event terkait
        $event = Event::where('id_event', $id_event)->first();
        if (!$event) {
            return redirect()->route('home.index')->with('error', 'Event tidak ditemukan');
        }
    
        // Mengambil data user
        $user = Auth::user();
        $username = $user->username;
        $customer = Customer::where('username', $username)->first();
        if (!$customer) {
            return redirect()->route('home.index')->with('error', 'Customer tidak ditemukan');
        }
    
        return view('tukutick.pembayaran', compact('event', 'customer', 'id_pemenang'));
    }


    public function generateSnapToken(Request $request)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $request->input('jml_transaksi'),
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return response()->json(['snap_token' => $snapToken]);
    }

    public function store(Request $request) 
    {
        $request->validate([
            'id_pemenang' => 'required',
            'jml_transaksi' => 'required',
            'snap_token' => 'required'
        ]);

        $data = [
            'id_pemenang' => $request->input('id_pemenang'),
            'jml_transaksi' => $request->input('jml_transaksi'),
            'snap_token' => $request->input('snap_token')
        ];

        // Simpan transaksi dan dapatkan instance yang baru dibuat
        $transaksi = Transaksi::create($data);

        // Update pemenang dengan id_transaksi yang pasti benar
        $pemenang = Pemenang::find($request->input('id_pemenang'));
        $pemenang->update([
            'status_transaksi' => 'sudah dibayar',
            'id_transaksi' => $transaksi->id_transaksi  // Gunakan id dari instance yang baru dibuat
        ]);

        return redirect()->route('home.index');
    }
}
