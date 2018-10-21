<?php

use Illuminate\Database\Seeder;
use App\Models\BillModel;
use Faker\Factory as Faker;

class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($item = 0; $item <5; $item++){

            BillModel::create([
                'table_id'=>$faker->numberBetween(0,10),
            ]);
        }
    }
}
