<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop\Shop;
use App\Shop\HistoryBuy;
use App\User;
use App\Shop\Category;
use App\Shop\InsertItem;
use App\InfoPers72;
use App\GuildInfoPers;
use App\GuildInfo;
use App\GiftGuild;
use App\PersSkill;
use App\Currency;

use App\StringRu;
use App\StringUs;

use Auth;
use Redirect;
use DateTime;

class ShopController extends Controller {


  public function product(Request $request) {

    if(\Auth::check()){
  if ( $request->input('tag') ){
    return view("shop", ['item' => Shop::where('category_name', $request->input('tag'))->where('category_name', 'not like', '%_скрыт')->where('set', 'not like', 'true')->paginate(9),'category' => Category::get(), 'pers72' => auth()->user()->pers72()->where('name', 'not like', '@%')->get(), 'currency' => Currency::get()]);
  }
  else{
    return view("shop", ['item' => Shop::where('category_name', 'not like', '%_скрыт')->where('set', 'not like', 'true')->paginate(9),'category' => Category::get(), 'pers72' => auth()->user()->pers72()->where('name', 'not like', '@%')->get(), 'currency' => Currency::get()]);

  }
  }
  else {
    if ( $request->input('tag') ){
      return view("shop", ['item' => Shop::where('category_name', $request->input('tag'))->where('category_name', 'not like', '%_скрыт')->where('set', 'not like', 'true')->paginate(9),'category' => Category::get(), 'currency' => Currency::get()]);
    }
    else{
      return view("shop", ['item' => Shop::where('category_name', 'not like', '%_скрыт')->where('set', 'not like', 'true')->paginate(9),'category' => Category::get(), 'currency' => Currency::get()]);

    }
  }

}


