<?php
namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use App\Models\Pemenang;
use Illuminate\Support\Facades\Auth;

class TiketController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $username = $user->username;
        $customer = Customer::where('username', $username)->first();
        $id_customer = $customer->id_customer;
        
        // Ambil tiket yang sudah dibayar
        $tiketku = Pemenang::where('id_customer', $id_customer)
                          ->where('status_transaksi', 'sudah dibayar')
                          ->get();

        // Ambil notifikasi untuk navbar (yang belum dibayar)
        $notifikasi = Pemenang::where('id_customer', $id_customer)
                             ->where('status_transaksi', 'belum dibayar')
                             ->get();

        return view('tukutick.tiket', compact('notifikasi', 'id_customer','tiketku'));
    }

    public function show($id)
    {
        // Ambil data tiket berdasarkan id_pemenang (id)
        $tiket = Pemenang::findOrFail($id);

        // Tampilkan view dengan data tiket
        return view('tukutick.detailTiket', compact('tiket'));
    }
}