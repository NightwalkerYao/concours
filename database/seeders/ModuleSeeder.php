<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Module;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!(Module::count())) {
            Module::insert([
                [
                    'code' => "DB",
                    'nom' => "Bases de données",
                ],[
                    'code' => "RTEL",
                    'nom' => "Réseaux et Télécommunications",
                ],[
                    'code' => "STW",
                    'nom' => "Sécurité et Technologies du Web",
                ],[
                    'code' => "IA",
                    'nom' => "Intelligence artificielle",
                ],[
                    'code' => "DEV",
                    'nom' => "Développement d'applications",
                ],
            ]);
        }
    }
}
