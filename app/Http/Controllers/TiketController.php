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
        $notifikasi = Pemenang::where('id_customer', $id_customer)->get();

        return view('tukutick.tiket', compact('notifikasi', 'id_customer'));
    }
}