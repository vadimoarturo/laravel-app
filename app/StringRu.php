<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StringRu extends Model
{
  public $timestamps = false;
  protected $table="StringResource";
  protected $connection='sqlsrv2';
}
