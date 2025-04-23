<?php

namespace Database\Factories;

use App\Models\InvestmentPlan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InvestmentPlan>
 */
class InvestmentPlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = InvestmentPlan::class;
    
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['Growth eREIT', 'Income eREIT', 'Balanced eREIT']),
            'description' => $this->faker->sentence,
            'minimum_investment' => $this->faker->randomElement([500, 1000, 5000]),
            'risk_level' => $this->faker->randomElement(['Low to Moderate', 'Moderate', 'Moderate to High']),
            'target_return' => $this->faker->randomElement(['5-8%', '7-10%', '8-12%']),
            'focus' => $this->faker->randomElement([
                'Commercial real estate in growth markets',
                'Stabilized, cash-flowing properties',
                'Diversified portfolio of real estate assets',
            ]),
        ];
    }
}