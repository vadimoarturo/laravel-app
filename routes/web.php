<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ShopController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes(['verify' => true]);


Route::get('/', function () {
   return view('home');
})->name('home');

Route::get('/wiki', function () {
   return view('wiki');
})->name('wiki');

Route::get('/referal', function () {
   return view('referal');
})->name('referal');



Route::get('/laungelauncher', function () {
   return view('laungelauncher');
})->name('laungelauncher');

Route::get('/launcherru', function () {
   return view('launcherru');
})->name('launcherru');

Route::get('/launcheren', function () {
   return view('launcheren');
})->name('launcheren');


Route::get('/launge', function () {
   return view('launge');
})->name('launge');


//Обычные ссылки
Route::get('/profile', 'UserProfile@show')->name('profile');
Route::get('/shop', 'ShopController@product')->name('shop');
Route::get('/admin', 'AdminPanelController@adminshop')->name('admin');
Route::get('/top', 'TopInfoController@show')->name('top');
Route::get('/auction', 'AuctionController@show')->name('auction');

//Для модератора(мини админка)
Route::get('/block', 'BlockReset@block')->name('block');
Route::post('/giftguild', 'BlockReset@giftguild')->name('gift-guild');
Route::post('/searchplayer', 'BlockReset@search')->name('search-player');
Route::post('/blockchange', 'BlockReset@change')->name('block-change');
Route::post('/changebalance', 'BlockReset@changebalance')->name('rub-change');
Route::post('/changerateexp', 'BlockReset@changerateexp')->name('rateexp-change');
Route::post('/changeratedrop', 'BlockReset@changeratedrop')->name('dropexp-change');

//Антимакрос
Route::get('/antimacros', 'AntiMacrosController@antimacros')->name('antimacros');
Route::post('/antimacros/blockdrop', 'AntiMacrosController@blockdrop')->name('antimacros-blockdrop');

//Аукцион
Route::post('/auction/create', 'AuctionController@create')->name('auction-create');
Route::post('/auction/destroy', 'AuctionController@destroy')->name('auction-destroy');
Route::post('/auction/buy', 'AuctionController@buy')->name('auction-buy');

//Магазин
Route::post('/shop', 'ShopController@buy')->name('shop-buy');
Route::post('/shop/sex', 'ShopController@sex')->name('sex-buy');
Route::post('/shop/race', 'ShopController@race')->name('race-buy');
Route::post('/shop/guild', 'ShopController@guild')->name('guild-buy');


//FreeKassa
Route::post('/freekassa/oplata', 'FreeKassaController@pay')->name('shop-oplata');
Route::post('/freekassa/result', 'FreeKassaController@checkpay');
Route::get('/freekassa/success', 'FreeKassaController@success');
Route::get('/freekassa/error', 'FreeKassaController@error');

//Enot
Route::post('/enot/oplata', 'EnotController@pay')->name('shop-enot-oplata');
Route::post('/enot/result', 'EnotController@checkpay');
Route::get('/enot/success', 'EnotController@success');
Route::get('/enot/error', 'EnotController@error');



//Админка( не готовая )
Route::post('/change', 'AdminPanelController@change')->name('item-change');
Route::post('/remove', 'AdminPanelController@remove')->name('item-remove');
Route::post('/сreate', 'AdminPanelController@create')->name('item-create');
Route::get('/change', 'AdminPanelController@adminshop');
Route::get('/remove', 'AdminPanelController@adminshop');
Route::get('/сreate', 'AdminPanelController@adminshop');


//Заглушки
Route::get('/antimacros/blockdrop', function () {
   return redirect('/');
});

Route::get('/auction/buy', function () {
   return redirect('/auction');
});

Route::get('/auction/create', function () {
   return redirect('/auction');
});

Route::get('/freekassa/oplata', function () {
   return redirect('/shop');
});

Route::get('/freekassa/result', function () {
   return redirect('/shop');
});

Route::get('/shop/guild', function () {
   return redirect('/shop');
});

Route::get('/shop/race', function () {
   return redirect('/shop');
});

Route::get('/shop/sex', function () {
   return redirect('/shop');
});
