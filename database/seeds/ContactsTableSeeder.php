<?php

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('contact')->truncate();

      DB::table('contact')->insert([
       [
         'id'		=> 1,
         'nama'	=> 'Pondok Informatika Al Madinah',
         'telepon'	=> '+62 85378456213',
         'email'	=> 'adminweb@gmail.com',
         'alamat'	=> 'jl. krapyak deket masjid widi khasanan',
       ],
      ]);
    }
}
