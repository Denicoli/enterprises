<?php

use App\Models\Enterprise;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create()->each(function ($user) {
            factory(Enterprise::class, 5)->create(['user_id' => $user->id]);
        });
    }
}
