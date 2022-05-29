<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StringUs extends Model
{
  public $timestamps = false;
  protected $table="StringResource_US";
  protected $connection='sqlsrv2';
}
