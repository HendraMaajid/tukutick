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
     * Show the main page (landing for guests, home for authenticated users)
     */
    public function index()
    {
        $kategori = Kategori::all();
        $events = Event::all();
        $featuredEvents = Event::where('tgl_event', '>=', now())
            ->orderBy('tgl_event', 'asc')
            ->take(5)
            ->get();

        // If no featured events, use the nearest upcoming events
        if ($featuredEvents->isEmpty()) {
            $featuredEvents = Event::where('tgl_event', '>=', now())
                ->orderBy('tgl_event', 'asc')
                ->take(3)
                ->get();
        }

        // Prepare data for authenticated users
        $notifikasi = collect(); // Empty collection as default
        $id_customer = null;
        
        if (Auth::check()) {
            // User is logged in - get additional data for authenticated users
            $user = Auth::user();
            $username = $user->username;
            $customer = Customer::where('username', $username)->first();
            $id_customer = $customer->id_customer;
            $notifikasi = Pemenang::where('id_customer', $id_customer)
                ->where('status_transaksi', 'belum dibayar')
                ->get();
        }

        // Use single view for both authenticated and guest users
        return view('tukutick.home', compact('notifikasi', 'id_customer', 'events', 'kategori', 'featuredEvents'));
    }

    /**
     * Handle search functionality for both authenticated and guest users
     */
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

        // For non-AJAX requests, return the unified view
        $kategori = Kategori::all();

        // Prepare data for authenticated users
        $notifikasi = collect(); // Empty collection as default
        $id_customer = null;

        if (Auth::check()) {
            // User is authenticated
            $user = Auth::user();
            $username = $user->username;
            $customer = Customer::where('username', $username)->first();
            $id_customer = $customer->id_customer;
            $notifikasi = Pemenang::where('id_customer', $id_customer)
                ->where('status_transaksi', 'belum dibayar')
                ->get();
        }

        // Use single view for both authenticated and guest users
        return view('tukutick.home', compact('events', 'kategori', 'notifikasi', 'id_customer'))->with('scrollToEvent', true);
    }

    /**
     * Get all events (AJAX endpoint)
     */
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
        
        // Redirect to main page for non-AJAX requests
        return redirect()->route('home');
    }

    /**
     * Show user's tickets (only for authenticated users)
     */
    public function myTicket()
    {
        // Ensure user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        $username = $user->username;
        $customer = Customer::where('username', $username)->first();
        $id_customer = $customer->id_customer;
        $tiketku = Pemenang::where('id_customer', $id_customer)
            ->where('status_transaksi', 'sudah dibayar')
            ->get();

        return view('tukutick.tiket', compact('tiketku'));
    }
}