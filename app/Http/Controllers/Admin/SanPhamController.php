<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Validator;

class SanPhamController extends Controller
{

    public function index()
    {
        //cách 1: $data = DanhMuc::orderBy("id", "desc")->get();
        //cách 2: $data= DanhMuc::all();
        //cách 3: paginate có thê phân trangs số dòng 1 trang
        $data = SanPham::orderBy("id", "asc")->paginate(9);
        //cash 1:
        return view("admin.sanpham.index")->with("data", $data);
        //cashc 2: return view("admin.danhmuc.index" compact("data"));
    }


    public function create()
    {
        return view("admin.sanpham.create");
    }

    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function upsert(Request $request, $id = null)
    {
        $data = $request->all();
        unset($data["_token"]);

        //ràng buộc dữ liệu tối thiểu và tối da
        $this->customValidate($request);
        //update hoặc insert
        SanPham::updateOrCreate(["id" => $id], $data);
        if ($id == null) {
            $msg = "Thêm thành công";
        } else {
            $msg = "Cập nhật thành công!!! verrry goood!";
        }
        return redirect()->route('admin.sanpham.index')->with("success_msg", $msg);
    }

    public function destroy($id)
    {
        $dm = SanPham::findOrFail($id);
        $ten_danh_muc = $dm->ten_san_pham;
        SanPham::destroy($id);
        return redirect()->back()->with("success_msg", "XÓA '$ten_danh_muc' THÀNH CÔNG!!!");
    }

    private function customValidate(Request $request)
    {
        $rules = [
            "ten_san_pham" => "required|min:3|max:100" //not null min 3 k tự max 100 kí tự
        ];
        $request->validate($rules);
    }
}
