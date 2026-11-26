<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use RuntimeException;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $name = config('selor.admin.name');
        $email = config('selor.admin.email');
        $password = config('selor.admin.password');

        if (! is_string($name) || trim($name) === '') {
            throw new RuntimeException('Set ADMIN_NAME in the environment before seeding the admin account.');
        }

        if (! is_string($email) || filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new RuntimeException('Set a valid ADMIN_EMAIL in the environment before seeding the admin account.');
        }

        if (! is_string($password) || $password === '') {
            throw new RuntimeException('Set ADMIN_PASSWORD in the environment before seeding the admin account.');
        }

        User::query()->updateOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'password' => $password,
            ],
        );
    }
}
