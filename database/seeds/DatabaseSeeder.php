<?php

use Illuminate\Database\Seeder;

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
        $this->call(TableSeeder::class);
        $this->call(DrinksSeeder::class);
        $this->call(AreasSeeder::class);
        $this->call(BillSeeder::class);
        $this->call(DetailbillSeeder::class);
    }
}
