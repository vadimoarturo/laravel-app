<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuildInfoPers extends Model
{
  public $timestamps = false;

  protected $table="GuildMember";
  protected $connection='sqlsrv3';
}
