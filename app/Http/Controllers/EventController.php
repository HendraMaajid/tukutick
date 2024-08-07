<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Event;
use App\Models\Kategori;
use App\Models\Penyelenggara;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        
        $user = Auth::user();
        $username = $user->username;
        
        $penyelenggara = Penyelenggara::where('username', $username)->first();
        
        $id_penyelenggara = $penyelenggara->id_penyelenggara;
        
        $event = Event::where('id_penyelenggara', $id_penyelenggara)->paginate(5);
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
            //'id_penyelenggara' => 'required',
        ]);

        $image = $request->file('gambar');
        $image->storeAs('public/events', $image->hashName());


        //mendapatkan id_penyelenggara yang sedang login
        $user = Auth::user();
        $username = $user->username;
        $penyelenggara = Penyelenggara::where('username', $username)->first();
        $id_penyelenggara = $penyelenggara->id_penyelenggara;

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
            'id_penyelenggara' => $id_penyelenggara,
        ];

        //dd($data);

        Event::create($data);

        return redirect()->route('event.index')->with('success', 'Event created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::find($id);
        $event->tgl_event = Carbon::parse($event->tgl_event);
        $event->jam_event = Carbon::parse($event->jam_event);

        $hasPreordered = false;
        $customer = null;

        if (!Auth::guest()) {
            $user = Auth::user();
            $username = $user->username;
            $customer = Customer::where('username', $username)->first();

            if ($customer) {
                $hasPreordered = $customer->preorder()->where('id_event', $id)->exists();
            }
        }

        return view('tukutick.detailEvent', compact('event', 'customer', 'hasPreordered'));
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
            //'id_penyelenggara' => 'required',
        ]);

        $event = Event::findOrFail($id);

        //mendapatkan id_penyelenggara yang sedang login
        $user = Auth::user();
        $username = $user->username;
        $penyelenggara = Penyelenggara::where('username', $username)->first();
        $id_penyelenggara = $penyelenggara->id_penyelenggara;

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
            'id_penyelenggara' => $id_penyelenggara,
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

        return redirect()->route('event.index')->with('success', 'Event updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);

        // Hapus gambar dari storage
        Storage::delete('public/events/' . $event->gambar);

        // Hapus event dari database
        $event->delete();

        return redirect()->route('event.index')->with('success', 'Event deleted successfully.');
    }

    public function home(){
        $events = Event::all();
        return view('tukutick.home', compact('events'));
    }

    public function landing(){
        $events = Event::all();
        return view('tukutick.landingpage', compact('events'));
    }
}