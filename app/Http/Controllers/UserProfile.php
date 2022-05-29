<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auction\Auction;
use App\ServerInfo;
use App\InfoPers72;
use App\Cladovka72;


use DB;
use Auth;
use Redirect;



class UserProfile extends Controller
{
  public function show() {

if(\Auth::check()){
  $personly = auth()->user()->pers72()->get();
    return view("profile", ['lot' => Auction::all()->where('status', '1')->toArray(), 'pers72' => $personly, 'cladovka' => auth()->user()->cladov_rup()->where('code', '0')->get(), 'userlothistory' => auth()->user()->user_lot()->where('name', 'not like', '@%')->get(), 'userreferlhistory' => auth()->user()->user_referlhistory()->get(), 'userlothistorybuy' => auth()->user()->user_lotbuy()->get()]);

}
else{
  return redirect('/login');


}

  }
}
