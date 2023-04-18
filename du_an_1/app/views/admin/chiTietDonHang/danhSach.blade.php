@extends('layouts.admin.main')
<!-- Recent Sales Start -->
@section('content')
<div class="panel container rounded-4"  >
        <h2>Chi tiết đơn hàng</h2>
        <div class="card">
          <div class="card-header">
            Đơn hàng: {{$detail->hoa_don_id}}
          </div>
          <div class="card-body">
            <div class="row">

              <div class="col-md-6">
                <h5 class="card-title">Thông tin đặt hàng </h5>
                <p class="card-text"><strong>Ngày đặt hàng:{{$detail->ngay_dat_hang}}</strong>-</p>
                <p class="card-text"><strong>Địa chỉ giao hàng:</strong>Hà Nội</p>
              </div>
              <div class="col-md-6">
                <h5 class="card-title">Thông tin khach hàng</h5>
                <p class="card-text"><strong>Tên:</strong> {{$detail->hoTen}}</p>
                <p class="card-text"><strong>Email:</strong>{{$detail->email}}</p>
                <p class="card-text"><strong>Số điện thoại:</strong> {{$detail->so_dien_thoai}}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <h5 class="card-title">Tóm Tắt Đơn hàng</h5>
                <table class="table">
                  <thead>
                    <tr>
                      <th>Sản phẩm</th>
                      <th> Giá</th>
                      <th>Số lượng</th>
                      <th>Thành tiền</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($all as $v)
                    <tr>
                      <td>{{$v->ten}}</td>
                      <td>{{$v->don_gia}}</td>
                      <td>{{$v->so_luong}}</td>
                      <td>{{$v->don_gia*$v->so_luong}}</td>
                    </tr>
                    @endforeach
                    <tr>
                      <td colspan="3" class="text-right"><strong>Tổng:</strong></td>
                      <td>{{$detail->tong_tien}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <h5 class="card-title">Trạng thái đơn hàng</h5>
                <form>
                  <div class="form-group">
                    <label for="status">Trạng thái:</label>
                    <select class="form-control" id="status">
                      @if($detail->tinh_trang == 1)
                        <option>Đơn hàng mới</option>
                      @endif
                        @if($detail->tinh_trang == 2)
                          <option>Đang chuẩn bị hàng</option>
                        @endif
                        @if($detail->tinh_trang == 3)
                          <option>Đang giao hàng</option>
                        @endif
                        @if($detail->tinh_trang == 4)
                          <option>Giao hàng thành công</option>
                        @endif
                    </select>
                  </div>
{{--                  <button type="submit" class="btn btn-primary">Cập nhập </button>--}}
                </form>
      
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->
@endsection
