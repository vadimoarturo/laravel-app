<?php

namespace App\Shop;

use Illuminate\Database\Eloquent\Model;

class HistoryPay extends Model
{
  public $timestamps = false;
  protected $table="history_pay";
  protected $connection='sqlsrv2';

}
