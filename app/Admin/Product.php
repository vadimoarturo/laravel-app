<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  public $timestamps = false;
  protected $table="product";
  protected $connection = 'sqlsrv2';
}
