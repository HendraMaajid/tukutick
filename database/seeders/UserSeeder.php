<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Customer;
use App\Models\Penyelenggara;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Admin user
        User::create([
            'username' => 'adminuser',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);

        // Create Penyelenggara user
        User::create([
            'username' => 'penyelenggarauser',
            'email' => 'penyelenggara@example.com',
            'password' => Hash::make('12345678'),
            'role' => 'penyelenggara',
        ]);

        //Memasukkan ke tabel penyelenggara
        Penyelenggara::create([
            'nama_penyelenggara' => 'Musica',
            'email_penyelenggara' => 'penyelenggara@example.com',
            'alamat_kantor' => 'Lapangan Blater',
            'kontak' => '99999999',
            'lisensi' => null, //boleh null
            'username' => 'penyelenggarauser',
        ]);



        // Create Customer user
        $customerUser = User::create([
            'username' => 'customeruser',
            'email' => 'customer@example.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
        ]);

        // Create corresponding Customer entry
        Customer::create([
            'nama_customer' => 'Customer User',
            'email_customer' => 'customer@example.com',
            'tgl_lahir' => '1990-01-01',
            'no_hp_customer' => '081234567890',
            'alamat_customer' => 'Jl. Contoh No. 123',
            'username' => 'customeruser',
        ]);
    }
}
