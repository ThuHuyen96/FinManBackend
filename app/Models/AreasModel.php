<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreasModel extends Model
{
    /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'areas';

  protected $fillable = [
    'id',
    'name',
    'status'
  ];
  public function Table () {
      return $this->hasMany('App\Models\TableModel', 'area');
  }
}
