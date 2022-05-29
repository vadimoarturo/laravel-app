<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * Получить инфу о персонаже авторизованного пользователя..
     */
    public function pers72()
    {
      return $this->hasOne('App\InfoPers72', "account_id");
    }


    /**
     * Получить инфу о руппий в кладовке.
     */
    public function cladov_rup()
    {
      return $this->hasOne('App\Cladovka72', "account_id");
    }


    /**
     * Получить инфу о лотов авторизованного пользователя.
     */
    public function user_lot()
    {
      return $this->hasOne('App\Auction\Auction', "account_id");
    }

    /**
     * Получить инфу о лотов авторизованного пользователя.
     */
    public function user_lotbuy()
    {
      return $this->hasOne('App\Auction\Auction', "account_id_buy", "account_id");
    }

    /**
     * Получить инфу о лотов авторизованного пользователя.
     */
    public function user_referlhistory()
    {
      return $this->hasOne('App\Shop\HistoryAddReferal', "account_id");
    }

    // Define primary key explicitly
    protected $primaryKey = "account_id";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'passwd', 'passwordgame', 'ip', 'last_ip', 'auth_ok', 'block', 'rub', 'server_idx_offset', 'last_login_server_idx', 'refer_by', 'refer_sale', 'refer_count', 'gift_guild', 'rub_all'
       ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'passwd', 'remember_token', 'passwordgame', 'ip', 'last_ip', 'auth_ok', 'block', 'rub', 'ffadminprivgg' , 'server_idx_offset', 'last_login_server_idx', 'refer_by', 'refer_sale', 'gift_guild', 'rub_all'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAuthPassword()
{
    return $this->passwd;
}
}
