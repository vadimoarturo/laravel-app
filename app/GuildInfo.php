<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuildInfo extends Model
{
  public $timestamps = false;

  protected $table="Guild";
  protected $connection='sqlsrv3';
}
