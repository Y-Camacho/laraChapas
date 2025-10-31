<?php

namespace Database\Factories;

use App\Models\Collector;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Collector>
 */
class CollectorFactory extends Factory
{
    protected $model = Collector::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::where('rol', '!=', 'Admin')
            ->whereDoesntHave('collector')
            ->inRandomOrder()
            ->first();

        // Si no hay usuarios disponibles, retornamos null (para evitar error)
        if (!$user) {
            return [
                'user_id' => null,
            ];
        }

        return [
            'user_id' => $user->id,
        ];
    }
}
