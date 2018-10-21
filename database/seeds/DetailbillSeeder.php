<?php

use Illuminate\Database\Seeder;
use App\Models\DetailbillModel;
use Faker\Factory as Faker;

class DetailbillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($item = 0; $item <10; $item++){
            $preparation = $faker->numberBetween(0,1);
            $price = $faker->numberBetween(10,20);
            $import = $price - 5;
            DetailbillModel::create([
                'bill_id'=>$faker->numberBetween(0,5),
                'drinks_id'=>$faker->numberBetween(0,10),
                'price'=>$price.'000',
                'preparation'=>$preparation,
                'import'=>$preparation === 1 ? $import.'000' : null
            ]);
        }
    }
}
