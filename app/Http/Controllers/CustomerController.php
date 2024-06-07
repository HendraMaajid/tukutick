<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function edit(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view('tukutick.profile', compact('customer'));
    }

    public function update(Request $request, string $id)
    {
        // $request->validate([
        //     'nama_kategori' => 'required'
        // ]);
        // $kategori = Kategori::findOrFail($id);
        // $kategori->update($request->all());
        // return redirect()->route('kategori.index')
        //     ->with('success', 'Kategori berhasil diupdate.');

    }
}