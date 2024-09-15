<?php

namespace Database\Factories;

use App\Models\Malfunction;
use Illuminate\Database\Eloquent\Factories\Factory;

class MalfunctionFactory extends Factory
{
    protected $model = Malfunction::class;

    public function definition()
    {
        return [
            'machine_id' => \App\Models\Machine::factory(),
            'status_id' => \App\Models\Status::factory(),
            'user_id' => \App\Models\User::factory(),
            'description' => $this->faker->sentence,
            // andere velden toevoegen zoals date_finished indien nodig
        ];
    }
}
