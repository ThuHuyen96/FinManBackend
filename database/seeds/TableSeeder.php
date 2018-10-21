<?php

use Illuminate\Database\Seeder;
use App\Models\TableModel;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($item = 1; $item<=5; $item++){
            TableModel::create(['name'=>'A'.$item,'area'=>'1']);
        }
        for($item = 1; $item<=5; $item++){
            TableModel::create(['name'=>"B$item",'area'=>'2']);
        }
    }
}
