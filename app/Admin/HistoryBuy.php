<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class HistoryBuy extends Model
{
  protected $table="history_buy";
  protected $connection = 'sqlsrv2';
}
