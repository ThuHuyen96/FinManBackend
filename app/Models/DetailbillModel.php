<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailbillModel extends Model
{
     /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'detail_bills';

  protected $fillable = [
    'id',
    'bill_id',
    'drinks_id',
    'price',
    'preparation',
    'import'
  ];
}
