<?php
namespace App\Models\Admin;

use App\Models\BaseModel;
class ChiTietDonHang extends BaseModel{

//    public function loadAllSP(){
//        $sql = "SELECT * FROM chi_tiet_hoa_don where 1 order by id desc limit 0,10";
//        $this->setQuery($sql);
//        return $this->loadAllRows();
//    }
    public function loadRowSP($id){
        $sql = "SELECT A.*,B.* FROM chi_tiet_hoa_don A
                INNER JOIN san_pham B ON A.san_pham_id = B.id 
                where A.hoa_don_id = $id";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function loadDetail($id){
        $sql = "SELECT A.*,B.ten, C.*, D.* FROM chi_tiet_hoa_don A 
        INNER JOIN san_pham B ON A.san_pham_id = B.id 
        INNER JOIN nguoi_dung C ON A.nguoi_dung_id = C.id 
        INNER JOIN hoa_don D ON A.hoa_don_id = D.id
        WHERE A.hoa_don_id = $id";
        $this->setQuery($sql);
        return $this->loadRow();
    }


//    public function suaDonHang($tinhTrang,$id){
//        $sql = "update chi_tiet_hoa_don set tinh_trang = '$tinhTrang' where id = $id";
//        $this->setQuery($sql);
//        return $this->execute();
//    }

    //Tìm kiếm
//    public function tim_kiem_san_pham($table,$nd="",$l=0){
//        $sql = "SELECT * FROM chi_tiet_hoa_don where 1";
//
//        if($nd != ""){
//            $sql.= " and id = '$nd'";
//        }
//
//        if($l > 0){
//            $sql.= " and tinh_trang = '$l'";
//        }
//
//        $sql.= " order by id desc limit 0,10";
//        $this->setQuery($sql);
//        return $this->loadAllRows();
//    }
}