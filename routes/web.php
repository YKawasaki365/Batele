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

// Controller(TopicsController@index)を経由してwelcomeを表示させる
// Route::get('/', 'TopicsController@index');

// 正解()
Route::get('/', 'TopicsController@index');

// 正解
// Route::resource('topics', 'TopicsController');
Route::get('topics/create', 'TopicsController@create')->name('topics.create');

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

//見方・・・resource('テーブル名orURL末尾', 'Controller(及びアクション)')->name('別場所でのルーティングの際に引用する為のあだ名')
// ユーザ機能
Route::group(['middleware' => ['auth']], function () {

    // 投稿(要質問&検証)
    Route::post('topics', 'TopicsController@store')->name('topics.post');

    // 追加(お気に入り)
    Route::group(['prefix' => 'topics/{id}'], function () {
        Route::post('favorite', 'FavoritesController@store')->name('favorites.favorite');
        Route::delete('unfavorite', 'FavoritesController@destroy')->name('favorites.unfavorite');
        Route::get('favorites', 'FavoritesController@favorites')->name('favorites.favorites');
    });

    // 追加(投票)(取り消し=delete機能なし)
    Route::group(['prefix' => 'topics/{id}'], function () {
        Route::post('vote', 'VotesController@store')->name('votes.vote');
        Route::get('votes', 'VotesController@votes')->name('votes.votes');
    });

    // 追加(反論書き込み)(取り消し=delete機能なし)
    Route::group(['prefix' => 'topics/{id}'], function () {
        Route::post('comment', 'CommentsController@store')->name('favorites.favorite');
        Route::get('comments', 'CommentsController@comments')->name('favorites.favorites');
    });

    Route::resource('topics', 'TopicsController', ['only' => ['store', 'destroy']]);
});