<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cladovka72 extends Model
{
  public $timestamps = false;

    protected $table="Item";
    protected $connection='sqlsrv3';
}
