<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Product;
use App\Admin\HistoryBuy;
use App\Admin\HistoryPay;
use App\Admin\Category;
use App\InfoPers72;
use App\User;
use App\Currency;
use DB;
use Auth;
use Redirect;
use DateTime;
use App\Shop\InsertItem;
class AdminPanelController extends Controller
{

  public function adminshop() {
    if (\Auth::check() ){

        if(Auth::user()->ffadminprivgg == "YESSUKAPRO"){

        //   $now = date('Y-m-d H:i:s');
        //   $date = new DateTime($now);
        //   $datebuy =  $date->format('Y-m-d\TH:i:s.v');
        //   $datevalid = $date->modify('+1 month');
        //   $datevalid = $date->format('Y-m-d\TH:i:s.v');
        //   $users =  User::select('*')->get();
        //
        //    foreach ($users as $accountname) {
        //   InsertItem::insert([
        //       ['buy_id' => '900000', 'account_id' => $accountname->account_id, 'server_name' => "RE1", 'taken_account_id' => $accountname->account_id, 'item_code' => '900000', 'item_count' => "3", "rest_item_count" => "3", "confirmed" => "True", "confirmed_time" => $datevalid, "bought_time" => $datebuy, "valid_time" => $datevalid, "taken_time" => $datevalid, "isCancel" => "False" ],
        //   ]);
        // }
         //  Currency::truncate();
         // $now = date('Y-m-d H:i:s');
         // $date = new DateTime($now);
         // $datecheck =  $date->format('Y-m-d\TH:i:s.v');
         // $datexml = $date->format('d/m/Y');
         // $url = 'http://www.cbr.ru/scripts/XML_daily.asp?date_req='.$datexml;
         // $xml = simplexml_load_file($url,"SimpleXMLElement", LIBXML_NOCDATA);
         // $json = json_encode($xml);
         // $array = json_decode($json,TRUE);
         // echo $array;
         // foreach ($array['Valute'] as $currencyarray) {
         //   if($currencyarray['CharCode'] == 'USD' || $currencyarray['CharCode'] == 'EUR' ){
         //   Currency::insert(['name' => $currencyarray['Name'],'currency' => $currencyarray['CharCode'],'nominal' => $currencyarray['Nominal'],'value' => (float)$currencyarray['Value'], 'date' => $datecheck]);
         //   }
         //   if($currencyarray['CharCode'] == 'UAH'){
         //     $valuearray = (float)$currencyarray['Value'];
         //     $value = ($valuearray / 10);
         //   Currency::insert(['name' => $currencyarray['Name'],'currency' => $currencyarray['CharCode'],'nominal' => 1,'value' =>  $value, 'date' => $datecheck]);
         //   }
         //
         // }

// $price_old = DB::connection('sqlsrv2')->table('history_buy')->select('*')->where('name_product', 'LIKE', '%кот%')->where('account_name', 'NOT LIKE', 'SILVERFAL100')->get();
// foreach ($price_old as $returncat) {
//     InsertItem::insert([
//         ['buy_id' => $returncat->buy_id, 'account_id' => $returncat->account_id, 'server_name' => "RE1", 'taken_account_id' => $returncat->account_id, 'item_code' => $returncat->buy_id, 'item_count' => "1", "rest_item_count" => "1", "confirmed" => "True", "confirmed_time" => $datevalid, "bought_time" => $datebuy, "valid_time" => $datevalid, "taken_time" => $datevalid, "isCancel" => "False" ],
//     ]);
// }


// InsertItem::insert([
//     ['buy_id' => '611102208', 'account_id' => '735', 'server_name' => "RE1", 'taken_account_id' => '735', 'item_code' => '611102208', 'item_count' => "1", "rest_item_count" => "1", "confirmed" => "True", "confirmed_time" => $datevalid, "bought_time" => $datebuy, "valid_time" => $datevalid, "taken_time" => $datevalid, "isCancel" => "False" ],
// ]);

//  $users =  User::select('*')->get();
//
//  foreach ($users as $accountname) {
//    $balance = User::select('rub_all')->where('name', $accountname->name)->value('rub_all');
// $add_balance = ($balance * (25 / 100)) ;
// User::where('name', $accountname->name)->update(['rub' => $add_balance, 'gift_guild' => '0']);
//  }

// $price = DB::connection('sqlsrv2')->table('history_pay')->where('account_name', 'Emari777')->where('status_pay', 'true')->sum('order_amount');
//
// $price_old = DB::connection('sqlsrv2')->table('history_pay_old27102020')->where('account_name', 'Emari777')->where('status_pay', 'true')->sum('order_amount');
//
// echo $price + $price_old;

// foreach ($users as $accountname) {
//   $price = DB::connection('sqlsrv2')->table('history_pay')->where('account_name', $accountname->name)->where('status_pay', 'true')->sum('order_amount');
//   $price_old = DB::connection('sqlsrv2')->table('history_pay_old27102020')->where('account_name', $accountname->name)->where('status_pay', 'true')->sum('order_amount');
//
// User::where('name', $accountname->name)->update(['rub_all' => $price + $price_old]);
// User::where('name', $accountname->name)->update(['rub' => '0']);
// }







/*
          $now = date('Y-m-d H:i:s');
          $date = new DateTime($now);
          $datebuy =  $date->format('Y-m-d\TH:i:s.v');
          $datevalid = $date->modify('+1 month');
          $datevalid = $date->format('Y-m-d\TH:i:s.v');
          $account = User::get();

          InsertItem::insert([
              ['buy_id' => "811310", 'account_id' => "730", 'server_name' => "RE1", 'taken_account_id' => "730", 'item_code' => "811310", 'item_count' => "1", "rest_item_count" => "1", "confirmed" => "True", "confirmed_time" => $datevalid, "bought_time" => $datebuy, "valid_time" => $datevalid, "taken_time" => $datevalid, "isCancel" => "False" ],
          ]);
/*
          foreach ($account as $accountname ) {
            InsertItem::insert([
                ['buy_id' => "611102206", 'account_id' => $accountname->account_id, 'server_name' => "RE1", 'taken_account_id' => $accountname->account_id, 'item_code' => "611102206", 'item_count' => "1", "rest_item_count" => "1", "confirmed" => "True", "confirmed_time" => $datevalid, "bought_time" => $datebuy, "valid_time" => $datevalid, "taken_time" => $datevalid, "isCancel" => "False" ],
            ]);
            InsertItem::insert([
                ['buy_id' => "70001013", 'account_id' => $accountname->account_id, 'server_name' => "RE1", 'taken_account_id' => $accountname->account_id, 'item_code' => "70001013", 'item_count' => "1", "rest_item_count" => "1", "confirmed" => "True", "confirmed_time" => $datevalid, "bought_time" => $datebuy, "valid_time" => $datevalid, "taken_time" => $datevalid, "isCancel" => "False" ],
            ]);

            }

/*

          $questid = DB::connection('sqlsrv4')->table('QuestResource')->select('*')->get();
                          foreach ($questid as $questidchange) {
            DB::connection('sqlsrv4')->table('QuestResource')->where('id', $questidchange->id)->update(['exp' => $questidchange->exp * 3]);

                          }

/*
                    $shmot = DB::connection('sqlsrv5')->table('ItemResource')->select('id')->where('class', 220)->where('effect_id', '=', 0)->where('rank', 'not like', '8')->where('rank', 'not like', '9')->get('');
                    echo $shmot->implode('id', ' ,');




*/

/*
          $monster = DB::connection('sqlsrv5')->table('temp_upto8')->select('*')->get();
                          foreach ($monster as $monsterchange) {
            DB::connection('sqlsrv5')->table('MonsterResource')->where('id', $monsterchange->upto8)->update(['size' => '1','scale' => '2','level' => '180','hp' => '2500000', 'mp' => '10000','attack_point' => '4000', 'magic_point' => '4000', 'defence' => '6000', 'magic_defence' => '2000', 'attack_speed' => '-25', 'accuracy' => '50', 'avoid' => '50', 'exp' => '150000', 'jp' => '50000', 'gold_min' => '15000', 'gold_max' => '50000', 'drop_table_link_id' => '1670212']);

                          }

*/
/*
          $itemdrop = DB::connection('sqlsrv5')->table('temp_upto8')->select('*')->get();

                foreach ($itemdrop as $itemdropdelete) {
                  $sortid = DB::connection('sqlsrv5')->table('MarketResource')->latest('sort_id')->where('name', 're_for_persr2r6')->first('sort_id');
                  DB::connection('sqlsrv5')->table('MarketResource')->insert([
                      ['sort_id' => $sortid->sort_id + 1, 'name' => 're_for_persr2r6', 'code' => $itemdropdelete->upto8, 'price_ratio' => '1', 'huntaholic_ratio' => '0', 'arena_ratio' => '0'],
                  ]);
}
*/




/*
          $itemdrop = DB::connection('sqlsrv5')->table('temp_upto8lvl')->select('upto8lvl')->get();
          foreach ($itemdrop as $itemdropdelete) {

            DB::connection('sqlsrv5')->table('ItemResource')->where('id', $itemdropdelete->upto8lvl)->update(['use_min_level' => '165','use_max_level' => '300', 'rank' => '8']);

          }
/*

//ADD_MOB
$eventid = 1100140;
$mob = array( 22000200, 22000201, 22000202, 22000203, 22000200, 22000204 );
  for ($i = 0; $i <= 5; $i++) {
DB::connection('sqlsrv5')->table('tb_monster_respawn')->insert([
    ['event_id' => $eventid, 'type' => 'raidmob', 'no' => $i, 'monster_id' => $mob[$i]],
]);

              DB::connection('sqlsrv5')->table('tb_monster_respawn')->where('event_id', $eventid)->where('no', $i)->where('monster_id', 'like', '3%')->update(['monster_id' => $mob[$i]]);
  }

*/

//DROP_DELETE
/*
$itemdrop = DB::connection('sqlsrv5')->table('temp_deletedrop')->select('*')->get();
foreach ($itemdrop as $itemdropdelete) {

  for ($i = 0; $i <= 7; $i++) {
  DB::connection('sqlsrv5')->table('DropGroupResource')->where('drop_item_id_0'.$i, $itemdropdelete->drop_delete)->update(['drop_item_id_0'.$i => '0','drop_min_count_0'.$i => '0','drop_max_count_0'.$i => '0','drop_percentage_0'.$i => '0']);
  DB::connection('sqlsrv5')->table('MonsterDropTableResource')->where('drop_item_id_0'.$i, $itemdropdelete->drop_delete)->update(['drop_item_id_0'.$i => '0','drop_min_count_0'.$i => '0','drop_max_count_0'.$i => '0','drop_percentage_0'.$i => '0','drop_min_level_0'.$i => '0','drop_max_level_0'.$i => '0']);
  }

}
*/

}
else{return  redirect('/');}
}
else{return  redirect('/');}

}

  }
