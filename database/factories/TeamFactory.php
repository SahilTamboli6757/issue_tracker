<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $project = Project::inRandomOrder()->first();

        return [
            "name"=> fake()->unique()->name,
            "description" => fake()->unique()->paragraph(6),
            "project_id" => $project->id,
        ];
    }
}
