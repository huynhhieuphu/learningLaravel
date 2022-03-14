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

Route::get('/', function () {
    // return view('welcome');
    return 'welcome laravel';
});

// === 1. Routing ===
Route::get('/hello-world', function(){
    return 'Hello World!!!';
});

// HTTP request methods: POST, PUT, PATH, DELETE => PHẢI CÓ CSRF TOKEN
Route::post('/api/method-post', function(){
    return 'This is method POST';
});

Route::put('/api/method-put', function(){
    return 'This is method PUT';
});

Route::patch('/method-patch', function(){
    return 'This is method PATCH';
});

Route::delete('/method-delete', function(){
    return 'This is method DELETE';
});

// method MATCH => cho phép chạy các phương thức HTTP request chỉ định
Route::match(['get','post'], '/get-or-post', function(){
    return 'Cho phép chạy phương thức GET hoặc POST';
});

// method ANY => cho phép chạy bất kỳ phương thức HTTP request
Route::any('/method-any', function(){
    return 'Chạy bất kỳ phương thức HTTP request nào cũng được';
});
