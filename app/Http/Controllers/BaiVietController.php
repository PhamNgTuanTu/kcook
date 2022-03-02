<?php

namespace App\Http\Controllers;

use App\Models\BaiViet;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\LienHe;
use Carbon\Carbon;
use App\Jobs\SendEmailLienHeJob;
use Mail;
use App\Mail\MailLienHe;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File as NewFile;

class BaiVietController extends Controller
{
    private $baiViet;
    public function __construct(BaiViet $baiViet)
    {
        $this->baiViet = $baiViet;
    }

    public function gioiThieu()
    {
        return view(config('template.homeTemplateBladeURL') . 'gioi-thieu');
    }

    public function thongBao()
    {
        return view(config('template.homeTemplateBladeURL') . 'thong-bao');
    }

    public function tinTuc()
    {
        $page = "tin_tuc";
        $listTinTuc = BaiViet::orderBy('created_at', 'desc')->where('loai_bai_viet', 1)->get();
        return view(config('template.homeTemplateBladeURL') . 'tin-tuc', compact('listTinTuc', 'page'));
    }

    public function chiTietTinTuc($slug)
    {
        $page = "tin_tuc";
        $tinTuc = BaiViet::where('slug', $slug)->first();
        $tinTucLienQuan = BaiViet::orderBy('created_at', 'desc')->where('loai_bai_viet', 1)->where('id', '!=', $tinTuc->id)->take(3)->get();
        return view(config('template.homeTemplateBladeURL') . 'chi-tiet-tin-tuc', compact('tinTuc', 'tinTucLienQuan', 'page'));
    }

    public function tuyenDung()
    {
        $page = "tuyen_dung";
        $listTinTuc = BaiViet::orderBy('created_at', 'desc')->where('loai_bai_viet', 2)->get();
        return view(config('template.homeTemplateBladeURL') . 'tuyen-dung', compact('listTinTuc', 'page'));
    }

    public function chiTietTuyenDung($slug)
    {
        $page = "tuyen_dung";
        $tinTuc = BaiViet::where('slug', $slug)->first();
        $tinTucLienQuan = BaiViet::orderBy('created_at', 'desc')->where('loai_bai_viet', 2)->where('id', '!=', $tinTuc->id)->take(3)->get();
        return view(config('template.homeTemplateBladeURL') . 'chi-tiet-tuyen-dung', compact('tinTuc', 'tinTucLienQuan', 'page'));
    }

    public function lienHe()
    {
        $page = "lien_he";
        return view(config('template.homeTemplateBladeURL') . 'lien-he', compact('page'));
    }

