<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class HistoryPay extends Model
{
  public $timestamps = false;

  protected $table="histoty_pay";
  protected $connection = 'sqlsrv2';
}
