<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('event.tambahevent');
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
        event::create($data);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
