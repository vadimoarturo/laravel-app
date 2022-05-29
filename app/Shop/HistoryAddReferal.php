<?php

namespace App\Shop;

use Illuminate\Database\Eloquent\Model;

class HistoryAddReferal extends Model
{
  public $timestamps = false;
  protected $table="history_add_referal";
  protected $connection='sqlsrv2';

}
