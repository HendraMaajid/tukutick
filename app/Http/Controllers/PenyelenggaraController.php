<?php

namespace App\Http\Controllers;

use App\Models\Penyelenggara;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PenyelenggaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penyelenggara = Penyelenggara::all();
        return view('penyelenggara.index', compact('penyelenggara'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penyelenggara.tambahpenyelenggara');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate form inputs
        $request->validate([
            'username' => 'required|unique:users',
            'email_penyelenggara' => 'required|email|unique:users,email',
            'password' => 'required',
            'nama_penyelenggara' => 'required',
            'alamat_kantor' => 'required',
            'lisensi' => 'required|file|mimes:pdf',
            'kontak' => 'required',
        ], [
            'username.unique' => 'Username telah terdaftar.',
            'email_penyelenggara.unique' => 'Email telah terdaftar.',
        ]);

        $lisensi = $request->file('lisensi');
        $lisensi->storeAs('public/lisensi', $lisensi->hashName());

        // Extract data for insertion into users table
        $userData = [
            'username' => $request->input('username'),
            'email' => $request->input('email_penyelenggara'),
            'password' => Hash::make($request->input('password')),
            'role' => 'penyelenggara',
        ];

        // Extract data for insertion into penyelenggara table
        $penyelenggaraData = [
            'nama_penyelenggara' => $request->input('nama_penyelenggara'),
            'email_penyelenggara' => $request->input('email_penyelenggara'),
            'alamat_kantor' => $request->input('alamat_kantor'),
            'kontak' => $request->input('kontak'),
            'lisensi' => $lisensi->hashName(),
            'username' => $request->input('username'),
        ];

        try {
            // Attempt to create a new user and penyelenggara
            User::create($userData);
            Penyelenggara::create($penyelenggaraData);

            // Redirect with success message
            return redirect()->route('penyelenggara.index')->with('success', 'Penyelenggara berhasil disimpan.');
        } catch (\Exception $e) {
            // If there's an error, redirect back with error message
            return redirect()->back()->withInput()->withErrors(['error' => 'Terjadi kesalahan. Silakan coba lagi.']);
        }
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
        $penyelenggara = Penyelenggara::findOrFail($id);

        return view('penyelenggara.edit', compact('penyelenggara'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $penyelenggara = Penyelenggara::findOrFail($id);

        $request->validate([
            'nama_penyelenggara' => 'required',
            'alamat_kantor' => 'required',
            'lisensi' => '',
            'kontak' => 'required',
        ]);


        $data = ([
            'nama_penyelenggara' => $request->input('nama_penyelenggara'),
            'alamat_kantor' => $request->input('alamat_kantor'),
            'kontak' => $request->input('kontak'),
        ]);

        if ($request->hasFile('lisensi')) {
            // Hapus gambar lama
            Storage::delete('public/lisensi/' . $penyelenggara->lisensi);

            // Simpan gambar baru
            $lisensi = $request->file('lisensi');
            $lisensi->storeAs('public/lisensi', $lisensi->hashName());
            $data['lisensi'] = $lisensi->hashName();
        }

        $penyelenggara->update($data);

        return redirect()->route('penyelenggara.index')->with('success', 'Penyelenggara updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $penyelenggara = Penyelenggara::findOrFail($id);
        $penyelenggara->delete();

        return redirect()->route('penyelenggara.index')->with('success', 'Penyelenggara berhasil dihapus');
    }

}
