<?php

use Illuminate\Database\Seeder;
use App\Notification;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(Notification::class, 12)->create();
    }
}
