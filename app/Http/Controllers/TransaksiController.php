<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Event;
use App\Models\Pemenang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    function index(){
        
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
