<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Kategori;
use App\Models\Penyelenggara;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $event = Event::all();
        return view('event.index', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all(); // 
        $penyelenggara = Penyelenggara::all(); 

        return view('event.tambahevent', compact('kategori', 'penyelenggara'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_event' => 'required',
            'deskripsi_event' => 'required',
            'gambar' => 'required|image|mimes:jpeg,jpg,png',
            'jam_event' => 'required',       
            'tgl_event' => 'required',
            'lokasi' => 'required',
            'jml_ticket' => 'required',
            'hrg_ticket' => 'required',
            'status' => 'required',
            'id_kategori' => 'required',
            'id_penyelenggara' => 'required',
        ]);

        $image = $request->file('gambar');
        $image->storeAs('public/events', $image->hashName());

        $data = [
            'nama_event' => $request->input('nama_event'),
            'deskripsi_event' => $request->input('deskripsi_event'),
            'gambar' => $image->hashName(),
            'jam_event' => $request->input('jam_event'),
            'tgl_event' => $request->input('tgl_event'),
            'lokasi' => $request->input('lokasi'),
            'jml_ticket' => $request->input('jml_ticket'),
            'hrg_ticket' => $request->input('hrg_ticket'),
            'status' => $request->input('status'),
            'id_kategori' => $request->input('id_kategori'),
            'id_penyelenggara' => $request->input('id_penyelenggara'),
        ];

        Event::create($data);

        return redirect()->route('events.create')->with('success', 'Event created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::findOrFail($id);
        $kategori = Kategori::all(); 
        $penyelenggara = Penyelenggara::all(); 

        return view('event.edit', compact('event', 'kategori', 'penyelenggara'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_event' => 'required',
            'deskripsi_event' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,jpg,png',
            'jam_event' => 'required',       
            'tgl_event' => 'required',
            'lokasi' => 'required',
            'jml_ticket' => 'required',
            'hrg_ticket' => 'required',
            'status' => 'required',
            'id_kategori' => 'required',
            'id_penyelenggara' => 'required',
        ]);

        $event = Event::findOrFail($id);

        $data = [
            'nama_event' => $request->input('nama_event'),
            'deskripsi_event' => $request->input('deskripsi_event'),
            'jam_event' => $request->input('jam_event'),
            'tgl_event' => $request->input('tgl_event'),
            'lokasi' => $request->input('lokasi'),
            'jml_ticket' => $request->input('jml_ticket'),
            'hrg_ticket' => $request->input('hrg_ticket'),
            'status' => $request->input('status'),
            'id_kategori' => $request->input('id_kategori'),
            'id_penyelenggara' => $request->input('id_penyelenggara'),
        ];

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            Storage::delete('public/event/' . $event->gambar);

            // Simpan gambar baru
            $image = $request->file('gambar');
            $image->storeAs('public/events', $image->hashName());
            $data['gambar'] = $image->hashName();
        }

        $event->update($data);

        return redirect()->route('event.edit', $id)->with('success', 'Event updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
