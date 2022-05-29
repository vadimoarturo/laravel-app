<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoRate extends Model
{
  public $timestamps = false;

  protected $table="server_rate_info";
  protected $connection='sqlsrv';
}