    ///cms
    public function index(Request $request)
    {
        $page = 'bai_viet';
        $arayKey = [
            'tieu_de',
            'loai_bai_viet'
        ];
        $inputSearch = [];
        foreach ($arayKey as $key => $value) {
            $inputSearch[$value] = $request[$value];
        }
        $ds_bai_viet = $this->baiViet->queryData($request->toArray())->orderBy('created_at', 'DESC')->paginate(25);
        return view(config('template.cmsTemplateBladeURL') . 'bai-viet.index', compact('ds_bai_viet', 'page', 'inputSearch'));
    }
    public function them()
    {
        $page = 'bai_viet';
        $edit = false;
        // dd(view(config('template.cmsTemplateBladeURL').'bai-viet.them'));
        return view(config('template.cmsTemplateBladeURL') . 'bai-viet.them-bai-viet', compact('edit', 'page'));
    }
    public function themBaiViet(Request $request)
    {
        if ($request->phu_de == '"<p><br></p>"' && $request->noi_dung == '"<p><br></p>"') {
            return redirect()
                ->back()
                ->withErrors(['phu_de' => 'Phụ đề không được trống', 'noi_dung' => 'Nội dung không được trống'])
                ->withInput();
        }
        if ($request->phu_de == '"<p><br></p>"') {
            return redirect()
                ->back()
                ->withErrors(['phu_de' => 'Phụ đề không được trống'])
                ->withInput();
        }
        if ($request->noi_dung == '"<p><br></p>"') {
            return redirect()
                ->back()
                ->withErrors(['noi_dung' => 'Nội dung không được trống'])
                ->withInput();
        }
        ///convert base 64
        $desc = $request->phu_de; // POST with html
        $dom_desc = new Crawler($desc);
        $images = $dom_desc->filterXPath('//img')->extract(array('src')); // extract images
        foreach ($images as $key => $value) {
            if (strpos($value, 'base64') !== false) { // leave alone not base64 images
                $data = explode(',', $value); // split image mime and body
                // $tmp_file = tempnam('/tmp', 'items'); // create tmp file path
                $tmp_file = sys_get_temp_dir() . '/tmp' . 'items';
                file_put_contents($tmp_file, base64_decode($data[1])); // fill temp file with image
                $tmpFile = new NewFile($tmp_file);
                $path = Storage::disk('public')->put('bai-viet', $tmpFile); // put file to final destination
                $desc = str_replace($value, url('upload', $path), $desc); // replace src of converted file to fs path
                unlink($tmp_file); // delete temp file
            } else {
                $new_value = str_replace('\"', '', $value);
                $desc = str_replace($value, $new_value, $desc);
            }
        }
        // dd($desc);
        ///convert base 64
        $desc_noi_dung = $request->noi_dung; // POST with html
        $dom_desc = new Crawler($desc_noi_dung);
        $images = $dom_desc->filterXPath('//img')->extract(array('src')); // extract images
        foreach ($images as $key => $value) {
            if (strpos($value, 'base64') !== false) { // leave alone not base64 images
                $data = explode(',', $value); // split image mime and body
                // $tmp_file = tempnam('/tmp', 'items'); // create tmp file path
                $tmp_file = sys_get_temp_dir() . '/tmp' . 'item';
                file_put_contents($tmp_file, base64_decode($data[1])); // fill temp file with image
                $tmpFile = new NewFile($tmp_file);
                $path = Storage::disk('public')->put('bai-viet', $tmpFile); // put file to final destination
                $desc_noi_dung = str_replace($value, url('upload', $path), $desc_noi_dung); // replace src of converted file to fs path
                unlink($tmp_file); // delete temp file
            } else {
                $new_value = str_replace('\"', '', $value);
                $desc_noi_dung = str_replace($value, $new_value, $desc_noi_dung);
            }
        }
        $data = [
            'tieu_de'       => $request->tieu_de,
            'phu_de'       => str_replace('"', "", $desc),
            'noi_dung'       => str_replace('"', "", $desc_noi_dung),
            'loai_bai_viet'  => $request->loai_bai_viet,
            'meta_title'  => $request->meta_title,
            'meta_description'  => $request->meta_description,
            'slug'      => Str::slug($request->tieu_de),
        ];
        if ($request->hasfile('image_upload')) {
            $folder = public_path('/upload/bai-viet');
            if (!File::exists($folder))
                File::makeDirectory($folder, 0775, true, true);

            $image = $request->file('image_upload');
            $duoi_file      = $image->getClientOriginalExtension();
            $name           = $image->getClientOriginalName();
            $ten_file       = md5(time()) . '.' . $duoi_file;
            $image->move(public_path('upload/bai-viet'), $ten_file);
            $ten_hinh = $ten_file;
            $data['anh'] = url('/upload/bai-viet/' . $ten_hinh);
        }

        $response = $this->baiViet->create($data);
        if ($response) {
            return redirect()->route('admin.ds_bai_viet')->with('status', 'Thêm thành công');
        }
        return redirect()->back()->with('error', 'Thêm thất bại, vui lòng thử lại');
    }

