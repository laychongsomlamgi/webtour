<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
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
Route::get('/', 'HomeController@index')->name('homePage');
//login
Route::get('/login', 'Auth\LoginController@index');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::get('/register', 'Auth\RegisterController@index');
Route::post('/register', 'Auth\RegisterController@register')->name('register');
Route::get('logout', 'Auth\LoginController@logout');

Route::get('/private', function(){
    return '<h1>Chính sách riêng tư</h1>';
});
//Facebook
Route::get('/loginFacebook', function (){
    return Socialite::driver('facebook')->redirect();
});

Route::get('/loginFacebook/callback', function (){
    $user = Socialite::driver('facebook')->user();
    echo $user->getEmail().'<br>';
    echo $user->getName().'<br>';
});
//google
Route::get('/loginGoogle', function (){
    return Socialite::driver('google')->redirect();
});

Route::get('/loginGoogle/callback', function (){
    $user = Socialite::driver('google')->user();
    echo $user->getEmail().'<br>';
    echo $user->getName().'<br>';
});
//admin
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::get('dashboard', 'AdminController@index')->name('dashboard');
    Route::resource('category', 'CategoryController');
    Route::resource('tour', 'TourController');
    Route::resource('tourguide', 'TourGuideController');
    Route::resource('account', 'AccountController');
    Route::resource('news', 'NewsController');
    Route::get('bill', 'BillController@index');
    Route::get('billdetail/{id}', 'BillController@detail');
});

Route::get('/', 'PageController@getInfo');

//Xem chi tiết
Route::get('/detailTour/{id_name}', 'PageController@getDetail');
//Xem danh mục tour
Route::get('/categoryTour/{id}', 'PageController@getCategory');
//Dat tour
Route::get('/bookTour/{id}', 'BookTourController@index');
Route::post('/orderTour/{id}', 'BookTourController@orderTour')->name('orderTour');
Route::get('/orderPage/{id}', 'BookTourController@showOrder')->name('orderPage');
Route::match(['get', 'post'],'/pay/{id}', 'BookTourController@pay')->name('pay');
Route::post('/vnpay/{id}', 'PaymentController@vnpay')->name('vnpay');

//Search
Route::get('/search', 'PageController@search')->name('search');
//Tour cua toi
Route::get('/unpaid', 'PageController@unpaid');
Route::get('/paid', 'PageController@paid');
Route::get('/detailPaid/{id}', 'PageController@detailPaid');

//Tin tuc
Route::get('/newsPage', 'PageController@news');
Route::get('/newsDetail/{id}', 'PageController@newsDetail');
