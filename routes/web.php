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

Route::get('/', 'TopicsController@index');

Route::resource('topics', 'TopicsController');
Route::get('topics/create', 'TopicsController@create')->name('topics.create');

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

//見方･･･resource('URL末尾名(任意ok?)', 'Controller@アクション名')->name('bladeから引用する際のあだ名。任意ok')
// ユーザ機能
Route::group(['middleware' => ['auth']], function () {

    // 投稿
    Route::post('topics', 'TopicsController@store')->name('topics.post');

    // 追加(反論書き込み)(取り消し=delete機能なし)
    Route::group(['prefix' => 'topics/{id}'], function () {
        Route::post('comment', 'CommentsController@store')->name('comments.comment');
        Route::get('comments', 'CommentsController@comments')->name('comments.comments');
    });

    // 追加(お気に入り)
    Route::group(['prefix' => 'topics/{id}'], function () {
        Route::post('favorite', 'FavoritesController@store')->name('favorites.favorite');
        Route::delete('unfavorite', 'FavoritesController@destroy')->name('favorites.unfavorite');
        Route::get('favorites', 'FavoritesController@favorites')->name('favorites.favorites');
    });

    // 追加(AB投票)(取り消し=delete機能なし)
    Route::group(['prefix' => 'topics/{id}'], function () {
        Route::post('a_vote', 'A_votesController@store')->name('a_votes.vote');
        Route::get('a_votes', 'A_votesController@a_votes')->name('a_votes.votes');
        Route::post('b_vote', 'B_votesController@store')->name('b_votes.vote');
        Route::get('b_votes', 'B_votesController@b_votes')->name('b_votes.votes');
    });

    Route::resource('topics', 'TopicsController', ['only' => ['store', 'destroy']]);
});