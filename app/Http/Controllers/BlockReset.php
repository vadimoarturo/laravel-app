<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;
use Redirect;
use App\InfoPers72;
use App\InfoRate;
use App\Shop\InsertItem;
use App\GiftGuild;
use DateTime;

class BlockReset extends Controller
{

  public function block(Request $request) {
  if (\Auth::check() ){
      if(Auth::user()->ffadminprivgg == "YESSUKA" || Auth::user()->ffadminprivgg == "YESSUKAPRO"){

      if ( $request->input('login') ){
        return view("block", ['users' => User::where('name', $request->input('login'))->paginate(10), 'pers' => InfoPers72::get(), 'rate' => InfoRate::get()]);

      }
      else{
                return view("block", ['users' => User::paginate(10), 'pers' => InfoPers72::get(), 'rate' => InfoRate::get()]);
      }
    }

      else{
              return  redirect('/');
      }

  }
  else{
      return  redirect('/');  }
}


public function search(Request $request) {
if($request->input('login_name')){

if(User::select('name')->where('name', $request->input('login_name'))->exists()){
return redirect('/block?login='.$request->input('login_name'));
}

else{
  return Redirect::back()->with('error_login', 1);

}
}

else{
if(InfoPers72::select('account')->where('name', $request->input('name_pers'))->exists()){
  $persname = InfoPers72::select('account')->where('name', $request->input('name_pers'))->value('account');
  return redirect('/block?login='.$persname);
}
else{
  return Redirect::back()->with('error_name', 1);

}
}

}


public function change(Request $req) {
  if ($req->input('set') == 1 ){
    User::where('name', $req->input('where'))->update(['block' => $req->input('set')]);
    $cfgPort    = '65530';
    $cfgTimeOut = '5';
    $cfgServer = '10.0.0.3';

    $persname = InfoPers72::select('name')->where('account', $req->input('where'))->where('name', 'not like', '@%')->get();
    foreach ($persname as $namepers) {
    $f=fsockopen($cfgServer,$cfgPort,$cfgTimeOut);

    if (!$f)
    {
    echo "<pre>";
    echo "not connected\\r\
    ";

    }
    else
    {

      $perscommand = $namepers->name;
      $persconvert = iconv ('utf-8', 'windows-1251', $perscommand);
      $paswd = env('CONSOLE_PAWSD');
      $command = "#kick('".$persconvert."')";

        fputs ($f, "$paswd\r\n");
        fputs ($f, "$command\r\n");
        fputs ($f, " "); // this space bar is this for long output

    fclose($f);

    }
          }
  }
  else {
      User::where('name', $req->input('where'))->update(['block' => $req->input('set')]);
  }


}

public function changerateexp(Request $req) {
  $now = date('Y-m-d H:i:s');
  $date = new DateTime($now);
  $datechange =  $date->format('Y-m-d\TH:i:s.v');
  InfoRate::where('server_id', $req->input('serverid'))->update(['server_exp' => $req->input('exprate'), 'last_change' => $datechange, 'change_name' => Auth::user()->name]);

$cfgPort    = '65530';
$cfgTimeOut = '5';
$cfgServer = '10.0.0.3';

$f=fsockopen($cfgServer,$cfgPort,$cfgTimeOut);

if (!$f)
{
echo "<pre>";
echo "not connected\\r\
";

}
else
{

$command = "set game.exp_rate ".$req->input('exprate')."";

$paswd = env('CONSOLE_PAWSD');
fputs ($f, "$paswd\r\n");
fputs ($f, "$command\r\n");
fputs ($f, " "); // this space bar is this for long output

fclose($f);

}

}

public function changeratedrop(Request $req) {
  $now = date('Y-m-d H:i:s');
  $date = new DateTime($now);
  $datechange =  $date->format('Y-m-d\TH:i:s.v');
InfoRate::where('server_id', $req->input('serverid'))->update(['server_drop' => $req->input('droprate'), 'last_change' => $datechange]);


$cfgPort    = '65530';
$cfgTimeOut = '5';
$cfgServer = '10.0.0.3';

$f=fsockopen($cfgServer,$cfgPort,$cfgTimeOut);

if (!$f)
{
echo "<pre>";
echo "not connected\\r\
";

}
else
{

$command = "set game.item_drop_rate ".$req->input('droprate')."";

$paswd = env('CONSOLE_PAWSD');
fputs ($f, "$paswd\r\n");
fputs ($f, "$command\r\n");
fputs ($f, " "); // this space bar is this for long output

fclose($f);

}

}



public function changebalance(Request $req) {

$balance = User::select('rub')->where('name', $req->input('accountname'))->value('rub');
$addrub = round($req->input('setrub'), 2);

User::where('name', $req->input('accountname'))->update(['rub' => $addrub]);


}



public function giftguild(Request $req) {

$checkgift = User::select('gift_guild')->where('account_id', $req->input('wherename'))->value('gift_guild');
if($checkgift == 1){
    return Redirect::back()->with('error_giftguild', 1);
  die;
}

User::where('account_id', $req->input('wherename'))->update(['gift_guild' => $req->input('setint')]);

  $now = date('Y-m-d H:i:s');
  $date = new DateTime($now);
  $datebuy =  $date->format('Y-m-d\TH:i:s.v');
  $datevalid = $date->modify('+1 month');
  $datevalid = $date->format('Y-m-d\TH:i:s.v');

  $giftguildid = GiftGuild::all();
foreach ($giftguildid as $buy_id) {
  InsertItem::insert([
      ['buy_id' => $buy_id->gift_id, 'account_id' => $req->input('wherename'), 'server_name' => "RE1", 'taken_account_id' => $req->input('wherename'), 'item_code' => $buy_id->gift_id, 'item_count' => $buy_id->count, "rest_item_count" => $buy_id->count, "confirmed" => "True", "confirmed_time" => $datevalid, "bought_time" => $datebuy, "valid_time" => $datevalid, "taken_time" => $datevalid, "isCancel" => "False" ],
  ]);
}


}





}
