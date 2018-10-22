<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DrinksModel extends Model
{
    /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'drinks';

  protected $fillable = [
    'id',
    'name',
    'price',
    'preparation',
    'quantity',
    'images',
    'status',
  ];
  public function DetailBill () {
      return $this->hasMany('App\Models\DetailbillModel', 'drinks_id');
  }
}
