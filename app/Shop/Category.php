<?php

namespace App\Shop;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
  protected $table="category";
  protected $connection = 'sqlsrv2';

  public function products()
  {
    return $this->hasMany('App/Shop/Shp');
  }
}
