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
    return view('welcome');
});

// ======================== 1. Routing =======================================
// Đăng ký cơ bản của 1 routing bao gồm phương thức HTTP request, tham số request, tham số response
Route::get('/hello-world', function(){
    return 'Hello World!!!';
});

// HTTP request methods khác bao gồm: POST, PUT, PATH, DELETE => ĐỀU PHẢI CÓ CSRF TOKEN
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

// === view routes => truy cập trực tiếp view
Route::get('view-route', function(){
    return view('routing.viewRoute');
});

Route::view('demo-view-route', 'routing.viewRoute');

// truyền data vào view
Route::view('view-route-data', 'routing.viewRouteData', ['name' => 'Teo']);

// === Truyền tham số vào route

// Tham số bắt buộc
Route::get('/product/{name}/{id}', function($name, $id){
    return "Mã sản phẩm: {$id} - tên sản phẩm: {$name}";
    // {name}, {id} là tham số bắt buộc truyền vào URL
});

// Tham số không bắt buộc
Route::get('/movie/{movieName?}', function($movieName = null){
    return "Bạn đang xem phim {$movieName}";
});

// Ràng buộc tham số (biểu thức chính quy)
Route::get('/product-detail/{id}', function($id){
    return "Mã sp: {$id} bắt buộc là số";
    // {name}, {id} là tham số bắt buộc truyền vào URL
})->where('id', '[0-9]+');

// Ràng buộc nhiều tham số
Route::get('/product-detail/{name}/{id}', function($name, $id){
    return "Mã sp:{$id} là số, Tên sp: {$name} là chữ";
    // {name}, {id} là tham số bắt buộc truyền vào URL
})->where(['id' => '[0-9]+', 'name' => '[A-Za-z]+']);


// === Named Routes
Route::get('/profile-detail/{id}', function($id){
    return "Thông tin người dùng có id: {$id}";
})->where('id', '[0-9]+')->name('profile.detail');

// === Group Routes

// Route::get('/admin/slides', function () {
//     return 'admin - slides';
// })->name('admin.slides');

// Route::get('/admin/categories', function () {
//     return 'admin - categories';
// })->name('admin.categories');

// Route::get('/admin/products', function () {
//     return 'admin - products';
// })->name('admin.products');

Route::group([
    'prefix' => 'admin', // tiền tố của đường dẫn URL
    'as' => 'admin.' // tiền tố của name route
], function () {
    Route::get('slides', function ($id) {
        return 'admin - slides';
    })->name('slides');

    Route::get('categories', function ($id) {
        return 'admin - categories';
    })->name('categories');

    Route::get('products', function ($id) {
        return 'admin - products';
    })->name('products');
});

// === Route::fallback => thiết lặp route nếu không tồn tại trang
Route::fallback(function(){
    return 'không tìm thấy trang yêu cầu';
});