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

class SelectLaungeController extends Controller
{


public function view(Request $req) {

if ($req->input('ru')){
    return redirect('launcherru');
}
if ($req->input('en')){
    return redirect()->route('launcheren');
}

}

}
