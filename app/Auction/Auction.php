<?php

namespace App\Auction;

use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
  public $timestamps = false;
  protected $table="lot";
  protected $connection='sqlsrv2';
}
