<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::where("email", "cell@gmail.com")->firstOrFail();

        $contact = new Contact();
        $contact->name = "Test Contact";
        $contact->email = "test@localhost";
        $contact->user_id = $user->id;
        $contact->save();
    }
}
