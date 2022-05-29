<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoPers72 extends Model
{
  public $timestamps = false;

  protected $table="Character";
  protected $connection='sqlsrv3';

  /**
   * Получить инфу о персонаже авторизованного пользователя..
   */
  public function guildid()
  {
    return $this->hasOne('App\GuildInfoPers', "player_id" , "sid");
  }


}
