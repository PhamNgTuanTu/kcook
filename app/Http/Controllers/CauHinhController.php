<?php

namespace App\Http\Controllers;

use App\Models\CauHinh;
use App\Models\HinhAnh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CauHinhController extends Controller
{
    private $cauHinh;
    public function __construct(CauHinh $cauHinh)
    {
        $this->cauHinh = $cauHinh;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = 'cau-hinh';
        $cau_hinh = $this->cauHinh->first();
        if ($cau_hinh) {
            return view(config('template.cmsTemplateBladeURL') . 'cau-hinh.index', compact('cau_hinh', 'page'));
        }
        return view(config('template.cmsTemplateBladeURL') . 'cau-hinh.index', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        $data = [
            'tru_so_chinh'       => $request->tru_so_chinh,
            'so_dien_thoai'       => $request->so_dien_thoai,
            'email'  => $request->email,
            'iframe'  => $request->iframe,
            'ten_cong_ty'  => $request->ten_cong_ty,
            'ten_ngan_hang'  => $request->ten_ngan_hang,
            'so_tai_khoan'  => $request->so_tai_khoan,
            'ten_chu_the'  => $request->ten_chu_the,
            'meta_title'  => $request->meta_title,
            'meta_description'  => $request->meta_description,
            'chi_nhanh'      => empty($request->chi_nhanh) ? Null : json_encode($request->chi_nhanh),
            'hotline'      => empty($request->hotline) ? Null : json_encode($request->hotline),
        ];
        // dd($request->slide_show_upload);
        if(!empty($request->iframe)){
            $arr = explode(' ', $request->iframe);
            $lenght = strlen($arr[1]);
            $src = substr($arr[1], 5, $lenght-6);
            $data['source'] = $src;
        }
        if ($request->hasfile('logo')) {
            $folder = public_path('/upload/cau-hinh');
            if (!File::exists($folder))
                File::makeDirectory($folder, 0775, true, true);

            $image = $request->file('logo');
            $duoi_file      = $image->getClientOriginalExtension();
            $name           = $image->getClientOriginalName();
            $ten_file       = md5(time()) . '.' . $duoi_file;
            $image->move(public_path('upload/cau-hinh'), $ten_file);
            $ten_hinh = $ten_file;
            $data['logo'] = url('/upload/cau-hinh/' . $ten_hinh);
        }
        if ($request->hasfile('banner_upload')) {
            $folder = public_path('/upload/cau-hinh');
            if (!File::exists($folder))
                File::makeDirectory($folder, 0775, true, true);

            $image = $request->file('banner_upload');
            $duoi_file      = $image->getClientOriginalExtension();
            $name           = $image->getClientOriginalName();
            $ten_file       = md5(time()) . '.' . $duoi_file;
            $image->move(public_path('upload/cau-hinh'), $ten_file);
            $ten_hinh = $ten_file;
            $data['banner'] = url('/upload/cau-hinh/' . $ten_hinh);
        }
        $cau_hinh = $this->cauHinh->first();
        if ($cau_hinh) {
            $response = $this->cauHinh->where('id', $cau_hinh->id)->update($data);
            if ($response) {
                if($request->image_upload_delete){
                    $img_delete = explode(",", $request->image_upload_delete);
                    $size = count($img_delete);
                    for($i = 0 ; $i< $size ; $i++){
                        $name = $img_delete[$i];
                        $xoaAnh = HinhAnh::where('ten_anh', $name)->delete();
                        if($xoaAnh){
                            $image_path = public_path().'/upload/cau-hinh/'.$name;
                            if(File::exists($image_path)) {
                                File::delete($image_path);
                            }
                        }
                    }
                }
                if ($request->hasfile('slide_show_upload')) {
                    $folder = public_path('/upload/cau-hinh');
                    if (!File::exists($folder))
                        File::makeDirectory($folder, 0775, true, true);
                    $size = count($request->file('slide_show_upload'));
                    for($i = 0 ; $i< $size ; $i++){
                        $image = $request->file('slide_show_upload')[$i];
                        $duoi_file      = $image->getClientOriginalExtension();
                        $name           = $image->getClientOriginalName();
                        $ten_file       = md5(time()+$i) . '.' . $duoi_file;
                        $image->move(public_path('upload/cau-hinh'), $ten_file);
                        $ten_hinh = $ten_file;
                        HinhAnh::create([
                            'url' => url('/upload/cau-hinh/'.$ten_hinh),
                            'ten_anh' => $ten_hinh,
                            'cau_hinh_id'=> $cau_hinh->id
                        ]);
                    }            
                }
                // return redirect()->back()->with('status', 'Cập nhật thành công');
                return response()->json([
                    'status' => 'success',
                    'message' => 'Cập nhật thành công',
                ], 200);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Cập nhật thất bại, vui lòng thử lại',
                ], 201);
                // return redirect()->back()->with('error', 'Cập nhật thất bại, vui lòng thử lại');

            }
        }
        $response = $this->cauHinh->create($data);
        if ($response) {
            $cau_hinh = $this->cauHinh->first();
            if ($request->hasfile('slide_show_upload')) {
                $folder = public_path('/upload/cau-hinh');
                if (!File::exists($folder))
                    File::makeDirectory($folder, 0775, true, true);
                $size = count($request->file('slide_show_upload'));
                for($i = 0 ; $i< $size ; $i++){
                    $image = $request->file('slide_show_upload')[$i];
                    $duoi_file      = $image->getClientOriginalExtension();
                    $name           = $image->getClientOriginalName();
                    $ten_file       = md5(time()+$i) . '.' . $duoi_file;
                    $image->move(public_path('upload/cau-hinh'), $ten_file);
                    $ten_hinh = $ten_file;
                    HinhAnh::create([
                        'url' => url('/upload/cau-hinh/'.$ten_hinh),
                        'ten_anh' => $ten_hinh,
                        'cau_hinh_id'=> $cau_hinh->id
                    ]);
                }            
            }
            // return redirect()->back()->with('status', 'Cập nhật thành công');

            return response()->json([
                'status' => 'success',
                'message' => 'Cập nhật thành công',
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Cập nhật thất bại, vui lòng thử lại',
            ], 201);
            // return redirect()->back()->with('error', 'Cập nhật thất bại, vui lòng thử lại');

        }
        // return redirect()->back()->with('error', 'Thêm thất bại, vui lòng thử lại');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
