<?php

namespace Database\Factories;

use App\Models\Agent;
use App\Models\AgentLeave;
use Illuminate\Database\Eloquent\Factories\Factory;

class AgentLeaveFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AgentLeave::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'agent_id' => Agent::factory()->create()->id,
            'type' => $this->faker->randomElement(['healthy', 'yearly']),
            'date' =>  $this->faker->dateTimeThisYear()
        ];
    }
}
