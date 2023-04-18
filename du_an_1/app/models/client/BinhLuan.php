<?php
namespace App\Models\Client;

use App\Models\BaseModel;
class BinhLuan extends BaseModel{
    public function binhLuan($nguoi_dung_id,$san_pham_id,$noi_dung,$ngay_binh_luan){
        $sql = "insert into binh_luan(nguoi_dung_id,san_pham_id,noi_dung,ngay_binh_luan) 
                values ('$nguoi_dung_id','$san_pham_id','noi_dung','ngay_binh_luan')";
        return $this->pdo_execute_return_lastInsertId($sql);
//        $this->setQuery($sql);
//       return $this->getLastId();
    }

    public function chiTietHoaDon($nguoi_dung_id,$san_pham_id,$so_luong,$thanh_tien,$hoa_don_id){
        $sql = "insert into chi_tiet_hoa_don(nguoi_dung_id,san_pham_id,so_luong,thanh_tien,hoa_don_id) 
                values ('$nguoi_dung_id','$san_pham_id','$so_luong','$thanh_tien','$hoa_don_id')";
        $this->setQuery($sql);
        $this->execute();
    }

    public function loadOneSP($id){
        $sql = "select *,A.ten as ten_sp,A.id as id_sp from san_pham A 
                inner join loai B on A.loai_id = B.id where A.id = $id";
        $this->setQuery($sql);
        return $this->loadRow();
    }
}