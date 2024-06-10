<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Kategori;
use App\Models\Penyelenggara;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {
        // Mengambil jumlah data dari tabel Kategori
        $jumlahKategori = Kategori::count();

        // Mengambil jumlah data dari tabel Customer
        $jumlahCustomer = Customer::count();

        // Mengambil jumlah data dari tabel Penyelenggara
        $jumlahPenyelenggara = Penyelenggara::count();

        // Mengirimkan data ke view
        return view('admin.dashboardAdmin', compact('jumlahKategori', 'jumlahCustomer', 'jumlahPenyelenggara'));
    }
}