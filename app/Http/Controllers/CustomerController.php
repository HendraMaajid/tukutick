<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    function index(){
        $customers = Customer::all();

        return view('menu.customers', compact('customers'));
    }


    public function edit(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view('tukutick.profile', compact('customer'));
    }

    public function update(Request $request, string $id)
    {
        // Validate the request
        $request->validate([
            'nama_customer' => 'required',
            'tgl_lahir' => 'required|date',
            'username' => 'required',
            'profile_picture' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'email_customer' => 'required|email',
        ]);

        // Find the customer
        $customer = Customer::findOrFail($id);

        // Find the related user using the username from the Customer table
        $user = User::where('username', $customer->username)->firstOrFail();

        // Update the User table
        $user->username = $request->input('username');
        $user->email = $request->input('email_customer');

        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            // Delete the old profile picture if it exists
            if ($user->profile_picture && Storage::exists('public/profile_pictures/' . $user->profile_picture)) {
                Storage::delete('public/profile_pictures/' . $user->profile_picture);
            }

            // Upload the new profile picture
            $file = $request->file('profile_picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/profile_pictures', $filename);

            // Update the profile_picture field
            $user->profile_picture = $filename;
        }

        // Save the updated user
        $user->save();

        // Update the Customer table
        $customer->update([
            'nama_customer' => $request->input('nama_customer'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'username' => $request->input('username'),
            'email_customer' => $request->input('email_customer'),
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Data berhasil diubah');
    }
}