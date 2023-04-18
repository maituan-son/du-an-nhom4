@extends('layouts.admin.main')
<!-- Recent Sales Start -->
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">{{$tieuDe}}</h6>
            </div>

            <!--Search Start-->
            <div>
                <form action="{{url("search/$i/$tieuDe/$title/$table/$duong_dan")}}"
                      method="GET">
                    <div class="input-group mb-3 w-75">
                        <input type="text" class="form-control w-50" name="noi_dung_tk"
                               placeholder="Mời nhập hóa đơn cần tìm!">
                        <select name="key_loai" size="0" id="" class="form-select w-25">
                            <option value="0" selected>Tình trạng</option>
                            <option value="1">Đơn hàng mới</option>
                            <option value="2">Đang chuẩn bị hàng</option>
                            <option value="3">Đang giao</option>
                            <option value="4">Giao hàng thành công</option>
                        </select>
                        <button type="submit" class="btn btn-outline-warning" name="tim_kiem">Tìm kiếm</button>
                    </div>
                </form>
            </div>
            <!--Search End-->

            <div class="table-responsive">
                <form action="{{url('admin/nguoi-dung/xoa-nguoi-dung/'.$i)}}" method="post" id="form_ds">
                    <table class="table text-start align-middle table-bordered table-hover mb-10">
                        <thead>
                        <tr class="text-dark text-center">
                            <th class="text-center"><input type="checkbox" id="checkAll"></th>
                            <th scope="col">Mã hóa đơn</th>
                            <th scope="col">Tổng giá trị</th>
                            <th scope="col">Ngày đặt hàng</th>
                            <th scope="col">Tình trạng đơn hàng</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($all as $v)
                            <tr>
                                <td class="text-center"><input type="checkbox" class="checkItem"
                                                               value="{{$v->id_hoaDon}}" name="id[]"></td>

                                <td>{{$v->id}}</td>
                                <td>{{number_format($v->tong_tien)}} VNĐ</td>
                                <td>{{$v->ngay_dat_hang}}</td>
                                <td>@if($v->tinh_trang == 1)
                                        {{"Đơn hàng mới"}}
                                    @endif
                                    @if($v->tinh_trang == 2)
                                        {{"Đang chuẩn bị hàng"}}
                                    @endif
                                    @if($v->tinh_trang == 3)
                                    {{"Đang giao"}}
                                    @endif
                                    @if($v->tinh_trang == 4)
                                    {{"Giao hàng thành công"}}
                                    @endif

                                <td>
                                    <a class="btn btn-outline-success"
                                       {{$i = isset($i) ? $i : 0}}
                                       href="{{url('admin/hoa-don/sua-hoa-don/'.$i.'/'.$v->id)}}">Cập nhật</a>
                                    <a class="btn btn-outline-success"
                                       {{$i = isset($i) ? $i : 0}}
                                       href="{{url('admin/chi-tiet-don-hang/'.$v->id)}}">Chi tiết</a>
                                </td>   
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="8">
                                <!--Pages Start-->
                                @include('lib.page.form_page')
                                <!--Pages End-->
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->
@endsection
