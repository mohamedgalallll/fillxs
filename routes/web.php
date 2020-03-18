<?php
Route::get('/createStorage', function () {
    Artisan::call('storage:link');
});
Route::get('/search', 'HomeController@search');
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
// index home

Route::get('/', 'HomeController@index')->name('home');
// Auth
Auth::routes();
//////////
Route::get('/addads', function () {
    return view('ads.choseAd');
});
Route::get('/ads', 'AdController@Ads');
Route::get('/getSubCategories', 'AdController@GetSubCategories');


Route::get('/ads/Details/{id}', 'AdController@Details');



// middleware

Route::group(['middleware' => 'auth'], function () {
    // -----------------------------ads
    Route::get('/chooseAds', 'CategoryController@chooseAds');
    Route::get('/Category/{id}', 'Sub_CategoryController@chooseSub');

    Route::get('/Category/{cat_id}/sub/{sub_id}', 'AdController@index');
    Route::post('/Category/{cat_id}/sub/{sub_id}', 'AdController@store');
    // Route::post('/insert/ad/', 'AdController@store');

    Route::get('/myfavourites', function () {
        return view('user_setting.myfavourites');
    });
    // Profile User
    Route::get('/profile', 'UserController@profile')->name('profile');
    // Update profile
    Route::patch('/profile/{id}', 'UserController@update');
    //updateName
    Route::patch('/username/{id}', 'UserController@updateName');
    // Account  Setting
    Route::get('/account/setting', 'UserController@account')->name('account');
    // Delete Account
    Route::get('/account/{id}/delete', 'UserController@destroy');
    // ------------------change-password---------------------------------------
    Route::get('/change-password', 'Auth\ChangePasswordController@updatePassword')->name('password.change');
});
// middleware Admin
Route::group(['middleware' => 'admin'], function () {
    // admin
    Route::get('/admin', 'HomeController@admin');
    // All Users
    Route::get('/All/Users', 'UserController@AllUsers');
    Route::get('/delete/user/{id}', 'UserController@DeleteUser');
    // ------------------Category dashboard
    Route::get('/allcategories', 'CategoryController@index')->name('allcategories');
    Route::get('/addCategory', 'CategoryController@create')->name('addCategory');
    Route::post('/saving', 'CategoryController@store')->name('saving');
    Route::get('/edit/{id}', 'CategoryController@edit');
    Route::patch('/update/{id}', 'CategoryController@update');
    Route::get('/categry/delete/{id}', 'CategoryController@destroy');
    // ------------------Sub_Category dashboard
    Route::get('/allSubcategories', 'Sub_CategoryController@index')->name('Sub_Categories');
    Route::get('/addSubCategory', 'Sub_CategoryController@create')->name('addSubCategory');
    Route::post('/saveSubCategory', 'Sub_CategoryController@store')->name('save.sub');
    Route::get('/GetSubCategory/{id}', 'Sub_CategoryController@show');
    Route::get('/editSubCategory/{id}', 'Sub_CategoryController@edit');
    Route::patch('/updateSubCategory/{id}', 'Sub_CategoryController@update');
    Route::get('/SubCategory/delete/{id}', 'Sub_CategoryController@destroy');
//    --------------- ads in admin
    Route::get('/approve', 'AdController@allAds')->name('allAds');
    Route::get('/showAd/{id}', 'AdController@oneAD')->name('oneAD');
    Route::get('/approve/{id}', 'AdController@approve')->name('approve');
    Route::get('/reject/{id}', 'AdController@reject')->name('reject');
    Route::get('/myads', 'AdController@myAds');

});



