<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InfoPers72;
use App\GuildInfoPers;
use App\GuildInfo;
class TopInfoController extends Controller
{
  public function show() {

      return view("top", ['top100' => InfoPers72::where('permission', '!=' ,'100')->where('name', 'not like', '@%')->orderBy('exp', 'DESC')->take(100)->get(), 'guildid' => GuildInfoPers::get(), 'guild' => GuildInfo::get() ]);

}

}
