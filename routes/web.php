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

/* Route::get('/hello', function () {
    return Auth::user()->hello();
}); */

/* Route::get('/add', function () {
    return \App\User::first()->add_friend(2);
});

Route::get('/accept', function () {
    return \App\User::find(2)->accept_friend(1);
}); 

Route::get('/friends', function () {
    return \App\User::find(4)->friends();
});

Route::get('/pending_friends', function () {
    return \App\User::find(4)->pending_friend_requests();
});

Route::get('/ids', function () {
    return \App\User::find(4)->friends_ids();
}); 

Route::get('/is_friends', function () {
    return \App\User::find(4)->is_friends_with(1);
});  */

Route::get('/check', function() {
    return \App\User::find(2)->has_pending_friend_request_from(1);
});

/* Route::get('/check_relationship_status/{id}', function($id) {
    return \App\User::find($id);
}); */

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Auth Routes
Route::group(['middleware' => 'auth'], function() {

    Route::get('/profile/{slug}', [
        'uses' => 'ProfileController@index'
    ])->name('my-profile');

    Route::get('/profile/edit/profile', [
        'uses' => 'ProfileController@edit'
    ])->name('edit-profile');

    Route::post('/profile/update/profile', [
        'uses' => 'ProfileController@update'
    ])->name('update-profile'); 

    Route::get('/check_relationship_status/{id}', [
        'uses' => 'FriendsController@check'
    ])->name('check');

    Route::get('/add-friend/{id}', [
        'uses' => 'FriendsController@addFriend'
    ])->name('add-friend');

    Route::get('/accept-friend/{id}', [
        'uses' => 'FriendsController@acceptFriend'
    ])->name('accept-friend');

    Route::get('get-unread', function() {
        return Auth::user()->unreadNotifications;
    });

    Route::get('/notifications', [
        'uses' => 'HomeController@notifications'
    ])->name('notifications');

    Route::post('/create/post', [
        'uses' => 'PostController@store'
    ])->name('create-post');

    Route::get('/feed', [
        'uses' => 'FeedsController@feed'
    ])->name('live-feed ');

    Route::get('/get-auth-user-data', function() {
        return Auth::user();
    });

    Route::get('/new-friends', [
        'uses' => 'FriendsController@newFriends'
    ])->name('new-friends');

});

