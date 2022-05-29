<?php

namespace App\Http\Controllers;

use App\Auction\Auction;
use App\ServerInfo;
use App\InfoPers72;
use App\Cladovka72;
use Illuminate\Http\Request;
use App\User;

use Auth;
use Redirect;
use DateTime;
use Artisan;
class AuctionController extends Controller
{

  public function show() {

if(\Auth::check()){

  //Проверка создан ли персонаж
  $check_user = InfoPers72::select('name')->where('account_id', Auth::user()->account_id)->get();
  $check_createcladovka = Cladovka72::select('cnt')->where('code', 0)->where('account_id', Auth::user()->account_id)->get();
  if(count($check_user) == "0" || count($check_createcladovka) == "0"){
    return  redirect('/')->with('error_mypers', 1);
      }
else {
      return view("auction", ['lot' => Auction::where('status', 'created')->orderBy('price_rup', 'DESC')->paginate(10), 'pers72' => auth()->user()->pers72()->where('name', 'not like', '@%')->get(), 'cladovka' => auth()->user()->cladov_rup()->where('code', '0')->get(), 'userlot' => auth()->user()->user_lot()->where('status', 'created')->paginate(15)]);
}
}
else{
  return redirect('/login');


}

  }


public function create(Request $req) {

    $validatedData = $req->validate([
      'auction_rup' => 'required|integer|between:1000000,9000000000',
      'auction_rub' => 'required|integer|between:1,9000000000',
      'g-recaptcha-response' => 'required|captcha',
    ]);


//Проверка персонажей на онлайн
$check_online_status = InfoPers72::select('name')->where('account_id', Auth::user()->account_id)->whereRaw("DATEDIFF_BIG(second, login_time, logout_time)  < 0")->get();
if (count($check_online_status) > 0 ){

      return Redirect::back()->with('pers_online', 1);

}
else{


//Поиск руппий в кладовке
$count_rup = Cladovka72::select('cnt')->where('code', 0)->where('account_id', Auth::user()->account_id)->get();
$count_rup = $count_rup[0]->cnt;

//Проверка есть ли столько руппий в кладовке, если да то создаем лот и забирем руппий из кладовки
    if (  $count_rup  >= $req->input('auction_rup') ) {

      $now = date('Y-m-d H:i:s');
      $date = new DateTime($now);
      $datecreate =  $date->format('Y-m-d\TH:i:s.v');
      $ost_rup = ($count_rup - $req->input('auction_rup'));
      Cladovka72::where('code', 0)->where('account_id', Auth::user()->account_id)->update(['cnt' => $ost_rup]);

    $maxlvlpers = InfoPers72::select('name')->where('name', 'not like', '@%')->where('account_id', Auth::user()->account_id)->max('lv');
    $showpersmaxlvl = InfoPers72::select('name')->where('account_id', Auth::user()->account_id)->where('lv', $maxlvlpers)->get();
    $showpersmaxlvl = $showpersmaxlvl[0]->name;
     Auction::insert([
         ['account_id' => Auth::user()->account_id, 'account' => Auth::user()->name, 'name' => $showpersmaxlvl,  'status' => 'created', 'price_rup' => $req->input('auction_rup'), 'price_rub' => $req->input('auction_rub'), 'date_create' => $datecreate],
     ]);

      return Redirect::back()->with('info_code', 1);
    }

//Если руппий нет говорим что их нет
    else {

      return Redirect::back()->with('error_code', 1);

    }
}

  }





