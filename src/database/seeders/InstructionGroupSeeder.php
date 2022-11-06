<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InstructionGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InstructionGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InstructionGroup::factory(10)->create();
    }
}
