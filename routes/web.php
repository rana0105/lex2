<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::get('/config-cache', function() {
    Artisan::call('config:cache');
    return "Cache is Config";
});

Route::get('/key-generate', function() {
    Artisan::call('key:generate');
    return "key is generated";
});


Route::get('/', function () {
    return redirect()->route('context.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware'=>'auth'], function(){

    	// Dashboard
//	Route::get('dashboard', 'DashboardController@index')->name('dashboard');
        //Context
    Route::get('contextlist', 'ContextController@index')->name('context.index');
    Route::get('context/create', 'ContextController@create')->name('context.create');
    Route::post('context/create', 'ContextController@store')->name('context.store');
    Route::get('/deleteContext/{id}', 'ContextController@deleteContext');
    Route::get('add-term/{id}', 'ContextController@addTermContext')->name('addTermContext');
    Route::post('addTerm', 'ContextController@addTerm')->name('addTerm');
    Route::get('editcontext/{id}', 'ContextController@editcontext')->name('editcontext');
    Route::post('editcontext', 'ContextController@posteditcontext')->name('posteditcontext');
    Route::get('viewmore/{id}', 'ContextController@viewmore')->name('viewmore');

        //Article
    Route::get('articlelist', 'ArticleController@index')->name('article.index');
    Route::get('article/view/{id}', 'ArticleController@viewDetails');
    Route::get('article/create', 'ArticleController@create')->name('article.create');
    Route::get('article/edit/{id}', 'ArticleController@edit');
    Route::post('article/update', 'ArticleController@update')->name('article.update');

    Route::post('article/save', 'ArticleController@store')->name('article.store');
    Route::get('article/delete/{id}', 'ArticleController@destroy');
    

        //Term
    Route::get('termlist', 'TermController@index')->name('term.index');
    Route::get('term/create', 'TermController@create')->name('term.create');
    Route::post('post-term', 'TermController@storeTerm')->name('term.store');
    Route::get('edit-term/{id}', 'TermController@editTerm')->name('editTerm');
    Route::post('edit-term', 'TermController@updateTerm')->name('term.update');
    Route::get('/deleteTerm/{id}', 'TermController@deleteTerm');
        //Search
    Route::get('advancedsearch', 'AdvnacedSearchController@index')->name('advancedsearch.index');
    Route::get('advancedSearchp', 'AdvnacedSearchController@advancedSearch');

    //Profile
    Route::get('profile', 'UserProfile@edit')->name('user.profile');
    Route::post('profile/save', 'UserProfile@update')->name('user.profileUpdate');
    //Password
    Route::get('changePassword', 'PasswordController@index')->name('password.index');
    Route::post('changePassword/update', 'PasswordController@store')->name('password.change');


    Route::group(['middleware' => 'admin'], function () {
            //Term
    Route::get('users', 'UserController@index')->name('user.index');
    Route::post('user/create', 'UserController@store')->name('user.create');
    });


});

