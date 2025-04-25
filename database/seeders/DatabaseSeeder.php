<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\InvestmentPlan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => 'pass12345',
            'is_admin' => 1
        ]);

    //     $plans = [
    //         [
    //             'plan_id' => 'growth',
    //             'name' => 'Growth eREIT',
    //             'description' => 'Focused on capital appreciation with a target return of 8-12%',
    //             'minimum_investment' => 500,
    //             'risk_level' => 'Moderate to High',
    //             'focus' => 'Commercial real estate in growth markets',
    //             'target_return_min' => 8,
    //             'target_return_max' => 12,
    //             'active' => true,
    //         ],
    //         [
    //             'plan_id' => 'income',
    //             'name' => 'Income eREIT',
    //             'description' => 'Focused on generating consistent income with a target return of 5-8%',
    //             'minimum_investment' => 500,
    //             'risk_level' => 'Low to Moderate',
    //             'focus' => 'Stabilized, cash-flowing properties',
    //             'target_return_min' => 5,
    //             'target_return_max' => 8,
    //             'active' => true,
    //         ],
    //         [
    //             'plan_id' => 'balanced',
    //             'name' => 'Balanced eREIT',
    //             'description' => 'A mix of growth and income with a target return of 7-10%',
    //             'minimum_investment' => 1000,
    //             'risk_level' => 'Moderate',
    //             'focus' => 'Diversified portfolio of real estate assets',
    //             'target_return_min' => 7,
    //             'target_return_max' => 10,
    //             'active' => true,
    //         ],
    //     ];

    //     foreach ($plans as $plan) {
    //         InvestmentPlan::create($plan);
    //     }
    }
    
}