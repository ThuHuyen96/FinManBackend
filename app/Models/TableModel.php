<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TableModel extends Model
{
    /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'tables';

  protected $fillable = [
    'id',
    'name',
    'area',
    'status'
  ];
  public function Bill () {
      return $this->hasMany('App\Models\BillModel', 'table_id');
  }
  public function Area () {
      return $this->belongsTo('App\Models\AreasModel');
  }
}
