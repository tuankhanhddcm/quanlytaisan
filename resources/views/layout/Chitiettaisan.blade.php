@extends('home')
@section('chitiettaisan')
<div class="col-sm-12" style="min-height: 665px; background-color: white;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Chi tiết tài sản</h3>
            <div >
                <button class="btn_cus btn-addsp" ><i class='bx bx-plus' style="font-weight: 600; "></i>Thêm chi tiết</button>
                <button class="btn_cus btn-addsp" style="background-color:#009900;"><i class='bx bx-export' style="font-weight: 600;"></i>Xuất excel</button>
                <button class="btn_cus btn-addsp" style="background-color:#FF3300;"><i class='bx bx-import' style="font-weight: 600;"></i>Nhập dữ liệu</button>
                <button class="btn_cus btn-addsp" style="background-color:#999999"><i class='bx bx-cog' style="font-weight: 600;"></i>Quản lý</button>
                <button class="btn_cus btn-addsp" style="background-color:#33CCFF"><i class='bx bxs-report' style="font-weight: 600;"></i>Báo Cáo</button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="admin_search">
                    <div class="admin_search--input  col-md-5">
                        <input type="text" value="" class="search_input" id='search' placeholder="Nhập mã sản phẩm hoặc tên sản phẩm">
                    </div>
                    <div class="select_wrap">
                        <select class=" select select-loaisp form-control" id="loaisp" data-dropup-auto="false" title="Danh mục" data-size='5' data-live-search="true">
                            <option value="" selected>--Chọn Danh mục--</option>
                           
                        </select>
                    </div>
                    <div class="select_wrap">
                        <select class=" select select-nsx  form-control" id="nsx" data-dropup-auto="false" title="Nhà sản xuất" data-size='5' data-live-search="true">
                            <option value="" selected>--Chọn Nhà sản xuất--</option>
                            
                        </select>
                    </div>

                </div>
            </div>
            <div class="col-sm-12 ">
                <table class="table table_sp ">
                    <thead class="heading-table">
                        <tr>
                            <th style="border-left: 1px solid rgba(0,0,0,.1); width:10px;">STT</th>
                            <th style="width: 80px;">Mã tài sản</th>
                            <th style="width: 120px;">Tên tài sản</th>
                            <th style="width: 80px;">Loại tài sản</th>
                            <th style="width: 70px;">Số serial</th>
                            <th style="width: 80px;">Nguyên giá</th>
                            <th style="width: 80px;">Tiêu hao</th>
                            <th style="width: 80px;">Nhà cung cấp</th>
                            <th style="width: 80px;">Ngày mua</th>
                            <th style="width: 80px;">Nơi mua</th>
                            <th style="width: 80px;">Nơi Sản Xuất</th>
                            <th style="width: 80px;">Trạng thái</th>
                            <th style="width: 80px;">Người sử dụng</th>
                            <th style="width: 80px;border-right: none;">Đơn vị quản lý</th>
                        </tr>
                    </thead>
                    <tbody id="list_product">
                        {{-- @foreach ($chitiet as $key => $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->ma_ts}}</td>
                                <td>{{$item->ten_ts}}</td>
                                <td>{{$item->ma_loai}}</td>
                                <td>{{$item->so_serial}}</td>
                                <td>{{$item->nguyen_gia}}</td>
                                <td>{{$item->muc_tieuhao}}</td>
                                <td>{{$item->ten_ncc}}</td>
                                <td>{{$item->ngay_mua}}</td>
                                <td>{{$item->noi_mua}}</td>
                                <td>{{$item->noi_san_xuat}}</td>
                                <td>{{$item->trang_thai}}</td>
                                <td>{{$item->ten_nv}}</td>
                                <td>{{$item->ten_phong}}</td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
