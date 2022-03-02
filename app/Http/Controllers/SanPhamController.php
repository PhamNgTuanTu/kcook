<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;
use App\Classes\LoaiSanPhamRecusive;
use App\Models\HinhAnh;
use App\Models\LoaiSanPham;
use Illuminate\Support\Str;
use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File as NewFile;
use App\Models\SanPhamReview;
use App\Classes\htmlSearchOptionSelect;

class SanPhamController extends Controller
{

    private $sanPham;
    private $loaiSanPham;
    public function __construct(SanPham $sanPham, LoaiSanPhamRecusive $loaiSanPhamRecusive, LoaiSanPham $loaiSanPham)
    {
        $this->sanPham = $sanPham;
        $this->loaiSanPham = $loaiSanPham;
        $this->loaiSanPhamRecusive = $loaiSanPhamRecusive;
    }

    public function chiTietSanPham($slug)
    {
        $page = "san_pham";
        $sanPham = SanPham::where('slug', $slug)->first();
        $comments = SanPhamReview::where('san_pham_id', $sanPham->id)->get();
        $sanPhamCungLoai = SanPham::orderBy('created_at', 'desc')->where('loai_san_pham_id', $sanPham->loai_san_pham_id)->where('id', '!=', $sanPham->id)->get();
        $danhMuc =  LoaiSanPham::where('id', $sanPham->loai_san_pham_id)->first();

        if (empty($danhMuc->parent_id)) {
            $urlDanhMuc = route('home.san_pham_theo_danh_muc', $danhMuc->slug); // danh mục gốc
        } else {
            $danhMucCha = LoaiSanPham::where('id', $danhMuc->parent_id)->first();
            $urlDanhMuc = 'danh-muc/' . $danhMucCha->slug . '/' . $danhMuc->slug;
        }
        //dd($sanPham);
        return view(config('template.homeTemplateBladeURL') . 'chi-tiet-san-pham', compact('sanPham', 'sanPhamCungLoai', 'danhMuc', 'urlDanhMuc', 'comments', 'page'));
    }

    public function sanPhamTheoDanhMuc($slug)
    {
        $page = "san_pham";
        $danhMucCha = LoaiSanPham::where('slug', $slug)->first();
        //$listDanhMucCon = LoaiSanPham::where('parent_id',$danhMucCha->id)->get();
        $listSanPham = SanPham::orderBy('created_at', 'desc')->where('nhom_loai_san_pham_id', $danhMucCha->id)->paginate(20);
        $tenDanhMuc = $danhMucCha->ten_loai;
        return view(config('template.homeTemplateBladeURL') . 'san-pham-theo-danh-muc', compact('listSanPham', 'tenDanhMuc', 'page'));
    }

    public function sanPhamTheoDanhMucCon($slugDanhMucCha, $slug)
    {
        $page = "san_pham";
        $danhMucCha = LoaiSanPham::where('slug', $slugDanhMucCha)->first();
        $danhMuc = LoaiSanPham::where('slug', $slug)->first();
        $listSanPham = SanPham::orderBy('created_at', 'desc')->where([
            'loai_san_pham_id' => $danhMuc->id,
            'nhom_loai_san_pham_id' => $danhMucCha->id
        ])->paginate(20);
        $tenDanhMuc = $danhMucCha->ten_loai . " - " . $danhMuc->ten_loai;
        return view(config('template.homeTemplateBladeURL') . 'san-pham-theo-danh-muc', compact('listSanPham', 'tenDanhMuc', 'page'));
    }

    public function sanPham()
    {
        $page = "san_pham";
        $listSanPham = SanPham::orderBy('created_at', 'desc')->paginate(20);
        return view(config('template.homeTemplateBladeURL') . 'san-pham',  compact('listSanPham', 'page'));
    }

    public function index(Request $request)
    {
        $page = 'san_pham';
        $arayKey = [
            'ten_san_pham',
            'ma_san_pham',
            'loai_san_pham',
            'trang_thai',
        ];
        $inputSearch = [];
        foreach ($arayKey as $key => $value) {
            $inputSearch[$value] = $request[$value];
        }
        $searchSelect = new htmlSearchOptionSelect();
        $htmlOptionSearch = $searchSelect->searchlichtrinh($request->loai_san_pham);
        $dataOption = $this->loaiSanPham->all();
        $optionselect = $this->loaiSanPhamRecusive->LoaiSanPhamRecusiveAdd();
        $data = $this->sanPham->queryData($request->toArray())->orderBy('ten_san_pham', 'ASC')->get();
        return view(config('template.cmsTemplateBladeURL') . 'san-pham.index', compact(['page', 'data', 'htmlOptionSearch', 'dataOption', 'optionselect', 'inputSearch']));
    }

