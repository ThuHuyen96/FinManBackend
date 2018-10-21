<?php

use Illuminate\Database\Seeder;
use App\Models\AreasModel;

class AreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AreasModel::create([
            'name'=>'A'
        ]);
        AreasModel::create([
            'name'=>'B'
        ]);
    }
}
