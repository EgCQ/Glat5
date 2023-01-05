<?php

namespace Database\Factories;

use App\Models\personas;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Personas>
 */
class PersonasFactory extends Factory
{

    protected $model = Personas::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->firstName();
        $lastname = $this->faker->lastName();
        $full_name = $name . $lastname;
        return [
            'nombres' => $name,
            'apellidos' => $lastname,
            'cedula' => fake()->unique(),
            'telefono' => fake()->unique(),
            'correo' => fake()->unique()->safeEmail(),
            'slug' => Str::slug($name, '-'),
            'fecha_nacimiento' => fake()->unique(),
            'id_user' => fake()->unique(),

        ];
    }
}
