<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportFactory extends Factory

{
    public function definition()
    {
        $faker = \Faker\Factory::create();
        return [
            'number' => $faker->numerify('aaa-###'),
            'description' => $faker->paragraph,
            'created_at' => $faker->dateTimeBetween('-1 week', 'now'),
            'status_id' => 1
        ];
    }
}