  public function buy(Request $req) {
    //Проверка твой ли это лот
    $account_id_mylot = Auction::select('account_id')->where('lot_id', $req->input('lot_id'))->get();
    $account_id_mylot = $account_id_mylot[0]->account_id;
    if(Auth::user()->account_id != $account_id_mylot){


      //Проверка персонажей на онлайн
      $check_online_status = InfoPers72::select('name')->where('account_id', Auth::user()->account_id)->whereRaw("DATEDIFF_BIG(second, login_time, logout_time)  < 0")->get();
      if (count($check_online_status) > 0 ){

            return Redirect::back()->with('pers_online', 1);

      }
      else{

    //Взять цену в рублях  за лот
    $price_rub = Auction::select('price_rub')->where('lot_id', $req->input('lot_id'))->get();
    $price_rub = $price_rub[0]->price_rub;

    //Проверка баланса игрока который покупает
    if($price_rub <= Auth::user()->rub){
      //<!----------Покупка----------------!>
            $price_update = (Auth::user()->rub - $price_rub);
            User::where('account_id', Auth::user()->account_id)->update(['rub' => $price_update]);
            //<!---------Поиск колличества руппий у покупателя в кладовке----------------!>
            $count_rup = Cladovka72::select('cnt')->where('code', 0)->where('account_id', Auth::user()->account_id)->get();
            $count_rup = $count_rup[0]->cnt;
            //<!---------Взять цену в руппий  за лот----------------!>
            $price_rup = Auction::select('price_rup')->where('lot_id', $req->input('lot_id'))->get();
            $price_rup = $price_rup[0]->price_rup;
            $add_rup = $count_rup + $price_rup;
            //<!---------Добавить руппий в кладовку----------------!>
            Cladovka72::where('code', 0)->where('account_id', Auth::user()->account_id)->update(['cnt' => $add_rup]);
            //<!----------Поиск id продовца---------------!>
            $account_id_payer = Auction::select('account_id')->where('lot_id', $req->input('lot_id'))->get();
            $account_id_payer = $account_id_payer[0]->account_id;
            //<!----------Поиск рублей на счету продавца---------------!>
            $count_rub_payer = User::select('rub')->where('account_id', $account_id_payer)->get();
            $count_rub_payer = $count_rub_payer[0]->rub;
            //<!----------Начисление рублей продавцу---------------!>
            $add_rub_payer = ($price_rub + $count_rub_payer);
            User::where('account_id', $account_id_payer)->update(['rub' => $add_rub_payer]);
            //<!----------Изменения статуса лота и кто купил лот---------------!>
            $now = date('Y-m-d H:i:s');
            $date = new DateTime($now);
            $date_buy =  $date->format('Y-m-d\TH:i:s.v');
            Auction::where('lot_id', $req->input('lot_id'))->update(['status' => "pay"]);
            Auction::where('lot_id', $req->input('lot_id'))->update(['date_buy' => $date_buy]);
            Auction::where('lot_id', $req->input('lot_id'))->update(['account_buy' => Auth::user()->name]);
            Auction::where('lot_id', $req->input('lot_id'))->update(['account_id_buy' => Auth::user()->account_id]);

        return Redirect::back()->with('info_buy', 1);
    }
//Проверка баланса
else{
  return Redirect::back()->with('error_rub', 1);
}

}


}

//Проверка твой ли это лот

else{
  return Redirect::back()->with('error_mylot', 1);

}

}




    public function destroy(Request $req) {

      //Проверка персонажей на онлайн
      $check_online_status = InfoPers72::select('name')->where('account_id', Auth::user()->account_id)->whereRaw("DATEDIFF_BIG(second, login_time, logout_time)  < 0")->get();
      if (count($check_online_status) > 0 ){

            return Redirect::back()->with('pers_online', 1);

      }
      else{

      $now = date('Y-m-d H:i:s');
      $date = new DateTime($now);
      $datedestroy =  $date->format('Y-m-d\TH:i:s.v');

      $count_rup = Cladovka72::select('cnt')->where('code', 0)->where('account_id', Auth::user()->account_id)->get();
      $count_rup = $count_rup[0]->cnt;

      Auction::where('lot_id', $req->input('lot_id'))->where('account_id', Auth::user()->account_id)->update(['status' => "destroy"]);
      Auction::where('lot_id', $req->input('lot_id'))->where('account_id', Auth::user()->account_id)->update(['date_destroy' => $datedestroy]);
    $return_rup = Auction::select('price_rup')->where('lot_id', $req->input('lot_id'))->where('account_id', Auth::user()->account_id)->get();
    $return_rup = $return_rup[0]->price_rup;
    $update_rup = $count_rup + $return_rup;

    Cladovka72::where('code', 0)->where('account_id', Auth::user()->account_id)->update(['cnt' => $update_rup]);

            return Redirect::back()->with('info_destroy', 1);
          }

    }
}
