<?php

namespace App\Shop;

use Illuminate\Database\Eloquent\Model;

class InsertItem extends Model
{
    public $timestamps = false;
  protected $table="PaidItem";
  protected $connection = 'sqlsrv3';
}
