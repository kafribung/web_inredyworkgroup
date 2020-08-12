<?php

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    public function run()
    {
        $positions = ['	Anggota Aktif', 'Pengurus', 'Ketua', '	Anggota Demisioner'];
        for ($i = 0; $i < count($positions); $i++) {
            Position::create([
                'position' => $positions[$i]
            ]);
        }
    }
}