  public function buy(Request $req) {

    $validatedData = $req->validate([
      'count' => 'required|integer|between:1,99999',
      'item_id' => 'required',
    ]);


                    //<!----------Проверка на сет----------------!>
if ($req->input('set_id')){

  $rub = Shop::select('price_rub')->where('item_id', $req->input('item_id'))->value('price_rub');
  $count = Shop::select('count')->where('item_id', $req->input('item_id'))->value('count');


  //<!----------Проверка на колличество введенное пользоваталем и БД----------------!>
    if ($req->input('count') == $count ) {

  //<!----------Проверка на баланс----------------!>
        if ($rub <= Auth::user()->rub) {

          //<!----------Покупка----------------!>
                $ostrub = (Auth::user()->rub - $rub);
                User::where('account_id', Auth::user()->account_id)->update(['rub' => $ostrub]);


                $set_buy_id = Shop::select('*')->where('set', "true")->where('set_id', $req->input('set_id'))->get();

                $now = date('Y-m-d H:i:s');
                $date = new DateTime($now);
                $datebuy =  $date->format('Y-m-d\TH:i:s.v');
                $datevalid = $date->modify('+1 month');
                $datevalid = $date->format('Y-m-d\TH:i:s.v');

                HistoryBuy::insert([
                    ['account_id' => Auth::user()->account_id, 'account_name' => Auth::user()->name, 'name_product' => $req->input('item_name'), 'item_id' => $req->input('item_id'), 'set_id' => $req->input('set_id'), 'price' => $rub, 'ost_rub' => $ostrub, "count" => $count, "date_buy" => $datebuy],
                ]);

                foreach ($set_buy_id as $buy_id ) {

                InsertItem::insert([
                    ['buy_id' => $buy_id->buy_id, 'account_id' => Auth::user()->account_id, 'server_name' => "RE1", 'taken_account_id' => Auth::user()->account_id, 'item_code' => $buy_id->buy_id, 'item_count' => $buy_id->count, "rest_item_count" => $buy_id->count, "confirmed" => "True", "confirmed_time" => $datevalid, "bought_time" => $datebuy, "valid_time" => $datevalid, "taken_time" => $datevalid, "isCancel" => "False" ],
                ]);

                  }
            return Redirect::back()->with('info_code', 1);

          }

          //<!----------Нет денег----------------!>
      else {

        return Redirect::back()->with('error_code', 1);

          }
        //<!----------Не верное колличество----------------!>
        }
    else{
          return Redirect::back()->with('info_item', 1);
        }


}

//<!----------RUB----------------!>
else{

  //<!----------Поиск цены и мин колличества товара в БД----------------!>

  $rub = Shop::select('price_rub')->where('item_id', $req->input('item_id'))->value('price_rub');
  $count = Shop::select('count')->where('item_id', $req->input('item_id'))->value('count');


    //<!----------Проверка на колличество введенное пользоваталем и БД----------------!>
      if ($req->input('count') == $count ) {

    //<!----------Проверка на баланс----------------!>
          if ($rub <= Auth::user()->rub) {
      //<!----------Покупка----------------!>
            $ostrub = (Auth::user()->rub - $rub);
            User::where('account_id', Auth::user()->account_id)->update(['rub' => $ostrub]);


            $buy_id = Shop::select('buy_id')->where('item_id', $req->input('item_id'))->value('buy_id');

            $now = date('Y-m-d H:i:s');
            $date = new DateTime($now);
            $datebuy =  $date->format('Y-m-d\TH:i:s.v');
            $datevalid = $date->modify('+1 month');
            $datevalid = $date->format('Y-m-d\TH:i:s.v');

            HistoryBuy::insert([
              ['account_id' => Auth::user()->account_id, 'account_name' => Auth::user()->name, 'name_product' => $req->input('item_name'), 'item_id' => $req->input('item_id'), 'buy_id' => $buy_id, 'price' => $rub, 'ost_rub' => $ostrub, "count" => $count, "date_buy" => $datebuy],
            ]);

            InsertItem::insert([
                ['buy_id' => $buy_id, 'account_id' => Auth::user()->account_id, 'server_name' => "RE1", 'taken_account_id' => Auth::user()->account_id, 'item_code' => $buy_id, 'item_count' => $req->input('count'), "rest_item_count" => $req->input('count'), "confirmed" => "True", "confirmed_time" => $datevalid, "bought_time" => $datebuy, "valid_time" => $datevalid, "taken_time" => $datevalid, "isCancel" => "False" ],
            ]);

            //DB::connection('sqlsrv3')->insert("INSERT INTO PaidItem (buy_id,account_id,avatar_id,server_name,taken_account_id,taken_avatar_id,item_code,item_count,type,rest_item_count,bought_time,valid_time) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)",[$buy_id,Auth::user()->account_id,Auth::user()->account_id,"RE1",Auth::user()->account_id,0,$buy_id,$count,0,$count,$datebuy,$datevalid]);

            return Redirect::back()->with('info_code', 1);

          }
                //<!----------Нет денег----------------!>
            else {

              return Redirect::back()->with('error_code', 1);

                }
      }

    //<!----------Проверка на колличество введенное пользоваталем и БД, если отличается от того что в БД , считаем другой прайс.----------------!>
      else {
  //<!----------Проверка на минимальное колличество, т.е если в базе стоит 10 , меньше 9 купить нельзя.----------------!>
          if ( $req->input('count') < $count ){
            return Redirect::back()->with('info_item', 1);
          }

          else {
      //<!----------Если число предметов из БД больше 1, то происходит переасчет прайса.----------------!>
          if ( $count > 1) {
        //<!----------Поиск цены за 1 товар----------------!>
            $otherpriceoneitem =  $rub / $count;
            $otherprice = $otherpriceoneitem * $req->input('count');
            //<!----------Проверка на баланс----------------!>
              if($otherprice <= Auth::user()->rub) {
      //<!----------Покупка----------------!>

               $ostrubther = (Auth::user()->rub - $otherprice);

               User::where('account_id', Auth::user()->account_id)->update(['rub' => $ostrubther]);

               $buy_id = Shop::select('buy_id')->where('item_id', $req->input('item_id'))->value('buy_id');

               $now = date('Y-m-d H:i:s');
               $date = new DateTime($now);
               $datebuy =  $date->format('Y-m-d\TH:i:s.v');
               $datevalid = $date->modify('+1 year');
               $datevalid = $date->format('Y-m-d\TH:i:s.v');

               HistoryBuy::insert([
                 ['account_id' => Auth::user()->account_id, 'account_name' => Auth::user()->name, 'name_product' => $req->input('item_name'), 'item_id' => $req->input('item_id'), 'buy_id' => $buy_id, 'price' => $rub, 'ost_rub' => $ostrubther, "count" => $count, "date_buy" => $datebuy],
               ]);

               InsertItem::insert([
                   ['buy_id' => $buy_id, 'account_id' => Auth::user()->account_id, 'server_name' => "RE1", 'taken_account_id' => Auth::user()->account_id, 'item_code' => $buy_id, 'item_count' => $req->input('count'), "rest_item_count" => $req->input('count'), "confirmed" => "True", "confirmed_time" => $datevalid, "bought_time" => $datebuy, "valid_time" => $datevalid, "taken_time" => $datevalid, "isCancel" => "False" ],
               ]);

              // DB::connection('sqlsrv3')->insert("INSERT INTO PaidItem (buy_id,account_id,avatar_id,server_name,taken_account_id,taken_avatar_id,item_code,item_count,type,rest_item_count,bought_time,valid_time) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)",[$buy_id,Auth::user()->account_id,Auth::user()->account_id,"RE1",Auth::user()->account_id,0,$buy_id,$req->input('count'),0,$req->input('count'),$datebuy,$datevalid]);

               return Redirect::back()->with('info_code', 1);
              }

                //<!----------Нет денег----------------!>
              else {
                return Redirect::back()->with('error_code', 1);
              }
            }
          //<!----------Если число предметов равен 1 из БД, то происходит переасчет прайса.----------------!>
           else {
                $otherprice = $req->input('count') * $rub;
                  //<!----------Проверка на баланс----------------!>
                if($otherprice <= Auth::user()->rub) {
                        //<!----------Покупка----------------!>
                  $ostrubther = (Auth::user()->rub - $otherprice);

                  User::where('account_id', Auth::user()->account_id)->update(['rub' => $ostrubther]);

                  $buy_id = Shop::select('buy_id')->where('item_id', $req->input('item_id'))->value('buy_id');

                  $now = date('Y-m-d H:i:s');
                  $date = new DateTime($now);
                  $datebuy =  $date->format('Y-m-d\TH:i:s.v');
                  $datevalid = $date->modify('+1 month');
                  $datevalid = $date->format('Y-m-d\TH:i:s.v');

                  HistoryBuy::insert([
                    ['account_id' => Auth::user()->account_id, 'account_name' => Auth::user()->name, 'name_product' => $req->input('item_name'), 'item_id' => $req->input('item_id'), 'buy_id' => $buy_id, 'price' => $rub, 'ost_rub' => $ostrubther, "count" => $count, "date_buy" => $datebuy],
                  ]);

                  InsertItem::insert([
                      ['buy_id' => $buy_id, 'account_id' => Auth::user()->account_id, 'server_name' => "RE1", 'taken_account_id' => Auth::user()->account_id, 'item_code' => $buy_id, 'item_count' => $req->input('count'), "rest_item_count" => $req->input('count'), "confirmed" => "True", "confirmed_time" => $datevalid, "bought_time" => $datebuy, "valid_time" => $datevalid, "taken_time" => $datevalid, "isCancel" => "False" ],
                  ]);

                //  DB::connection('sqlsrv3')->insert("INSERT INTO PaidItem (buy_id,account_id,avatar_id,server_name,taken_account_id,taken_avatar_id,item_code,item_count,type,rest_item_count,bought_time,valid_time) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)",[$buy_id,Auth::user()->account_id,Auth::user()->account_id,"RE1",Auth::user()->account_id,0,$buy_id,$req->input('count'),0,$req->input('count'),$datebuy,$datevalid]);

                  return Redirect::back()->with('info_code', 1);
                }
                //<!----------Нет денег----------------!>
                else {
                  return Redirect::back()->with('error_code', 1);
                }
              }
            }
          }
//<!----------END RUB----------------!>
}


  }
//<!----------START GUILD----------------!>
    public function guild(Request $req) {

      $this->validate($req, [
          'persnameguild' => 'required',
          'g-recaptcha-response' => 'required|captcha',
      ]);


//<!------------Проверка персонажа по аккаунту--------------!>
$checkpers = InfoPers72::select('account_id')->where('name', $req->input('persnameguild'))->value('account_id');

if ( $checkpers == Auth::user()->account_id){
  $selectsid = InfoPers72::select('sid')->where('name', $req->input('persnameguild'))->where('account_id', Auth::user()->account_id)->value('sid');
 //<!------------Проверка персонажа состоял ли он в ги хотя бы раз--------------!>
if (GuildInfoPers::select('guild_id')->where('player_id', $selectsid)->exists()) {
$checkpersguild = GuildInfoPers::select('guild_id')->where('player_id', $selectsid)->value('guild_id');
//<!------------Проверка персонажа состоит ли он в ги--------------!>
  if ( $checkpersguild == 0  ){
    $checkpersguilddate = GuildInfoPers::select('guild_block_time')->where('player_id', $selectsid)->get();
    $checkpersguilddate = $checkpersguilddate[0]->guild_block_time;
if ( $checkpersguilddate == '2000-01-01 00:00:00.000'){
  return Redirect::back()->with('error_pers_guild_block', 1)->with('info_guild_pers', $req->input('persnameguild'));
     die;
}
  //<!------------Проверка балнаса--------------!>
  if ( 100 <= Auth::user()->rub  ){
      //<!------------Покупка--------------!>
    $ostrub = (Auth::user()->rub - 100);
   User::where('account_id', Auth::user()->account_id)->update(['rub' => $ostrub]);

GuildInfoPers::where('player_id', $selectsid)->update(['guild_block_time' => '2000-01-01 00:00:00.000']);
                  $now = date('Y-m-d H:i:s');
                  $date = new DateTime($now);
                  $datebuy =  $date->format('Y-m-d\TH:i:s.v');
                  $infotext = "Снятие штрафа гильдии " . $req->input('persnameguild');
HistoryBuy::insert([
    ['account_id' => Auth::user()->account_id, 'account_name' => Auth::user()->name, 'name_product' => $infotext, 'price' => '100', 'ost_rub' => $ostrub, "date_buy" => $datebuy],
]);

    return Redirect::back()->with('info_guild', 1)->with('info_guild_pers', $req->input('persnameguild'));
  }
//<!----------Нет денег----------------!>
  else {
  return Redirect::back()->with('error_code', 1);
  }
}
else {
  $guildname = GuildInfo::select('name')->where('sid', $checkpersguild)->value('name');
return Redirect::back()->with('error_pers_guild', 1)->with('info_guild_pers', $req->input('persnameguild'))->with('info_guild_name', $guildname);
}
}
else {
return Redirect::back()->with('error_pers_one', 1)->with('info_guild_pers', $req->input('persnameguild'));
}
}
else {
return Redirect::back()->with('error_pers', 1)->with('info_guild_pers', $req->input('persnameguild'));
}
//<!------------Проверка персонажа по аккаунту--------------!>
    }
//<!----------END GUILD----------------!>



//<!----------START RACE----------------!>
public function race(Request $req) {

  $this->validate($req, [
      'persnamerace' => 'required',
      'racepers' => 'required',
      'g-recaptcha-response' => 'required|captcha',
  ]);

  //<!------------Проверка персонажа по аккаунту--------------!>
  $checkpers = InfoPers72::select('account_id')->where('account_id', Auth::user()->account_id)->where('name', $req->input('persnamerace'))->value('account_id');
  if ( $checkpers != Auth::user()->account_id){
    return Redirect::back()->with('error_pers', 1)->with('info_guild_pers', $req->input('persnamerace'));
    die;
  }

  //Проверка расы персонажа
  $check_race_pers = InfoPers72::select('race')->where('account_id', Auth::user()->account_id)->where('name', $req->input('persnamerace'))->value('race');
  if ( $check_race_pers == $req->input('racepers') ){
    return Redirect::back()->with('pers_race_error', 1)->with('info_race_pers', $req->input('persnamerace'))->with('info_race', $req->input('racepers'));
    die;
}

  //Проверка персонажей на онлайн
  $check_online_status = InfoPers72::select('name')->where('account_id', Auth::user()->account_id)->whereRaw("DATEDIFF_BIG(second, login_time, logout_time)  < 0")->get();
  if (count($check_online_status) > 0 ){
    return Redirect::back()->with('pers_online', 1);
    die;
  }

if($req->input('racepers') == 3 || $req->input('racepers') == 4 || $req->input('racepers') == 5){

  //<!------------Проверка балнаса--------------!>
  if ( 499 <= Auth::user()->rub  ){
      //<!------------Покупка--------------!>
    $ostrub = (Auth::user()->rub - 499);
   User::where('account_id', Auth::user()->account_id)->update(['rub' => $ostrub]);


 $totaljp = InfoPers72::select('total_jp')->where('account_id', Auth::user()->account_id)->where('name', $req->input('persnamerace'))->value('total_jp');
 $search = strripos($totaljp, '-');
 if ($search === false) {
   $totaljp = $totaljp;
 }
 else {
 $totaljpchange = preg_replace('/-/','',$totaljp);
 InfoPers72::where('account_id', Auth::user()->account_id)->where('name', $req->input('persnamerace'))->update(['total_jp' => $totaljpchange]);
 $totaljp = $totaljpchange;
 }

      //<!------------Смена расы на Гай--------------!>
    if($req->input('racepers') == 3 ){
      InfoPers72::where('account_id', Auth::user()->account_id)->where('name', $req->input('persnamerace'))->update(['race' => '3','job' => '100', 'jlv' => '1', 'jp' => $totaljp, 'job_0' => '0', 'job_1' => '0', 'job_2' => '0', 'jlv_0' => '0', 'jlv_1' => '0', 'jlv_2' => '0']);

        if($check_race_pers == 4){
      $infotext = "Смена расы с Девы на Гая " . $req->input('persnamerace');
          }

          if($check_race_pers == 5){
        $infotext = "Смена расы с Асуры на Гая " . $req->input('persnamerace');
          }
    }
      //<!------------Смена расы на Дева--------------!>
    if($req->input('racepers') == 4 ){
      InfoPers72::where('account_id', Auth::user()->account_id)->where('name', $req->input('persnamerace'))->update(['race' => '4','job' => '200', 'jlv' => '1', 'jp' => $totaljp, 'job_0' => '0', 'job_1' => '0', 'job_2' => '0', 'jlv_0' => '0', 'jlv_1' => '0', 'jlv_2' => '0']);

      if($check_race_pers == 3){
    $infotext = "Смена расы с Гая на Девы " . $req->input('persnamerace');
        }
      if($check_race_pers == 5){
        $infotext = "Смена расы с Асуры на Девы " . $req->input('persnamerace');
        }
    }
      //<!------------Смена расы на Асура--------------!>
    if($req->input('racepers') == 5 ){
      InfoPers72::where('account_id', Auth::user()->account_id)->where('name', $req->input('persnamerace'))->update(['race' => '5','job' => '300', 'jlv' => '1', 'jp' => $totaljp, 'job_0' => '0', 'job_1' => '0', 'job_2' => '0', 'jlv_0' => '0', 'jlv_1' => '0', 'jlv_2' => '0']);

      if($check_race_pers == 3){
    $infotext = "Смена расы с Гая на Асура " . $req->input('persnamerace');
        }
      if($check_race_pers == 4){
      $infotext = "Смена расы с Девы на Асура " . $req->input('persnamerace');
        }
    }

  $perssid = InfoPers72::select('sid')->where('account_id', Auth::user()->account_id)->where('name', $req->input('persnamerace'))->value('sid');
  PersSkill::where('owner_id', $perssid)->delete();

    $now = date('Y-m-d H:i:s');
    $date = new DateTime($now);
    $datebuy =  $date->format('Y-m-d\TH:i:s.v');

HistoryBuy::insert([
    ['account_id' => Auth::user()->account_id, 'account_name' => Auth::user()->name, 'name_product' => $infotext, 'price' => '499', 'ost_rub' => $ostrub, "date_buy" => $datebuy],
]);

return Redirect::back()->with('access_status_race', 1)->with('info_race_pers', $req->input('persnamerace'))->with('info_race', $req->input('racepers'));
}
//<!----------Нет денег----------------!>
  else {
  return Redirect::back()->with('error_code', 1);
}
}
else{
    return Redirect::back()->with('error_race', 1);
die;
}


}
//<!---------END RACE----------------!>



//<!----------START SEX----------------!>
    public function sex(Request $req) {


      $this->validate($req, [
          'persnamesex' => 'required',
          'sexpers' => 'required',
        'g-recaptcha-response' => 'required|captcha',
      ]);

      //<!------------Проверка персонажа по аккаунту--------------!>
      $checkpers = InfoPers72::select('account_id')->where('account_id', Auth::user()->account_id)->where('name', $req->input('persnamesex'))->value('account_id');
      if ( $checkpers != Auth::user()->account_id){
        return Redirect::back()->with('error_pers', 1)->with('info_guild_pers', $req->input('persnamesex'));
        die;
      }

      //Проверка пола персонажа
      $check_sex_pers = InfoPers72::select('sex')->where('account_id', Auth::user()->account_id)->where('name', $req->input('persnamesex'))->value('sex');
      if ( $check_sex_pers == $req->input('sexpers') ){
        return Redirect::back()->with('pers_sex_error', 1)->with('info_sex_persname', $req->input('persnamesex'))->with('info_sex', $req->input('sexpers'));
        die;
    }

      //Проверка персонажей на онлайн
      $check_online_status = InfoPers72::select('name')->where('account_id', Auth::user()->account_id)->whereRaw("DATEDIFF_BIG(second, login_time, logout_time)  < 0")->get();
      if (count($check_online_status) > 0 ){
        return Redirect::back()->with('pers_online', 1);
        die;
      }

      if($req->input('sexpers') == 1 || $req->input('sexpers') == 2){

        //<!------------Проверка балнаса--------------!>
        if ( 149 <= Auth::user()->rub  ){
            //<!------------Покупка--------------!>
          $ostrub = (Auth::user()->rub - 149);
         User::where('account_id', Auth::user()->account_id)->update(['rub' => $ostrub]);

            //<!------------Смена пола на Женский--------------!>
          if($req->input('sexpers') == 1 ){
            InfoPers72::where('account_id', Auth::user()->account_id)->where('name', $req->input('persnamesex'))->update(['sex' => '1']);
              $infotext = "Смена пола с мужской на женский " . $req->input('persnamesex');

          }
          //<!------------Смена пола на Мужской--------------!>
        if($req->input('sexpers') == 2 ){
          InfoPers72::where('account_id', Auth::user()->account_id)->where('name', $req->input('persnamesex'))->update(['sex' => '2']);
            $infotext = "Смена пола с женского на мужской " . $req->input('persnamesex');

        }


          $now = date('Y-m-d H:i:s');
          $date = new DateTime($now);
          $datebuy =  $date->format('Y-m-d\TH:i:s.v');

      HistoryBuy::insert([
          ['account_id' => Auth::user()->account_id, 'account_name' => Auth::user()->name, 'name_product' => $infotext, 'price' => '149', 'ost_rub' => $ostrub, "date_buy" => $datebuy],
      ]);

      return Redirect::back()->with('access_status_sex', 1)->with('info_sex_persname', $req->input('persnamesex'))->with('info_sex', $req->input('sexpers'));
      }
      //<!----------Нет денег----------------!>
        else {
        return Redirect::back()->with('error_code', 1);
      }
      }
      else{
          return Redirect::back()->with('error_sex', 1);
      die;
      }




}
//<!---------END SEX----------------!>

}
