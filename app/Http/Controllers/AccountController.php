<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    //dăng kí tài khoảng
    public function register()
    {
        return view("account/register");
    }

    public function save(Request $request)
    {
        $this->customValidate($request);
        //validate dữ liệu
        # tất cả dữ lieu là bắt buộc
        # Họ và tên và mật khẩu ko ít hơn 4 kí tự
        # mk và mã xác nhận phải giống nhau; email là duy nhất ko tần tại 2 mail giống nhau trong databasse

    }

    private function customValidate(Request $request)
    {
        $rules = [
            "name" => ["required", "min:4"], //not null min 3 k tự max 100 kí tự
            "password" => ["required", "min:4", "same:cf_password"],
            "cf_password" => ["required"],
            "email" => ["required", "unique:users,email"], //unique
        ];
        $request->validate($rules);
    }
}
