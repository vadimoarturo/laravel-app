<?php

namespace App\Shop;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
  public $timestamps = false;
  protected $table="product";
  protected $connection='sqlsrv2';

  public function stringru_title()
  {
    return $this->hasOne('App\StringRu', 'code', 'code_title');
  }

  public function stringru_text()
  {
    return $this->hasOne('App\StringRu', 'code', 'code_text');
  }



}
