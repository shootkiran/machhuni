<?php

namespace Database\Factories;

use App\Models\WorkCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Work>
 */
class WorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // //    $table->string('title');
        // $table->foreignId('work_category_id')->nullOnDelete();
        // $table->text('alternative_titles')->nullable();
        // $table->text('description')->nullable();
        return [
            'title' => $this->faker->unique()->jobTitle(),
            'work_category_id' => WorkCategory::all()->random()->id,
            'alternative_titles' => $this->faker->jobTitle(),
        ];
    }
}
