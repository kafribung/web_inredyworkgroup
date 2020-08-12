<?php

use App\Models\Concentration;
use Illuminate\Database\Seeder;

class ConcentrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $concentrations = ['Jaringan', 'Web Developer', 'Desain', 'Android Developer'];

        foreach ($concentrations as $concentration) {
            Concentration::create([
                'concentration' => $concentration
            ]);
        }
    }
}
