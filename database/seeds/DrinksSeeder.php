<?php

use Illuminate\Database\Seeder;
// use Faker\Generator as Faker;
use Faker\Factory as Faker;
use App\Models\DrinksModel;

class DrinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        //$faker = new Faker\Generator();
        for($item = 0; $item <10; $item++){
            $preparation = $faker->numberBetween(0,1);
            $price = $faker->numberBetween(10,20);
            $import = $price - 5;
            DrinksModel::create([
                'name' => $faker->name,
                'price'=>$price.'000',
                'status'=> 1,
                'preparation'=> $preparation,
                'quantity'=>$preparation === 1 ? 20 : null,
                'import'=>$preparation === 1 ? $import.'000' : null
            ]);
        }
    }
}
