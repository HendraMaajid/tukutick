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


    public function store(Request $request)
    {
        $request->validate([
            'metode_pembayaran' => 'required',
            'id_pemenang' => 'required',
            'jml_transaksi' => 'required'
        ]);

        $data = [
            'metode_pembayaran' => $request->input('metode_pembayaran'),
            'id_pemenang' => $request->input('id_pemenang'),
            'jml_transaksi' => $request->input('jml_transaksi')
        ];

        //dd($data); // Anda bisa menggunakan dd untuk mengecek nilai $data

        // Jika validasi berhasil, lanjutkan dengan membuat transaksi
        Transaksi::create($data);


         // Mengambil objek Pemenang yang sesuai
        $pemenang = Pemenang::find($request->input('id_pemenang'));

        // Meng-update kolom status_pembayaran menjadi "sudah dibayar"
        $pemenang->update(['status_transaksi' => 'sudah dibayar']);
        
        return redirect()->route('home.index');
    }
}
