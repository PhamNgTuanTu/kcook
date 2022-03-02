<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThemLoaiSanPhamRequest;
use App\Models\LoaiSanPham;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use App\Classes\LoaiSanPhamRecusive;
use phpDocumentor\Reflection\Types\Null_;

class LoaiSanPhamController extends Controller
{
    private $loaiSanPham;
    public function __construct(LoaiSanPham $loaiSanPham, LoaiSanPhamRecusive $loaiSanPhamRecusive)
    {
        $this->loaiSanPham = $loaiSanPham;
        $this->loaiSanPhamRecusive = $loaiSanPhamRecusive;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page = 'loai_san_pham';
        $arayKey = [
            'ten_loai',
        ];
        $inputSearch = [];
        foreach ($arayKey as $key => $value) {
            $inputSearch[$value] = $request[$value];
        }
        $data = $this->loaiSanPham->queryData($request->toArray())->orderBy('ten_loai', 'ASC')->get();
        $optionselect = $this->loaiSanPhamRecusive->LoaiSanPhamRecusiveAdd();
        return view('admin.loai-san-pham.index', compact(['page', 'data', 'optionselect', 'inputSearch']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = 'loai_san_pham';
        $data = $this->loaiSanPham->all();
        $optionselect = $this->loaiSanPhamRecusive->LoaiSanPhamRecusiveAdd();
        // return view('admin.loai-san-pham.index', compact(['page', 'data', 'optionselect']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function themLoaiSanPham(Request $request)
    {
        $data = [
            'ten_loai'       => $request->name,
            'slug'      => Str::slug($request->name),
            'parent_id' => ($request->parent_id == 0 ? Null : $request->parent_id),
        ];
        $checkDup = $this->loaiSanPham->where('ten_loai', 'like', $request->name)->first();
        if ($checkDup) {
            return response()->json([
                'status' => 'error',
                'message' => 'Danh mục đã tồn tại'
            ], 200);
            // return $this->respondBadRequest('Phone Number Exists');

        }
        $response = $this->loaiSanPham->create($data);
        if ($response) {
            return response()->json([
                'status' => 'success',
                'message' => 'Thêm Thành Công'
            ], 200);
            // return redirect()->route('admin.loai_san_pham')->with('success', 'Thêm Thành Công');
        }
        // return redirect()->route('admin.loai_san_pham')->with('error', 'Thêm Thất Bại');
        return response()->json([
            'status' => 'error',
            'message' => 'Thêm Thất Bại'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LoaiSanPham  $loaiSanPham
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = [
            'ten_loai'       => $request->ten_loai,
            'slug'      => Str::slug($request->ten_loai),
            'parent_id' => ($request->parent_id == 0 ? Null : $request->parent_id),
        ];
        $id = (int)$request->id_can_sua;
        $checkDup = $this->loaiSanPham->where([['id', '!=', $id], ['ten_loai', 'like', $request->ten_loai]])->first();
        if ($checkDup) {
            return response()->json([
                'status' => 'error',
                'message' => 'Danh mục đã tồn tại'
            ], 200);
        }
        $response = $this->loaiSanPham->where('id', $id)->update($data);
        if ($response) {
            return response()->json([
                'status' => 'success',
                'message' => 'Cập Nhật Thành Công'
            ], 200);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Cập Nhật Thất Bại'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LoaiSanPham  $loaiSanPham
     * @return \Illuminate\Http\Response
     */
    public function xoaLoaiSanPham($id)
    {
        try {
            $this->loaiSanPham->where("parent_id", $id)->delete();
            $this->loaiSanPham->find($id)->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Xóa loại sản phẩm',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Không tìm thấy loại sản phẩm',
            ], 200);
        }
    }
}
