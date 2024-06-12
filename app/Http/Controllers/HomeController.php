<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Event;
use App\Models\Kategori;
use App\Models\Pemenang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //mendapatkan data tiket yang didapatkan oleh customer yang sedang login
        $user = Auth::user();
        $username = $user->username;
        //dd($username);
        $customer = Customer::where('username', $username)->first();
        //dd($customer);
        $id_customer = $customer->id_customer;
        //dd($id_customer);
        $notifikasi = Pemenang::where('id_customer', $id_customer)->get();

        $events = Event::all();
       // return view('tukutick.landingpage', compact('events'));
       $kategori = Kategori::all();



        return view('tukutick.home', compact('notifikasi', 'id_customer', 'events', 'kategori'));
    }

    public function myTicket()
    {
        $user = Auth::user();
        $username = $user->username;
        $customer = Customer::where('username', $username)->first();
        $id_customer = $customer->id_customer;
        $tiketku = Pemenang::where('id_customer', $id_customer)->where('status_transaksi', 'sudah dibayar')->get();

        return view('tukutick.tiket', compact('tiketku'));
    }


    public function search(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'nullable|string|max:255',
            'kategori' => 'nullable|integer|exists:kategori,id_kategori',
            'tanggal' => 'nullable|date',
        ]);

        // Ambil data dari input form
        $judul = $request->input('judul');
        $kategori = $request->input('kategori');
        $tanggal = $request->input('tanggal');

        // Mulai query untuk mencari event
        $query = Event::query();

        if ($judul) {
            $query->where('nama_event', 'like', '%' . $judul . '%');
        }

        if ($kategori) {
            $query->where('id_kategori', $kategori);
        }

        if ($tanggal) {
            $query->whereDate('tgl_event', $tanggal);
        }

        // Dapatkan hasil pencarian
        $events = $query->get();


        $user = Auth::user();
        $username = $user->username;
        //dd($username);
        $customer = Customer::where('username', $username)->first();
        //dd($customer);
        $id_customer = $customer->id_customer;
        //dd($id_customer);
        $notifikasi = Pemenang::where('id_customer', $id_customer)->get();

        // return view('tukutick.landingpage', compact('events'));
        $kategori = Kategori::all();


        // Kembalikan view dengan hasil pencarian
        return view('tukutick.home', compact('events', 'kategori', 'notifikasi', 'id_customer'));
    }
}