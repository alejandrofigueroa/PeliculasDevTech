<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'usuario' => 'administrador',
            'password' => Hash::make('admi2021'),
            'email' => 'alefigueroa416@gmail.com',
            'telefono' => '7634-3241',
            'rol' => 'administrador',
            'estado_cuenta' => 0,
            'email_verified_at' => Carbon::now()->toDateTimeString()
        ]);
    }
}
