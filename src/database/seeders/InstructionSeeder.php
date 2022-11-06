<?php

namespace Database\Seeders;

use App\Models\Instruction;
use Illuminate\Database\Seeder;
use Database\Factories\InstructionGroupFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InstructionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Instruction::factory(10)->create();
    }
}
