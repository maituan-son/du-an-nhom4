<?php
namespace App\Models\Client;

use App\Models\BaseModel;
class GioHang extends BaseModel{
    public function hoaDon($ngay_dat_hang,$tong_tien,$tinh_trang,$nguoi_dung_id){
        $sql = "insert into hoa_don(ngay_dat_hang,tong_tien,tinh_trang,nguoi_dung_id) 
                values ('$ngay_dat_hang','$tong_tien','$tinh_trang','$nguoi_dung_id')";
        return $this->pdo_execute_return_lastInsertId($sql);
//        $this->setQuery($sql);
//       return $this->getLastId();
    }

    public function chiTietHoaDon($nguoi_dung_id,$san_pham_id,$so_luong,$don_gia,$hoa_don_id){
        $sql = "insert into chi_tiet_hoa_don(nguoi_dung_id,san_pham_id,so_luong,don_gia,hoa_don_id) 
                values ('$nguoi_dung_id','$san_pham_id','$so_luong','$don_gia','$hoa_don_id')";
        $this->setQuery($sql);
        $this->execute();
    }

    public function loadOneSP($id){
        $sql = "select *,A.ten as ten_sp,A.id as id_sp from san_pham A inner join loai B on A.loai_id = B.id where A.id = $id";
        $this->setQuery($sql);
        return $this->loadRow();
    }
    //Bình luận
    public function binhLuan($binh_luan,$san_pham_id){
        $sql = "insert into binh_luan(binh_luan,san_pham_id) values (?,?)";
        $this->setQuery($sql);
        $this->execute([$binh_luan,$san_pham_id]);
    }

    public function loadAllBl($table,$limit1,$limit2){
        $sql = "select *,A.ten_binh_luan, A.id as id_bl from $table A
                inner join san_pham B on A.san_pham_id = B.id order by A.id desc";
        if ($limit1 >= 0 && $limit2 > 0) {
            $sql .= " limit $limit1,$limit2";
        }
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
}