    public function edit($id)
    {
        $page = 'bai_viet';
        $edit = true;
        $bai_viet = $this->baiViet->where('id', $id)->first();
        // dd(view(config('template.cmsTemplateBladeURL').'bai-viet.them'));
        return view(config('template.cmsTemplateBladeURL') . 'bai-viet.them-bai-viet', compact('edit', 'page', 'bai_viet'));
    }
    public function updateBaiViet(Request $request, $id)
    {
        // dd($request->all());
        $validated_data = [
            'phu_de'      => 'required',
            'noi_dung'       => 'required',
        ];
        $message = [
            'phu_de.required'        => 'Phụ đề không được trống',
            'noi_dung.required'         => 'Nội dung không được trống',
        ];
        $validator = Validator::make($request->all(), $validated_data, $message);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        if ($request->phu_de == '"<p><br></p>"' && $request->noi_dung == '"<p><br></p>"') {
            return redirect()
                ->back()
                ->withErrors(['phu_de' => 'Phụ đề không được trống', 'noi_dung' => 'Nội dung không được trống'])
                ->withInput();
        }
        if ($request->phu_de == '"<p><br></p>"') {
            return redirect()
                ->back()
                ->withErrors(['phu_de' => 'Phụ đề không được trống'])
                ->withInput();
        }
        if ($request->noi_dung == '"<p><br></p>"') {
            return redirect()
                ->back()
                ->withErrors(['noi_dung' => 'Nội dung không được trống'])
                ->withInput();
        }
        ///convert base 64
        $desc = $request->phu_de; // POST with html
        $dom_desc = new Crawler($desc);
        $images = $dom_desc->filterXPath('//img')->extract(array('src')); // extract images
        foreach ($images as $key => $value) {
            if (strpos($value, 'base64') !== false) {
                $data = explode(',', $value);
                $tmp_file = public_path('file-temp/item');
                file_put_contents($tmp_file, base64_decode($data[1]));
                $tmpFile = new NewFile($tmp_file);
                $path = Storage::disk('public')->put('bai-viet', $tmpFile);
                $desc = str_replace($value, url('upload/' . $path), $desc);
                unlink($tmp_file);
            } else {
                $new_value = str_replace('\"', '', $value);
                $desc = str_replace($value, $new_value, $desc);
            }
        }
        // dd($desc);
        ///convert base 64
        $desc_noi_dung = $request->noi_dung; // POST with html
        $dom_desc = new Crawler($desc_noi_dung);
        $images = $dom_desc->filterXPath('//img')->extract(array('src'));
        foreach ($images as $key => $value) {
            if (strpos($value, 'base64') !== false) {
                $data = explode(',', $value);
                $tmp_file = public_path('file-temp/item');
                file_put_contents($tmp_file, base64_decode($data[1]));
                $tmpFile = new NewFile($tmp_file);
                $path = Storage::disk('public')->put('bai-viet', $tmpFile);
                $desc_noi_dung = str_replace($value, url('upload/' . $path), $desc_noi_dung);
                unlink($tmp_file);
            } else {
                $new_value = str_replace('\"', '', $value);
                $desc_noi_dung = str_replace($value, $new_value, $desc_noi_dung);
            }
        }
        $data = [
            'tieu_de'       => $request->tieu_de,
            'phu_de'       => str_replace('"', "", $desc),
            'noi_dung'       => str_replace('"', "", $desc_noi_dung),
            'loai_bai_viet'  => $request->loai_bai_viet,
            'meta_title'  => $request->meta_title,
            'meta_description'  => $request->meta_description,
            'slug'      => Str::slug($request->tieu_de),
        ];
        if ($request->hasfile('image_upload')) {
            $folder = public_path('/upload/bai-viet');
            if (!File::exists($folder))
                File::makeDirectory($folder, 0775, true, true);

            $image = $request->file('image_upload');
            $duoi_file      = $image->getClientOriginalExtension();
            $name           = $image->getClientOriginalName();
            $ten_file       = md5(time()) . '.' . $duoi_file;
            $image->move(public_path('upload/bai-viet'), $ten_file);
            $ten_hinh = $ten_file;
            $data['anh'] = url('/upload/bai-viet/' . $ten_hinh);
        }
        $response = $this->baiViet->where('id', $id)->update($data);
        if ($response) {
            return redirect()->route('admin.ds_bai_viet')->with('status', 'Cập nhật thành công');
        }
        return redirect()->back()->with('error', 'Cập nhật thất bại, vui lòng thử lại');
    }
    public function xoaBaiViet($id)
    {
        try {
            $this->baiViet->find($id)->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Xóa bài viết',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Không tìm thấy bài viết',
            ], 200);
        }
    }

    public function thongBaoLienHe()
    {
        return view(config('template.homeTemplateBladeURL') . 'thong-bao-lien-he-thanh-cong');
    }

    public function themLienHe(Request $request)
    {

        $data = [
            'ho_ten'        => $request->ho_ten,
            'so_dien_thoai' => $request->so_dien_thoai,
            'email'         => $request->email,
            'noi_dung'      => $request->noi_dung,
        ];

        $lienHe = LienHe::create([
            'ho_ten'        => $request->ho_ten,
            'so_dien_thoai' => $request->so_dien_thoai,
            'email'         => $request->email,
            'noi_dung'      => $request->noi_dung,
        ]);

        if ($lienHe != null) {
            $message = "Cảm ơn bạn đã quan tâm đến shop.";
            dispatch(new SendEmailLienHeJob($data));
            // return redirect()->route("home.thong_bao_lien_he")->with('message', $message);
            return response()->json([
                'status' => 'success',
                'message' => 'Cảm ơn bạn đã quan tâm đến shop.'
            ], 200);
        } else {
            $message = "Yêu cầu chưa được gửi đi.";
            return response()->json([
                'status' => 'error',
                'message' => 'Yêu cầu chưa được gửi đi.'
            ], 201);
        };
    }
}
