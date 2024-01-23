<?php

namespace Database\Seeders;

use App\Models\TypeActivity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Mockery\Matcher\Type;

class TypeActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      TypeActivity::insert([
        ['description' => 'REPARACIÓN'],
        ['descriPtion' => 'CONSTRUCCIÓN'],
        ['description' => 'INSTALACIÓN'],
        ['description' => 'SUSPENSIÓN'],
        ['description' => 'OTROS'],
      ]);
    }
}