    public function store(Request $request)
    {
        $page = 'san_pham';
        $optionselect = $this->loaiSanPhamRecusive->LoaiSanPhamRecusiveAdd();
        $edit = false;
        return view(config('template.cmsTemplateBladeURL') . 'san-pham.them', compact(['page', 'optionselect', 'edit']));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validated_data = [
            'so_luong'      => 'integer',
            'gia_ban'       => 'integer',
            'gia_goc'       => 'integer',
        ];
        $message = [
            'so_luong.integer'        => 'Số lượng không đúng định dạng',
            'gia_ban.integer'         => 'Không đúng định dạng',
            'gia_goc.integer'          => 'Không đúng định dạng',
        ];
        $validator = Validator::make($request->all(), $validated_data, $message);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        ///convert base 64
        $desc = $request->mo_ta; // POST with html
        if (!empty($desc)) {
            $dom_desc = new Crawler($desc);
            $images = $dom_desc->filterXPath('//img')->extract(array('src')); // extract images
            foreach ($images as $key => $value) {
                if (strpos($value, 'base64') !== false) {
                    $folder = public_path('/upload/san-pham');
                    if (!File::exists($folder))
                        File::makeDirectory($folder, 0775, true, true);
                    $data = explode(',', $value);
                    $tmp_file = public_path('file-temp/item');
                    file_put_contents($tmp_file, base64_decode($data[1]));
                    $tmpFile = new NewFile($tmp_file);
                    $path = Storage::disk('public')->put('bai-viet', $tmpFile);
                    $desc = str_replace($value, url('upload/' . $path), $desc);
                    unlink($tmp_file); // delete temp file
                } else {
                    $new_value = str_replace('\"', '', $value);
                    $desc = str_replace($value, $new_value, $desc);
                }
            }
        }
        // dd($desc);
        $data = [
            'ten_san_pham'       => $request->ten_san_pham,
            'ma_san_pham'       => $request->ma_san_pham,
            'loai_san_pham_id'       => $request->loai_san_pham_id,
            'so_luong'       => $request->so_luong,
            'gia_ban'       => $request->gia_ban,
            'gia_goc'       => $request->gia_goc,
            'trang_thai'       => $request->trang_thai,
            'meta_title'       => $request->meta_title,
            'meta_description'       => $request->meta_description,
            'slug'      => Str::slug($request->ten_san_pham),
            'mo_ta'      => str_replace('"', "", $desc),
        ];
        $checkDup = $this->sanPham->where('ma_san_pham', $request->ma_san_pham)->first();
        if ($checkDup) {
            return response()->json([
                'status' => 'error',
                'message' => 'Mã sản phẩm đã tồn tại'
            ], 201);
        }
        $loai = LoaiSanPham::where('id', $request->loai_san_pham_id)->first();
        if ($loai->parent_id) {
            $data['nhom_loai_san_pham_id'] = $loai->parent_id;
        } else {
            $data['nhom_loai_san_pham_id'] = $loai->id;
        }

        $response = $this->sanPham->create($data);

        if ($request->hasfile('image_upload')) {
            $folder = public_path('/upload/san-pham');
            if (!File::exists($folder))
                File::makeDirectory($folder, 0775, true, true);
            $size = count($request->file('image_upload'));
            for ($i = 0; $i < $size; $i++) {
                $image = $request->file('image_upload')[$i];
                $duoi_file      = $image->getClientOriginalExtension();
                $name           = $image->getClientOriginalName();
                $ten_file[$i]       = md5(time() + $i) . '.' . $duoi_file;
                $image->move(public_path('upload/san-pham'), $ten_file[$i]); //chuyển file vào thư mục public/upload/san-pham
                $ten_hinh = $ten_file[$i];
                HinhAnh::create([
                    'url' => url('/upload/san-pham/' . $ten_hinh),
                    'ten_anh' => $ten_hinh,
                    'san_pham_id' => $response->id
                ]);
            }
        }
        if ($response) {
            return redirect()->route('admin.san_pham')->with('status', 'Thêm sản phẩm thành công');
        }
        return redirect()->back()->with('error', 'Thêm sản phẩm thất bại, vui lòng thử lại');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    public function show(SanPham $sanPham)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    public function edit(SanPham $sanPham, $id)
    {
        $page = 'san_pham';
        $optionselect = $this->loaiSanPhamRecusive->LoaiSanPhamRecusiveAdd();
        $loai_san_pham = LoaiSanPham::get();
        $ct_san_pham = $this->sanPham->find($id);
        $edit = true;
        return view(config('template.cmsTemplateBladeURL') . 'san-pham.them', compact(['page', 'optionselect', 'edit', 'ct_san_pham', 'loai_san_pham']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated_data = [
            'so_luong'      => 'integer',
            'gia_ban'       => 'integer',
            'gia_goc'       => 'integer',
        ];
        $message = [
            'so_luong.integer'        => 'Số lượng không đúng định dạng',
            'gia_ban.integer'         => 'Không đúng định dạng',
            'gia_goc.integer'          => 'Không đúng định dạng',
        ];
        $validator = Validator::make($request->all(), $validated_data, $message);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        ///convert base 64
        $desc = $request->mo_ta; // POST with html
        if (!empty($desc)) {
            $dom_desc = new Crawler($desc);
            $images = $dom_desc->filterXPath('//img')->extract(array('src')); // extract images
            foreach ($images as $key => $value) {
                if (strpos($value, 'base64') !== false) {
                    $folder = public_path('/upload/san-pham');
                    if (!File::exists($folder))
                        File::makeDirectory($folder, 0775, true, true);
                    $data = explode(',', $value);
                    $tmp_file = public_path('file-temp/item');
                    file_put_contents($tmp_file, base64_decode($data[1]));
                    $tmpFile = new NewFile($tmp_file);
                    $path = Storage::disk('public')->put('bai-viet', $tmpFile);
                    $desc = str_replace($value, url('upload/' . $path), $desc);
                    unlink($tmp_file); // delete temp file
                } else {
                    $new_value = str_replace('\"', '', $value);
                    $desc = str_replace($value, $new_value, $desc);
                }
            }
        }

        $data = [
            'ten_san_pham'       => $request->ten_san_pham,
            'ma_san_pham'       => $request->ma_san_pham,
            'loai_san_pham_id'       => $request->loai_san_pham_id,
            'so_luong'       => $request->so_luong,
            'gia_ban'       => $request->gia_ban,
            'gia_goc'       => $request->gia_goc,
            'trang_thai'       => $request->trang_thai,
            'meta_title'       => $request->meta_title,
            'meta_description'       => $request->meta_description,
            'slug'      => Str::slug($request->ten_san_pham),
            'mo_ta'      => str_replace('"', "", $desc),
        ];
        $checkDup = $this->sanPham->where('id', '!=', $id)->where('ma_san_pham', $request->ma_san_pham)->first();
        if ($checkDup) {
            return response()->json([
                'status' => 'error',
                'message' => 'Mã sản phẩm đã tồn tại'
            ], 201);
        }
        $loai = LoaiSanPham::where('id', $request->loai_san_pham_id)->first();
        if ($loai->parent_id) {
            $data['nhom_loai_san_pham_id'] = $loai->parent_id;
        } else {
            $data['nhom_loai_san_pham_id'] = $loai->id;
        }
        $response = $this->sanPham->where('id', $id)->update($data);

        if ($request->image_upload_delete == "true") {
            $img_after_deleted = json_decode($request->image_after_delete); //arr ten_anh

            $images_is_deleted = HinhAnh::whereNotIn('ten_anh', $img_after_deleted)->where('san_pham_id', $request->id)->pluck('ten_anh')->toArray();
 
            $size = count($images_is_deleted);
            for ($i = 0; $i < $size; $i++) {
                $name = $images_is_deleted[$i];
                $xoaAnh = HinhAnh::where('ten_anh', $name)->delete();
                if ($xoaAnh) {
                    $image_path = public_path() . '/upload/san-pham/' . $name;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
            }
        }

        if ($request->hasfile('image_upload')) {
            $folder = public_path('/upload/san-pham');
            if (!File::exists($folder))
                File::makeDirectory($folder, 0775, true, true);

            $size = count($request->file('image_upload'));
            for ($i = 0; $i < $size; $i++) {
                $image = $request->file('image_upload')[$i];
                $duoi_file      = $image->getClientOriginalExtension();
                $name           = $image->getClientOriginalName();
                $ten_file[$i]       = md5(time() + $i) . '.' . $duoi_file;
                $image->move(public_path('upload/san-pham'), $ten_file[$i]);
                $ten_hinh = $ten_file[$i];
                HinhAnh::create([
                    'url' => url('/upload/san-pham/' . $ten_hinh),
                    'ten_anh' => $ten_hinh,
                    'san_pham_id' => $id
                ]);
            }
        }

        if ($response) {
            return redirect()->route('admin.san_pham')->with('status', 'Cập nhật sản phẩm thành công');
        }
        return redirect()->back()->with('error', 'Cập nhật sản phẩm thất bại, vui lòng thử lại');
    }

    public function searchFullText(Request $request)
    {
        if ($request->search != '') {
            $keyword = Str::lower($request->search);
            $sanPham = SanPham::FullTextSearch('ten_san_pham', $keyword)->take(5)->get();
            return  ['sanPham' => $sanPham];
        }
    }

    public function ketQuaTimkiem(Request $request)
    {
        $queryString = $request->search;
        $listSanPham  = SanPham::where('ten_san_pham', 'LIKE', "%$queryString%")->paginate(12);
        $key = $request->search;
        return view(config('template.homeTemplateBladeURL') . 'ket-qua-tim-kiem', compact('listSanPham', 'key'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    public function destroy(SanPham $sanPham, $id)
    {
        try {
            $this->sanPham->find($id)->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Xóa sản phẩm',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Không tìm thấy sản phẩm',
            ], 200);
        }
    }
}
