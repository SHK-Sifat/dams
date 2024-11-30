<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Auth;

class SetupSeeder extends Seeder{
    /**
     * Run the database seeds.
     */
    public function run(): void{
      //user create seeder
      DB::table('users')->insert([
            'name' =>'Sifat Khan',
            'phone' =>'01781705044',
            'email' =>'sifat@gmail.com',
            'username' =>'sifat',
            'password' => Hash::make('12345678'),
            'role' =>1,
            'slug' =>'U'.uniqid(20),
            'created_at' =>Carbon::now()->toDateTimeString(),
        ]);

        //user role create seeder
      $roles=['Superadmin','Admin','Doctor','Receptionist','Patient'];
      foreach($roles as $role){
        DB::table('roles')->insert([
          'role_name' =>$role,
          'role_slug' =>'R'.uniqid(20),
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
      }

    }
}
