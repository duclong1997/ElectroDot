<?php

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

Route::get('/', function () {
    return view('welcome');
});

// index page
Route::group(['prefix'=>'/index'],function(){
    // header
    Route::get('/header',function(){
        return view('head/header');
    });

    // foot
    Route::get('/foot',function(){
        return view('foot/footer');
    });
    // new product
    Route::get('/product',function(){
        return view('detail/newProducts');
    });
      // top selling
      Route::get('/top',function(){
        return view('detail/topSelling');
    });
       // hot deal
       Route::get('/hot',function(){
        return view('detail/hotDeal');
    });
    // mini top selling
    Route::get('/minitopsell',function(){
        return view('detail/miniTopSelling');
    });
        // sign up  new Letter
    Route::get('/signup',function(){
        return view('detail/signupNewLetter');
    });
        // sign up  new Letter
    Route::get('/collection',function(){
        return view('detail/categoryCollection');
    });
    Route::get('/default', function(){
        return view('page_default/form_page');
    });
 
});
// home page
Route::group(['prefix'=>'/home','as'=>'home'],function(){
    route::get('/','HomepagesController@view')->name('index');
    route::post('/search','HomepagesController@seachPro')->name('search');
    route::get('/get/{id}','HomesController@getPro')->name('getID');
});
// login
Route::group(['prefix'=>'/login'],function(){
    route::get('/','LoginsController@view')->name('index');
    route::post('/search','LoginsController@seachPro')->name('search');
    route::get('/get/{id}','loginsController@getPro')->name('getID');
    route::post('/login','loginsController@checkLogin')->name('check');
});

// Sign up
Route::group(['prefix'=>'/signup'],function(){
    route::get('/','SignupsController@view')->name('index');
    route::post('/register','SignupsController@register')->name('signiup');
});

// Profile
Route::group(['prefix'=>'/profile'],function(){
    route::get('/','ProfilesController@view')->name('index');
});