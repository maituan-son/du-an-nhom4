<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\ChiTietDonHang;

class ChiTietDonHangController extends BaseController{
    protected $chiTietDonHang;

    public function __construct()
    {
        $this->chiTietDonHang = new ChiTietDonHang();
    }

    public function danhSach($id){
        $all = $this->chiTietDonHang->loadRowSP($id);
        $detail = $this->chiTietDonHang->loadDetail($id);
        $title = "Danh sách chi tiết hóa đơn";
        $tieuDe = "Danh sách chi tiết hóa đơn";
        $table = "chi_tiet_hoa_don";
        $duong_dan = 'admin.chiTietDonHang.danhSach';
//        $i = 0;
        $this->render($duong_dan,
            compact('all','detail', 'title', 'tieuDe', 'table', 'duong_dan'));
    }

//    public function chiTietHoaDon($i,$id){
//       $title = "Chi tiết hóa đơn";
//       $tieuDe = "Chi tiết hóa đơn";
//       $title_p = "Danh sách chi tiết hóa đơn";
//       $tieuDe_p = "Danh sách chi tiết hóa đơn";
//       $table = "chi_tiet_hoa_don";
//       $duong_dan = 'admin.chiTietDonHang.danhSach';
//       $load_one = $this->chiTietHoaDon->loadOne($table, 'id', $id);
//
//       $this->render('admin.chiTietDonHang.danhSach',
//           compact('load_one', 'title', 'tieuDe', 'tieuDe_p', 'title_p', 'table', 'duong_dan', 'i'));
//    }

    // public function suaHoaDonPost($i,$id){
    //    $tinhTrang = $_POST['tinhTrang'];

    //    $suaDon = $this->hoaDon->suaDonHang($tinhTrang,$id);

    //    if ($suaDon) {
    //        $_SESSION['thong_bao'] = "Cập nhật thành công!";
    //        header('location: ' . BASE_URL . "admin/hoa-don/sua-hoa-don/$i/$id");
    //    }
    // }
}