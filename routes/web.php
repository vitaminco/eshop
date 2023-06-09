<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\DanhMucController;
use App\Http\Controllers\Admin\SanPhamController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;
use App\Models\SanPham;

Route::get('/', [Homecontroller::class, "index"])->name("home");

Route::get('/contact', [Homecontroller::class, "contact"]);

//Đường dẫn site quảm trị
///admin/{table}/{function}
Route::prefix("/admin")->name("admin.")->middleware("auth")->group(function () {
    Route::prefix("/danhmuc")->name("danhmuc.")->group(function () {
        Route::get('/danh_sach', [DanhMucController::class, "index"])->name("index");
        Route::get('/tao_danh_muc', [DanhMucController::class, "create"])->name("create");
        Route::get('/{id}/sua_danh_muc', [DanhMucController::class, "edit"])->name("edit");
        //id có ? là ko bắt buộc. id phải nằm ở cuối url
        Route::post('/luu/{id?}', [DanhMucController::class, "upsert"])->name("upsert");
        //xóa
        Route::post('/xoa/{id?}', [DanhMucController::class, "destroy"])->name("destroy");
    });

    Route::prefix("/sanpham")->name("sanpham.")->group(function () {
        Route::get('/danh_sach_san_pham', [SanPhamController::class, "index"])->name("index");
        Route::get('/tao_san_pham', [SanPhamController::class, "create"])->name("create");
        //sửa
        Route::get('/{id}/sua_san_pham', [SanPhamController::class, "edit"])->name("edit");
        //id có ? là ko bắt buộc. id phải nằm ở cuối url
        Route::post('/luu/{id?}', [SanPhamController::class, "upsert"])->name("upsert");
        //xóa
        Route::post('/xoa/{id?}', [SanPhamController::class, "destroy"])->name("destroy");
    });
});
//DĂNG KÍ
Route::get("/dang-ky", [AccountController::class, "register"])->name("account.register");
Route::post('/dang-ky', [AccountController::class, "save"])->name("account.save");
//ĐĂNG NHẬP
Route::get("/dang-nhap", [AccountController::class, "login"])->name("account.login");
Route::post("/dang-nhap", [AccountController::class, "auth"])->name("account.auth");
Route::get("/dang-xuat", [AccountController::class, "logout"])->name("account.logout");
