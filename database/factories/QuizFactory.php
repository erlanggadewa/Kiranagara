<?php

namespace Database\Factories;

use App\Models\Quiz;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuizFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array
   */

  protected $model = Quiz::class;

  public function definition()
  {
    return [
      'level' => Arr::random(['easy']),
      'question' => $this->faker->paragraph(),
      'option_1' => $this->faker->sentence(),
      'option_2' => $this->faker->sentence(),
      'option_3' => $this->faker->sentence(),
      'option_4' => $this->faker->sentence(),
      'correct_option' => Arr::random(['A', 'B', 'C', 'D']),
      "img" => 'no-img.png'

    ];
  }
}
