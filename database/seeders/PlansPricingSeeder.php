<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PlansPricing;

class PlansPricingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = [
            [
                'name' => 'Monthly Plan',
                'price' => 500,
                'details' => '<ul>
                                <li>Feature 1</li>
                                <li>Feature 2</li>
                                <li>Feature 3</li>
                                <li>Feature 4</li>
                            </ul>',
                'duration' => 'month',
                'slug' => 'monthly-plan',
            ],
            [
                'name' => 'Yearly Plan',
                'price' => 1000,
                'details' => '<ul>
                                <li>Feature 1</li>
                                <li>Feature 2</li>
                                <li>Feature 3</li>
                                <li>Feature 4</li>
                            </ul>',
                'duration' => 'year',
                'slug' => 'Yearly-plan',
            ],
        ];

        foreach ($plans as $planData) {
            PlansPricing::create($planData);
        }
    }
}
