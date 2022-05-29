<?php

namespace App\Shop;

use Illuminate\Database\Eloquent\Model;

class HistoryBuy extends Model
{
  public $timestamps = false;
  protected $table="history_buy";
  protected $connection='sqlsrv2';

}
