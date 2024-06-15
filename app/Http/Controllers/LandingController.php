<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Kategori;
use Illuminate\Http\Request;

class LandingController extends Controller
{
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


       
        $kategori = Kategori::all();


        // Kembalikan view dengan hasil pencarian
        return view('tukutick.landingpage', compact('events', 'kategori'));
    }
}
