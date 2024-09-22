<?php

namespace Database\Factories;
use App\Models\Project;
use App\Models\tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->sentence,
            'image' => $this->faker->sentence,
            'tag_id' => tag::inRandomOrder()->first()->id,
            // andere velden toevoegen zoals date_finished indien nodig
        ];
    }
}
