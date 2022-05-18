<?php

use App\Http\Controllers\Web\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
    // Register-login
    Route::get('login','AuthController@showFormLogin')->name('admin.show-form-login');
    Route::post('login','AuthController@login')->name('admin.login');
    Route::get('register','AuthController@showFormRegister')->name('admin.show-form-register');
    Route::post('register-save','AuthController@register')->name('admin.register');
    Route::get('dashboard','AuthController@dashboard')->name('admin.dashboard');
    Route::get('logout','AuthController@logout')->name('admin.logout');
    Route::get('profile','ProfileController@index')->name('admin.show-profile');
    Route::put('profile/{id}','ProfileController@store')->name('admin.profile');

    Route::group(['middleware' => ['admin_login']], function() {
        //comment
        Route::get('list-comments','CommentController@show_list_comment')->name('admin.show-list-comments')->middleware('check_per:View Comment');
        Route::post('allow-comments','CommentController@allow_comment')->name('admin.allow-comments');
        Route::post('reply-comment','CommentController@reply_comment')->name('admin.reply-comments');
        Route::delete('delete-comments/{id}','CommentController@delete_comment')->name('admin.delete-comments');
        Route::post('update-comments/{id}','CommentController@update_comment')->name('admin.update-comments')->middleware('check_per:Delete Comment');

        //Roles
        Route::get('show-role','RoleController@index')->name('admin.show-role')->middleware('check_per:View Role');
        Route::get('create-role','RoleController@create')->name('admin.create-role')->middleware('check_per:Create Role');
        Route::post('save-role','RoleController@store')->name('admin.save-role');
        Route::get('edit-role/{id}','RoleController@edit')->name('admin.edit-role')->middleware('check_per:Edit Role');
        Route::put('update-role/{id}','RoleController@update')->name('admin.update-role');
        Route::delete('delete-role/{id}','RoleController@destroy')->name('admin.delete-role')->middleware('check_per:Delete Role');

        //Categories
        Route::group(['prefix' => 'category'], function() {
            Route::get('show-category', 'CategoryController@index')->name('admin.show-category')->middleware('check_per:View Category');
            Route::get('create-category', 'CategoryController@create')->name('admin.create-category')->middleware('check_per:Create Category');
            Route::post('save-category', 'CategoryController@store')->name('admin.save-category');
            Route::get('edit-category/{id}', 'CategoryController@edit')->name('admin.edit-category')->middleware('check_per:Edit Category');
            Route::put('update-category/{id}', 'CategoryController@update')->name('admin.update-category');
            Route::delete('delete-category/{id}', 'CategoryController@destroy')->name('admin.delete-category')->middleware('check_per:Delete Category');
        });

        //Users
        Route::group(['prefix' => 'user'], function() {
            Route::get('show-user', 'UserController@index')->name('admin.show-user')->middleware('check_per:View User');
            Route::get('create-user', 'UserController@create')->name('admin.create-user')->middleware('check_per:Create User');
            Route::post('save-user', 'UserController@store')->name('admin.save-user');
            Route::get('edit-user/{id}', 'UserController@edit')->name('admin.edit-user')->middleware('check_per:Edit User');
            Route::put('update-user/{id}', 'UserController@update')->name('admin.update-user');
            Route::delete('delete-user/{id}', 'UserController@destroy')->name('admin.delete-user')->middleware('check_per:Delete User');
            Route::get('get-role/{id}','UserController@getRoles')->name('admin.get-role');
            Route::put('update-role-user/{id}', 'UserController@updateRoleUser')->name('admin.update-role-user');
        });

        //Posts
        Route::group(['prefix' => 'post'], function() {
            Route::get('show-post', 'PostController@index')->name('admin.show-post')->middleware('check_per:View Post');
            Route::get('create-post', 'PostController@create')->name('admin.create-post')->middleware('check_per:Create Post');
            Route::post('save-post', 'PostController@store')->name('admin.save-post');
            Route::get('edit-post/{id}', 'PostController@edit')->name('admin.edit-post')->middleware('check_per:Edit Post');
            Route::put('update-post/{id}', 'PostController@update')->name('admin.update-post');
            Route::delete('delete-post/{id}', 'PostController@destroy')->name('admin.delete-post')->middleware('check_per:Delete Post');
        });
    });
});

//WEB
Route::group(['namespace' => 'Web'], function() {
    //Posts
    Route::get('/show-post', 'PostController@index')->name('web.show-post');
     Route::get('detail-post/{id}', 'PostController@show')->name('web.detail-post');
    //Comments web
    Route::post('load-comment', 'CommentController@load_comment')->name('web.load-comment');
    Route::post('send-comment', 'CommentController@send_comment')->name('web.send-comment');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
