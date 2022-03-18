<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use voku\helper\AntiXSS; // import thư viện AntiXSS

// Một controller luôn luôn kế thừa từ class controller Laravel
class FirstController extends Controller
{
    protected $antiXss;

    public function __construct()
    {
        // tạo 1 đối tượng AntiXSS;
        $this->antiXss = new AntiXSS();

        // Sử dụng middleware trong phương thức __construct()
        // Dùng middleware lên tất cả phương thức trong controller
        // $this->middleware('check.role:user');

        // Dùng middleware lên các phương thức chỉ định trong controller
        // $this->middleware('check.role:user')->only('demo');

        // Loại trừ các phương thức dùng middleware trong controller
        // $this->middleware('check.role:user')->except(['foo','bar']);
    }

    public function index()
    {
        return 'This is function: <strong>' . __FUNCTION__ . 
        '</strong> - class: <strong>' . __CLASS__  . '</strong>';
    }

    public function demo()
    {
        return 'This is function: <strong>' . __FUNCTION__ . 
        '</strong> - class: <strong>' . __CLASS__  . '</strong>';;
    }

    public function foo()
    {
        return 'This is function: <strong>' . __FUNCTION__ . 
        '</strong> - class: <strong>' . __CLASS__  . '</strong>';;
    }

    public function bar()
    {
        return 'This is function: <strong>' . __FUNCTION__ . 
        '</strong> - class: <strong>' . __CLASS__  . '</strong>';;
    }

    public function getData(Request $request)
    {
        $id = $request->id;
        //lấy tham số trên URL theo kiểu query string
        $name = $request->query('name'); // hoặc $request->name;
        $age = $request->query('age');
        $queryString = $request->getQueryString();
        return "id: {$id} - name: {$name} - age: {$age} - queryString: {$queryString}";
    }

    public function showLogin()
    {
        // Response trả về 1 view
        // nạp vào view - load form login
        return view('login.login_view'); // tương đương đường dẫn login/login_view
    }

    public function handleLogin(Request $request)
    {
        // dd($request->all());
        // dd() => phương thức fix lỗi tương tự var_dump(), die()
        // $request->all() => lấy ra tất cả request gửi lên
        
        // Dùng hàm xss_clean() để loại bỏ xss
        // Dùng hàm strip_tags() để xoá bỏ các HTML entities
        $user = $this->antiXss->xss_clean($request->username);
        $pass = strip_tags($request->password);

        if($user === 'admin' && $pass === '1234567890') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('show.login', ['message' => 'fail']);
    }
}
