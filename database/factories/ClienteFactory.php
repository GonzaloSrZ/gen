<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    //protected $model = Cliente::class;

     public function definition()
    {
        return [// Defino columnas y formato de datos a generar
            'dni'=>$this->faker->randomNumber(),
            'nombre'=>$this->faker->name(),
            'apellido'=>$this->faker->name(),
            'domicilio'=>$this->faker->address(),
            'localidad'=>$this->faker->city(),
            'provincia'=>$this->faker->city(),
            'telefono_1'=>$this->faker->phoneNumber(),
        ];
    }

}
