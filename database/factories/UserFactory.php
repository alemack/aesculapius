<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    const GENDER_MALE = 'male';
    const GENDER_FEMALE = 'female';

    protected $model = User::class;

    public function definition()
{
    $name = $this->faker->name;
    $nameParts = explode(' ', $name);

    return [
        'name' => $name,
        'email' => strtolower(str_replace(' ', '.', $name)) . '@mail.com',
        'role' => 'user',
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        'remember_token' => Str::random(10),
    ];
}


    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    public function male()
    {
        return $this->state(function (array $attributes) {
            $name = $this->faker->firstNameMale;
            $surname = $this->faker->lastName;

            return [
                'name' => "$surname $name",
                'gender' => self::GENDER_MALE,
            ];
        });
    }

    public function female()
    {
        return $this->state(function (array $attributes) {
            $name = $this->faker->firstNameFemale;
            $surname = $this->faker->lastName;

            return [
                'name' => "$surname $name",
                'gender' => self::GENDER_FEMALE,
            ];
        });
    }
}
