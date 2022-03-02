<?php

namespace App\Classes;

use App\Models\LoaiSanPham;

class htmlSearchOptionSelect
{
    private $htmlSelect = '';
    public function searchlichtrinh($id)
    {
        $data = LoaiSanPham::all();
        foreach ($data as $val) {
            if ($id == $val->id) {
                $this->htmlSelect .= '<option selected value="' . $val->id . '">' . $val->ten_loai . '</option>';
            } else
                $this->htmlSelect .= '<option value="' . $val->id . '">' . $val->ten_loai . '</option>';
        }
        return $this->htmlSelect;
    }
}
