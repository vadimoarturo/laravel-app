<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersSkill extends Model
{
  public $timestamps = false;

  protected $table="Skill";
  protected $connection='sqlsrv3';

}
