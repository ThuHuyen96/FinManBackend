<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillModel extends Model
{
    /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'bills';

  protected $fillable = [
    'id',
    'table_id',
  ];
  public function Table () {
      return $this->belongsTo('App\Models\TableModel');
  }
  public function DetailBill () {
      return $this->hasMany('App\Models\DetailbillModel', 'bill_id');
  }
}
