<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  public $timestamps = false;

  protected $table="category";
  protected $connection = 'sqlsrv2';
}
