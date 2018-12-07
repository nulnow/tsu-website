<?php

use App\User;

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

// Показывает главную страницу
Route::view('/', 'welcome')->name('welcome');
// Показывает список преподавателей
Route::view('/teachers', 'teachers')->name('teachers');
// Показывает расписание
Route::view('/schedule', 'schedule')->name('schedule');

// Роуты для авторизации, сгенерированные Laravel
Auth::routes();

// Показывает страницу со всеми новостями кафедры
Route::get('/news', 'NewsController@index')->name('news');

// Эта группа роутов доступна только зарегистрированным пользователям
Route::middleware('auth')->group(function () {

    // Показывает страницу текущего пользователя
    Route::get('/me', 'UsersController@me')->name('me');
    // Показывает список всех пользователей
    Route::get('/users', 'UsersController@users')->name('users');

    // Главная страница внутреннего раздела
    Route::view('/social', 'social')->name('social');

    // Показывает страницу конкретного пользователя
    Route::get('/users/{user}', 'UsersController@user')->name('user');

    // Показывает список всех объявлений
    Route::get('/posts', 'PostsController@posts')->name('posts');
    // Показывает страницу с конкретным объявлением
    Route::get('/posts/{post}', 'PostsController@post')->name('post');
    // Создает объявление
    Route::post('/posts', 'PostsController@store');
    // Удаляет объявление
    Route::delete('/posts/{post}', 'PostsController@destroy');

    // Создает комментарий к объявлению
    Route::post('/posts/{post}/comments', 'CommentsController@store');
    // Удаляет комментарий
    Route::delete('/posts/{post}/comments/{comment}', 'CommentsController@destroy');
    
});

// Данная группа роутов доступна только поьзователям, имеющим роль admin
Route::middleware('role:admin')->group(function () {

    // Выводит панель администратора
    Route::get('/admin', 'AdminController@dashboard')->name('admin-dashboard');
    // Создает новость на сайте
    Route::post('/news', 'NewsController@store');
    // Создать польователя 
    Route::post('/users', 'UsersController@store');
    // Удалить пользователя
    Route::delete('/users/{user}', 'UsersController@destroy');

});