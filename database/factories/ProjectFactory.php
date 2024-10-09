<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Random\RandomException;

/**
 * @extends Factory<Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws RandomException
     */
    public function definition(): array
    {
        return [
            'title' => collect(fake()->words(5))->join(' '),
            'description' => 'AQUI VAI O CONTEÚDO DA NOTICIA, FOI INSERIDO UM TEXTO ALEATORIO VIA FACTORY.',
            'ends_at' => fake()->dateTimeBetween('now', '+ 3 days'),
            'status' => fake()->randomElement(['open', 'closed']),
            'tech_stack' => fake()->randomElements(['js', 'nextjs', 'nodejs', 'react', 'vite'], random_int(1, 5)),
            'created_by' => User::factory(),
        ];
    }
}
