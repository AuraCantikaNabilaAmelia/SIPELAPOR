<?php

namespace Database\Factories;

use App\Models\Sekolah;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Sekolah>
 */
class SekolahFactory extends Factory
{
    protected $model = Sekolah::class;

    public function definition(): array
    {
        return [
            'npsn' => $this->faker->unique()->numerify('999#####'),
            'nss' => $this->faker->numerify('##########'),
            'nama' => 'SD Negeri '.$this->faker->unique()->city().' 01',
            'dabin' => 'Dabin '.$this->faker->randomElement(['I', 'II', 'III', 'IV']),
            'alamat' => $this->faker->address(),
            'kecamatan' => 'Gunungwungkal',
        ];
    }
}
