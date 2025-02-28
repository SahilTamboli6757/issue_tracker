<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\issue>
 */
class IssueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $assignedTo = User::inRandomOrder()->first();
        $assignedBy = User::inRandomOrder()->first();
        $reportedTo = User::inRandomOrder()->first();
        $raisedBy = User::inRandomOrder()->first();
        $creator = User::inRandomOrder()->first();


        return [
            'title'         => fake()->sentence(),
            'description'   => fake()->paragraph(5),
            'time_taken'    => fake()->numberBetween(1, 4),
            'time_required' => fake()->numberBetween(1, 4),
            'time_worked'   => fake()->numberBetween(1, 4),
            'status'        => fake()->numberBetween(1, 4),
            'assigned_to'   => $assignedTo->id,
            'assigned_by'   => $assignedBy->id,
            'reported_to'   => $reportedTo->id,
            'raised_by'     => $raisedBy->id,
            'creator_id'    => $creator->id,
        ];
    }
}
