<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPhamReview;
use App\Models\SanPham;
use App\Models\HoaDon;

class SanPhamReviewController extends Controller
{
    public function store(Request $request) {
        $dsDonHang =  HoaDon::with(['ctHoaDon' => function($query){
                            $query->with('sanPham');
                        }])->where('khach_hang_id',  $request->id)->get();
        $status = "error";
        $message = "Bạn chưa mua sản phẩm này không thể bình luận.";
        if(!empty($dsDonHang)){
            $is_bought_total = 0;
            foreach ($dsDonHang as $donHang){
                foreach ($donHang->ctHoaDon as $chiTiet){
                    if($chiTiet->sanPham->id == (int)$request->san_pham_id && $donHang->trang_thai == 4){
                        $is_bought_total = $is_bought_total + 1; 
                        ($request->rating < 1) ? $request->rating = 5 : $request->rating = $request->rating;
                        $SanPhamReview = SanPhamReview::create([
                            'name'      => $request->ho.' '.$request->ten,
                            'email'     => $request->email,
                            'comment'   => $request->comment,
                            'rating'    => $request->rating,
                            'san_pham_id' => $request->san_pham_id

                        ]);
                        if ($SanPhamReview != null) {
                            $averageRatingSanPham = SanPhamReview::where('san_pham_id', $request->san_pham_id)->avg('rating');
                            $sanPham         = SanPham::find($request->san_pham_id);
                            $sanPham->danh_gia = round($averageRatingSanPham);
                            $sanPham->save();
                            $status         = "success";
                            $message        = "Cảm ơn bạn đã đánh giá sản phẩm của chúng tôi.";
                            return response()->json([
                                'status' => $status,
                                'message' => $message
                            ], 200);
                        } else {
                            $status         = "error";
                            $message        = "Lỗi không thêm được comment vào db.";
                            return response()->json([
                                'status' => $status,
                                'message' => $message
                            ], 200);
                        }   
                    };
                }
            }
            if($is_bought_total == 0) {
                return response()->json([
                        'status' => $status,
                        'message' => $message
                ], 200);
            }
        } else {
            return response()->json([
                    'status' => $status,
                    'message' => $message
            ], 200);
        }
    }
}
