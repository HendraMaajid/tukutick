<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Kategori;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function landing(){
        $kategori = Kategori::all();
        $events = Event::all();
        $featuredEvents = Event::where('tgl_event', '>=', now())
            ->orderBy('tgl_event', 'asc')
            ->take(5)  // Limit to 5 featured events
            ->get();

        return view('tukutick.landingpage', compact('kategori', 'events', 'featuredEvents'));

    }
    public function search(Request $request)
    {
        // Validate input
        $request->validate([
            'judul' => 'nullable|string|max:255',
            'kategori' => 'nullable|integer|exists:kategori,id_kategori',
            'tanggal' => 'nullable|date',
        ]);

        // Get data from form input
        $judul = $request->input('judul');
        $kategori = $request->input('kategori');
        $tanggal = $request->input('tanggal');

        // Start query for searching events
        $query = Event::query();

        // If all search fields are empty, return all events
        $hasSearchParams = !empty($judul) || !empty($kategori) || !empty($tanggal);
        
        // Add search conditions only if there are search parameters
        if (!empty($judul)) {
            $query->where('nama_event', 'like', '%' . $judul . '%');
        }

        if (!empty($kategori)) {
            $query->where('id_kategori', $kategori);
        }

        if (!empty($tanggal)) {
            $query->whereDate('tgl_event', $tanggal);
        }

        // Get search results
        $events = $query->orderBy('tgl_event', 'asc')->get();

        // Check if the request is an AJAX request
        if ($request->ajax() || $request->wantsJson()) {
            // Return JSON response with events data
            return response()->json([
                'success' => true,
                'events' => $events->map(function ($event) {
                    return [
                        'id_event' => $event->id_event,
                        'nama_event' => $event->nama_event,
                        'gambar' => asset('storage/events/' . $event->gambar),
                        'deskripsi_event' => \Illuminate\Support\Str::limit(strip_tags($event->deskripsi_event), 120),
                        'tgl_event_month' => \Carbon\Carbon::parse($event->tgl_event)->format('M'),
                        'tgl_event_day' => \Carbon\Carbon::parse($event->tgl_event)->format('d'),
                        'tgl_event_full' => \Carbon\Carbon::parse($event->tgl_event)->format('l, F j, Y'),
                        'route_show' => route('event.show', $event->id_event),
                    ];
                }),
                'total' => $events->count(),
            ]);
        }

        // For initial page load or non-AJAX requests, return the full view
        $kategori = Kategori::all();
        return view('tukutick.landingpage', compact('events', 'kategori'));
    }
    public function getAllEvents(Request $request)
    {
        $events = Event::orderBy('tgl_event', 'asc')->get();
        
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'events' => $events->map(function ($event) {
                    return [
                        'id_event' => $event->id_event,
                        'nama_event' => $event->nama_event,
                        'gambar' => asset('storage/events/' . $event->gambar),
                        'deskripsi_event' => \Illuminate\Support\Str::limit(strip_tags($event->deskripsi_event), 120),
                        'tgl_event_month' => \Carbon\Carbon::parse($event->tgl_event)->format('M'),
                        'tgl_event_day' => \Carbon\Carbon::parse($event->tgl_event)->format('d'),
                        'tgl_event_full' => \Carbon\Carbon::parse($event->tgl_event)->format('l, F j, Y'),
                        'route_show' => route('event.show', $event->id_event),
                    ];
                }),
                'total' => $events->count(),
            ]);
        }
        
        return redirect()->route('landing');
    }
}
