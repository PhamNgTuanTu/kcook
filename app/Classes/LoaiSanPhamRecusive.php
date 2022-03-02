<?php
namespace App\Classes;

use App\Models\LoaiSanPham;

class LoaiSanPhamRecusive {
        public function __construct()
        {
            $this->html = '';
        }
        public function LoaiSanPhamRecusiveAdd($parentid=null,$submark='') {
            $data = LoaiSanPham::where('parent_id',$parentid)->orderBy('ten_loai', 'ASC')->get();
            foreach($data as $dataitem){
                $this->html .= '<option value="' .$dataitem->id . '">'. $submark. $dataitem->ten_loai . '</option>';
                // $this->LoaiSanPhamRecusiveAdd($dataitem->id,$submark.'--');
            }
            return $this->html;
        }
        public function LoaiSanPhamRecusiveEdit($parentidmenuedit,$parentid=null,$submark='') {
            $data = LoaiSanPham::where('parent_id',$parentid)->get();
            foreach($data as $dataitem){
                if($parentidmenuedit==$dataitem->id) {
                    $this->html .= '<option selected value="' .$dataitem->id . '">'. $submark. $dataitem->ten_loai . '</option>';
                }
                else {
                    $this->html .= '<option value="' .$dataitem->id . '">'. $submark. $dataitem->ten_loai . '</option>';
                }
                $this->LoaiSanPhamRecusiveEdit($parentidmenuedit,$dataitem->id,$submark.'--');
            }
            return $this->html;
        }
    }
