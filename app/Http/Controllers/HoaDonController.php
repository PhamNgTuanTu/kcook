<?php

namespace App\Http\Controllers;

use App\Models\BaiViet;
use App\Models\HoaDon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Exception;
use App\Jobs\sendMailTinhTrangHoaDonJob;

class HoaDonController extends Controller
{
    private $hoaDon;
    public function __construct(HoaDon $hoaDon)
    {
        $this->hoaDon = $hoaDon;
    }
    public function thanhToan()
    {
        return view(config('template.homeTemplateBladeURL') . 'thanh-toan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $page = 'hoa_don';
        $arayKey = [
            'ten_khach_hang',
            'sdt',
            'phuong_thuc_thanh_toan',
            'trang_thai',
            'ngay_bat_dau',
            'ngay_ket_thuc',
        ];
        $inputSearch = [];
        foreach ($arayKey as $key => $value) {
            $inputSearch[$value] = $request[$value];
        }
        $ds_hoa_don = $this->hoaDon->queryData($request->toArray())->sortable()->orderBy('created_at', 'DESC')->with('khachHang')->paginate(25);


        return view(config('template.cmsTemplateBladeURL') . 'hoa-don.index', compact('ds_hoa_don', 'page', 'inputSearch'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HoaDon  $hoaDon
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = 'hoa_don';
        $edit = true;
        $ct_hoa_don = $this->hoaDon->where('id', $id)->first();
        // dd($now);
        // dd(view(config('template.cmsTemplateBladeURL').'bai-viet.them'));
        return view(config('template.cmsTemplateBladeURL') . 'hoa-don.chi-tiet-hoa-don', compact('page', 'ct_hoa_don', 'edit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HoaDon  $hoaDon
     * @return \Illuminate\Http\Response
     */
    public function edit(HoaDon $hoaDon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HoaDon  $hoaDon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $now = Carbon::now()->timezone('Asia/Ho_Chi_Minh');
        $now_utc = Carbon::now();

        $data = [
            'trang_thai' => $request->trang_thai
        ];
        if ($request->trang_thai == 4) {
            $data['tinh_trang_thanh_toan'] = 1;
            $data['ngay_thanh_toan'] = $now->toDateTimeString();
            $data['ngay_giao'] = $now_utc->toDateTimeString();
        }

        if ($request->trang_thai == 3) {
            $data['ngay_giao'] = $now_utc->toDateTimeString();
        }

        try {
            $hoaDon = $this->hoaDon->find($id);
            $hoaDon->update($data);
            $dataSenmail = [
                'email' => $hoaDon->email,
                'url' => env('APP_URL'),
                'hoa_don_id' => $hoaDon->id
            ];
            
            dispatch(new sendMailTinhTrangHoaDonJob($dataSenmail));
            return response()->json([
                'status' => 'success',
                'message' => 'Cập nhật trạng thái',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Không thể cập nhật trạng thái!',
            ], 200);
        }
    }

    public function updateThanhToan(Request $request, $id)
    {
        $now = Carbon::now()->timezone('Asia/Ho_Chi_Minh');

        $data = [
            'tinh_trang_thanh_toan' => $request->trang_thai,
            'ngay_thanh_toan' => $now->toDateTimeString()
        ];
        try {
            $this->hoaDon->find($id)->update($data);
            return response()->json([
                'status' => 'success',
                'message' => 'Xác nhận thanh toán thành công',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Không thể cập nhật trạng thái!',
            ], 200);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HoaDon  $hoaDon
     * @return \Illuminate\Http\Response
     */
    public function destroy(HoaDon $hoaDon)
    {
        //
    }
}
