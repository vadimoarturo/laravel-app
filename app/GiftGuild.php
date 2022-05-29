<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiftGuild extends Model
{
    public $timestamps = false;
    protected $table="gift_guild";
    protected $connection='sqlsrv2';

}
