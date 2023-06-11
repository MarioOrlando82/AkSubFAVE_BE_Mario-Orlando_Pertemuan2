<?php

namespace Database\Factories;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MenuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Menu::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($this->faker));
        $this->faker->addProvider(new \Xvladqt\Faker\LoremFlickrProvider($this->faker));
        return [
            'Name' => $this->faker->foodName(),
            'Description' => $this->faker->realText($maxNbChars = 100, $indexSize = 2),
            'Image' => $this->faker->image(storage_path('app/public/images'), 100, 100, ['pasta'], false),
        ];
    }
}
