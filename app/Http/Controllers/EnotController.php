<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop\Shop;
use DB;
use Auth;
use Redirect;
use App\User;
use App\Shop\HistoryPay;
use App\Shop\HistoryAddReferal;
use App\Currency;

class EnotController extends Controller
{



public function pay(Request $req) {

  $validatedData = $req->validate([
    'oplata' => 'required|integer|between:1,999999',
    'currencyname' => 'required',
    'g-recaptcha-response' => 'required|captcha',
  ]);


if ($req->input('currencyname') == "RUB" || $req->input('currencyname') == "EUR" || $req->input('currencyname') == "UAH" || $req->input('currencyname') == "USD"){

if ($req->input('currencyname') == "RUB" and $req->input('oplata') < 100){
  return Redirect::back()->with('error_currency_rub', 1);
  die;
}
if ($req->input('currencyname') == "UAH" and $req->input('oplata') < 100){
  return Redirect::back()->with('error_currency_uah', 1);
  die;
}



$merchant_id = '';
$secret_one = '';
$order_amount = $req->input('oplata');
$order_id = (date('YmdHis') + random_int(10, 99999));
$sign = md5($merchant_id.':'.$order_amount.':'.$secret_one.':'.$order_id);
$cf_user = Auth::user()->account_id;
$cf_username = Auth::user()->name;
$cf_refer = Auth::user()->refer_by;
$currency = $req->input('currencyname');

$datecreate = date('Y-m-d H:i:s');



if(Auth::user()->refer_by != "false"){
$cf_referid = User::select('account_id')->where('name', Auth::user()->refer_by)->value('account_id');
}
else{
  $cf_referid = "false";
}

HistoryPay::insert([
  ['account_id' => Auth::user()->account_id, 'currency' =>  $currency,'order_id' => $order_id, 'order_amount' => $order_amount, 'status_pay' => 'false', 'date_created' => $datecreate, 'account_name' => Auth::user()->name],
]);

$url = "https://enot.io/pay?oa=".$order_amount."&m=".$merchant_id."&cr=".$currency."&s=".$sign."&o=".$order_id."&cf[user]=".$cf_user."&cf[refer]=".$cf_refer."&cf[username]=".$cf_username."&cf[referid]=".$cf_referid;
return Redirect::to($url);
}
else {
  return Redirect::back()->with('error_currency', 1);
  die;
}

}

public function checkpay(Request $req) {
  $merchant = '';
  $secret_second = '';

  function getIP() {
      if(isset($_SERVER['HTTP_X_REAL_IP'])) return $_SERVER['HTTP_X_REAL_IP'];
     return $_SERVER['REMOTE_ADDR'];
      }
      if (!in_array(getIP(), array('51.210.114.114'))) {
      die("hacking attempt!");
      }

  $sign = md5($merchant.':'.$_REQUEST['amount'].':'.$secret_second.':'.$_REQUEST['merchant_id']);

  if ($sign != $_REQUEST['sign_2']) {
  die('wrong sign');
  }

      $REQUSER = $_REQUEST['custom_field']['user'];
      $REQUSERNAME = $_REQUEST['custom_field']['username'];
      $REQREF = $_REQUEST['custom_field']['refer'];
      $REQREFID = $_REQUEST['custom_field']['referid'];

      $REQORDERID = $_REQUEST['merchant_id'];
      $REQAMOUNT = $_REQUEST['amount'];
      $REQUESTIDENOT = $_REQUEST['intid'];
      $COMISSION = $_REQUEST['commission'];
      $CURRENCY = $_REQUEST['currency'];
      $CREDIT = $_REQUEST['credited'];

      $checkamount = HistoryPay::select('order_amount')->where('order_id', $REQORDERID)->where('account_id', $REQUSER)->value('order_amount');
      $checkstatus = HistoryPay::select('status_pay')->where('order_id', $REQORDERID)->where('account_id', $REQUSER)->value('status_pay');

      if ($checkamount == $REQAMOUNT) {

      if ($checkstatus != "true") {

          if ($CURRENCY == 'USD' ) {
            $usd = Currency::select('value')->where('currency', $CURRENCY)->value('value');
            $REQAMOUNT = $CREDIT;
            $COMISSION = ($COMISSION * $usd);
          }
          if ($CURRENCY == 'EUR' ) {
            $eur = Currency::select('value')->where('currency', $CURRENCY)->value('value');
            $REQAMOUNT = $CREDIT;
            $COMISSION = ($COMISSION * $eur);
          }
          if ($CURRENCY == 'UAH' ) {
            $uah = Currency::select('value')->where('currency', $CURRENCY)->value('value');
            $REQAMOUNT = $CREDIT;
            $COMISSION = (($COMISSION * $uah) / 10);
          }

        $balance = User::select('rub')->where('account_id', $REQUSER)->value('rub');
        $balance_all = User::select('rub_all')->where('account_id', $REQUSER)->value('rub_all');

        if($REQAMOUNT >= 1000){
          //Считаем фиксированный процент от суммы рановй или более 1000 руб
          $fixprocent10 = ($REQAMOUNT * ( 10 / 100));
          $addrub_fixprocent10 = ($balance + $REQAMOUNT + $fixprocent10);
          //Возврат оплаченной комиссии.
          $add_balance = $addrub_fixprocent10 + $COMISSION;
          $add_balance_all = ( $balance_all + $REQAMOUNT + $COMISSION + $fixprocent10);
          User::where('account_id', $REQUSER)->update(['rub' => $add_balance]);
          User::where('account_id', $REQUSER)->update(['rub_all' => $add_balance_all]);
          $datepay = date('Y-m-d H:i:s');
          HistoryPay::where('account_id', $REQUSER)->where('order_id', $REQORDERID)->update(['status_pay' => "true", 'date_pay' => $datepay, 'order_id_fk' => $REQUESTIDENOT, 'last_balance' => $balance, 'new_balance' => $add_balance, 'procent_add' => $fixprocent10, 'comission_return' => $COMISSION]);
        }

        else {
          $add_balance = ( $balance + $REQAMOUNT + $COMISSION);
          $add_balance_all = ( $balance_all + $REQAMOUNT + $COMISSION);
          User::where('account_id', $REQUSER)->update(['rub' => $add_balance]);
          User::where('account_id', $REQUSER)->update(['rub_all' => $add_balance_all]);
          $datepay = date('Y-m-d H:i:s');
          HistoryPay::where('account_id', $REQUSER)->where('order_id', $REQORDERID)->update(['status_pay' => "true", 'date_pay' => $datepay, 'order_id_fk' => $REQUESTIDENOT, 'last_balance' => $balance, 'new_balance' => $add_balance, 'comission_return' => $COMISSION ]);

        }

        if ($REQREF != "false"){
          $referalprocent = ($REQAMOUNT * ( 20 / 100));
          $balanceparents = User::select('rub')->where('name', $REQREF)->value('rub');
          $addrubparents = ($balanceparents + $referalprocent);
          User::where('name', $REQREF)->update(['rub' => $addrubparents]);
          $dateadd = date('Y-m-d H:i:s');
          HistoryAddReferal::insert([
            ['account_id' => $REQREFID, 'account_name' => $REQREF, 'rub_add' => $referalprocent, 'last_balance' => $balanceparents, 'new_balance' => $addrubparents, 'referuser_account_id' => $REQUSER, 'referuser_account_name' => $REQUSERNAME, 'date_add' => $dateadd, 'order_id' => $REQORDERID, 'order_id_fk' => $REQUESTIDENOT],
            ]);

        }

        die('YES');
      }
        else {
          die('NO STATUS');
        }

      }

     else{

        die('NO MONEY');

      }


      //Так же, рекомендуется добавить проверку на сумму платежа и не была ли эта заявка уже оплачена или отменена
      //Оплата прошла успешно, можно проводить операцию.

    }

public function success() {
  return Redirect::route('shop')->with('access_status', 2);
    }

public function error() {
  return Redirect::route('shop')->with('error_status', 2);
    }

}
