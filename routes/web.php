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

// ======================== 1. Routing ========================
// ===== Đăng ký cơ bản của 1 routing bao gồm phương thức HTTP request, tham số request, tham số response
Route::get('/hello-world', function(){
    return 'Hello World!!!';
});

// ===== HTTP request methods khác bao gồm: POST, PUT, PATH, DELETE => ĐỀU PHẢI CÓ CSRF TOKEN
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

// ===== view routes => truy cập trực tiếp view
Route::get('view-route', function(){
    return view('routing.viewRoute');
});

Route::view('demo-view-route', 'routing.viewRoute');

// truyền data vào view
Route::view('view-route-data', 'routing.viewRouteData', ['name' => 'Teo']);

// ===== Truyền tham số vào route

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


// ===== Named Routes
Route::get('/profile-detail/{id}', function($id){
    return "Thông tin người dùng có id: {$id}";
})->where('id', '[0-9]+')->name('profile.detail');

// ===== Group Routes

// Route::get('/admin/slides', function () {
//     return 'admin - slides';
// })->name('admin.slides');

// Route::get('/admin/categories', function () {
//     return 'admin - categories';
// })->name('admin.categories');

// Route::get('/admin/products', function () {
//     return 'admin - products';
// })->name('admin.products');

// Route::group([
//     'prefix' => 'admin', // tiền tố của đường dẫn URL
//     'as' => 'admin.' // tiền tố của name route
// ], function () {
//     Route::get('slides', function ($id) {
//         return 'admin - slides';
//     })->name('slides');

//     Route::get('categories', function ($id) {
//         return 'admin - categories';
//     })->name('categories');

//     Route::get('products', function ($id) {
//         return 'admin - products';
//     })->name('products');
// });

// ===== Route::fallback => thiết lặp route nếu không tồn tại trang
Route::fallback(function(){
    return 'không tìm thấy trang yêu cầu';
});

// ======================== 2. Middleware ========================
// Bước 1: tạo middlewware bằng artisan
//         - Định nghĩa bộ lọc cho middleware mới tạo
// Bước 2: Đăng ký middleware
// Bước 3: Gán middleware cho route hoặc trong controller

// ===== demo làm việc middleware cơ bản
Route::get('check-age/{age}', function($age){
    return "{$age} Tuổi. Được phép truy cập web";
    // sử dụng middleware
})->middleware('check.age');
// check.age => tên middleware sử dụng

Route::get('access-denied', function(){
    return "Không được phép truy cập website này";
})->name('accessDenied');

// ===== sử dụng after middleware
Route::get('check-number/{number}', function($number) {
    return redirect()->route('sochan', ['num' => $number]);
})->middleware('check.number');
// check.number => tên middleware sử dụng

Route::get('so-chan/{num}', function($number){
    return "{$number} : Số Chẵn";
})->name('sochan');

Route::get('so-le/{num}', function($number){
    return "{$number} : Số Lẻ";
})->name('sole');

// ===== Truyền tham số vào middleware
Route::get('order-detail', function(){
    return "<h1>Xem Chi tiết đơn hàng</h1>";
})->middleware('check.role:admin');
// check.role => tên middleware sử dụng
// :admin => là tham số truyền vào middleware

Route::get('not-access', function(){
    return "<i>Không có quyền truy cập</i>";
})->name('notAccess');

// ======================== 3. Controller ========================
// 1. Tạo controller
// 2. Đăng ký route cho controller

Route::get('first-controller', 'FirstController@index');
//hoặc
use App\Http\Controllers\FirstController;
Route::get('first-demo', [FirstController::class,'demo']);

// === sử dụng middlware trong controller
Route::get('first-foo', 'FirstController@foo');
Route::get('first-bar', 'FirstController@bar');

// === truyền tham số vào trong controller
Route::get('get-data/{id}', 'FirstController@getData');

// === gọi view trong controller
Route::get('show-login', 'FirstController@showLogin')->name('show.login');

// ======================== 4. Request ========================

// ======================== 5. Response ========================

// ======================== 6. Blade Templates ========================
Route::post('handle-login', 'FirstController@handleLogin')->name('handle.login');

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin'
], function(){
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('slide', 'SlideController@index')->name('slide');
});

// ======================== 6. Migrations ========================
// 1. tạo migrate --create
// 2. Định nghĩa migrate
// 3. chạy migrate

// === Điều chỉnh sửa các cột trong bảng
// 1. Chạy lệnh CLI: composer require doctrine/dbal
// 2. Tạo migrate --table
// 3. Định nghĩa migrate
// 4. chạy migrate

// ======================== 7. Seeder ========================
// 1. Tạo seeder
// 2. Insert dữ liệu trong seeder
// 3. Chạy seeder

// ======================== 8. Query builder ========================
Route::group([
    'prefix' => 'query-builder',
    'as' => 'query.builder.',
    'namespace' => 'Query'
], function(){
    Route::get('get-data', 'QueryBuilderController@getData');
    Route::get('query-select', 'QueryBuilderController@querySelect');
    Route::get('query-agg', 'QueryBuilderController@queryAgg');
    Route::get('query-where', 'QueryBuilderController@queryWhere');
    Route::get('query-search', 'QueryBuilderController@querySearch');
    Route::get('query-join', 'QueryBuilderController@queryJoin');
    Route::get('query-limit-data', 'QueryBuilderController@queryLimitData');
    Route::get('query-insert', 'QueryBuilderController@queryInsert');
    Route::get('query-update', 'QueryBuilderController@queryUpdate');
    Route::get('query-delete', 'QueryBuilderController@queryDelete'); 
});

// ======================== 9. Eloquent ORM ========================
// 1. Tạo model
// 2. Định nghĩa model + tạo mối quan hệ giữa các model

Route::group([
    'prefix' => 'eloquent-orm',
    'as' => 'eloquent.orm.',
    'namespace' => 'Eloquent'
], function(){
    Route::get('get-data', 'OrmController@getData')->name('get.data');
    Route::get('insert-data', 'OrmController@insertData')->name('insert.data');
    Route::get('update-data', 'OrmController@updateData')->name('update.data');
    Route::get('delete-data', 'OrmController@deleteData')->name('delete.data');
});