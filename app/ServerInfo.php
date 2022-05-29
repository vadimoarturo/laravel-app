<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServerInfo extends Model
{
  public $timestamps = false;

  protected $table="server_info";
  protected $connection='sqlsrv';
}
