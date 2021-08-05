<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sexe;

class SexeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!(Sexe::count())) {
          Sexe::insert([
            [
              'libelle' => "Homme",
            ],
            [
              'libelle' => "Femme",
            ],
          ]);
        }
    }
}
