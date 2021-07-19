<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate(); //supprime dabord la bd

        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Auteur']);
        Role::create(['name' => 'Utilisateur']);
        Role::create(['name' => 'Livre']);
        Role::create(['name' => 'Logiciel']);
        Role::create(['name' => 'Epreuve']);
        Role::create(['name' => 'Premium']);
    }
}
