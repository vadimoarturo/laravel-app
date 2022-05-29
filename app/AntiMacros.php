<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AntiMacros extends Model
{
  public $timestamps = false;

  protected $table="GlobalVariable";
  protected $connection='sqlsrv3';
}
