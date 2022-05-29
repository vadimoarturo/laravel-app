<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
  public $timestamps = false;
  protected $table="currency";
  protected $connection='sqlsrv2';
}
