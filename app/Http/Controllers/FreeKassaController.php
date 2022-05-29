<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop\FreeKassa;
use App\Shop\Shop;
use DB;
use Auth;
use Redirect;
use App\User;
use App\Shop\HistoryPay;
use App\Shop\HistoryAddReferal;

class FreeKassaController extends Controller
{



public function pay(Request $req) {

  $validatedData = $req->validate([
    'oplata' => 'required|integer|between:100,999999',
        'g-recaptcha-response' => 'required|captcha',
  ]);


$merchant_id = '';
$secret_one = '';
$us_user = Auth::user()->account_id;
$us_username = Auth::user()->name;
$us_refer = Auth::user()->refer_by;
$order_id = (date('YmdHis') + random_int(10, 99999));
$order_amount = $req->input('oplata');
$datecreate = date('Y-m-d H:i:s');
$sign = md5($merchant_id.':'.$order_amount.':'.$secret_one.':'.$order_id);
if(Auth::user()->refer_by != "false"){
$us_referid = User::select('account_id')->where('name', Auth::user()->refer_by)->get();
$us_referid = $us_referid[0]->account_id;
}
else{
  $us_referid = "false";
}
HistoryPay::insert([
  ['account_id' => Auth::user()->account_id, 'order_id' => $order_id, 'order_amount' => $order_amount, 'status_pay' => 'false', 'date_created' => $datecreate, 'account_name' => Auth::user()->name],
]);
$url = "https://www.free-kassa.ru/merchant/cash.php?oa=".$order_amount."&m=".$merchant_id."&s=".$sign."&o=".$order_id."&us_user=".$us_user."&us_refer=".$us_refer."&us_username=".$us_username."&us_referid=".$us_referid;
return Redirect::to($url);

    }

public function checkpay(Request $req) {

  $merchant_id = '';
  $secret_second = '';

  function getIP() {
      if(isset($_SERVER['HTTP_X_REAL_IP'])) return $_SERVER['HTTP_X_REAL_IP'];
      return $_SERVER['REMOTE_ADDR'];
      }
      if (!in_array(getIP(), array('136.243.38.147', '136.243.38.149', '136.243.38.150', '136.243.38.151', '136.243.38.189', '136.243.38.108'))) {
      die("hacking attempt!");
      }

      $sign = md5($merchant_id.':'.$_REQUEST['AMOUNT'].':'.$secret_second.':'.$_REQUEST['MERCHANT_ORDER_ID']);

      $REQORDERID = $_REQUEST['MERCHANT_ORDER_ID'];
      $REQAMOUNT = $_REQUEST['AMOUNT'];
      $REQUSER = $_REQUEST['us_user'];
      $REQUSERNAME = $_REQUEST['us_username'];
      $REQREF = $_REQUEST['us_refer'];
      $REQREFID = $_REQUEST['us_referid'];
      $REQUESTIDFK = $_REQUEST['intid'];
      //$checkamount = DB::connection('sqlsrv2')->select("SELECT order_amount FROM history_pay WHERE order_id = ? AND account_id = ?",[$REQORDERID,$REQUSER]);
      $checkamount = HistoryPay::select('order_amount')->where('order_id', $REQORDERID)->where('account_id', $REQUSER)->get();
      $checkamount = $checkamount[0]->order_amount;
      //$checkstatus = DB::connection('sqlsrv2')->select("SELECT status_pay FROM history_pay WHERE order_id = ? AND account_id = ?",[$REQORDERID,$REQUSER]);
      $checkstatus = HistoryPay::select('status_pay')->where('order_id', $REQORDERID)->where('account_id', $REQUSER)->get();
      $checkstatus = $checkstatus[0]->status_pay;

      if ($sign != $_REQUEST['SIGN']) {
      die('wrong sign');
      }

      if ($checkamount == $REQAMOUNT) {

      if ($checkstatus != "true") {
        $balance = User::select('rub')->where('account_id', $REQUSER)->value('rub');
        $balance_all = User::select('rub_all')->where('account_id', $REQUSER)->value('rub_all');

        if($REQAMOUNT >= 1000){
          $checkproc = ($REQAMOUNT * ( 14 / 100));
          $addrub20 = ($balance + $REQAMOUNT + $checkproc);
          User::where('account_id', $REQUSER)->update(['rub' => $addrub20]);
            User::where('account_id', $REQUSER)->update(['rub_all' => $addrub20 + $balance_all]);
          $datepay = date('Y-m-d H:i:s');
          HistoryPay::where('account_id', $REQUSER)->where('order_id', $REQORDERID)->update(['status_pay' => "true", 'date_pay' => $datepay, 'order_id_fk' => $REQUESTIDFK, 'last_balance' => $balance, 'new_balance' => $addrub20, 'procent_add' => $checkproc]);
        }
        else {
          $checkproc5 = ($REQAMOUNT * ( 7 / 100));
          $addrub5 = ($balance + $REQAMOUNT + $checkproc5);
          User::where('account_id', $REQUSER)->update(['rub' => $addrub5]);
          User::where('account_id', $REQUSER)->update(['rub_all' => $addrub5 + $balance_all]);
          $datepay = date('Y-m-d H:i:s');
          HistoryPay::where('account_id', $REQUSER)->where('order_id', $REQORDERID)->update(['status_pay' => "true", 'date_pay' => $datepay, 'order_id_fk' => $REQUESTIDFK, 'last_balance' => $balance, 'new_balance' => $addrub5, 'procent_add' => $checkproc5]);

        }

        if ($REQREF != "false"){
          $referalprocent = ($REQAMOUNT * ( 20 / 100));
          $balanceparents = User::select('rub')->where('name', $REQREF)->value('rub');
          $addrubparents = ($balanceparents + $referalprocent);
          User::where('name', $REQREF)->update(['rub' => $addrubparents]);
          $dateadd = date('Y-m-d H:i:s');
          HistoryAddReferal::insert([
            ['account_id' => $REQREFID, 'account_name' => $REQREF, 'rub_add' => $referalprocent, 'referuser_account_id' => $REQUSER, 'referuser_account_name' => $REQUSERNAME, 'date_add' => $dateadd, 'order_id' => $REQORDERID, 'order_id_fk' => $REQUESTIDFK],
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
