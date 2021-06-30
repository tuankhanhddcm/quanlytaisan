@extends('home')
@section('bangiao')
<div class="col-sm-12" style="min-height: 665px; background-color: white;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Bàn Giao Tài Sản</h3>
            <div >
                <button class="btn_cus btn-addsp" onclick="location.href='{{route('bangiao.create')}}'" ><i class='bx bx-plus' style="font-weight: 600; "></i>Thêm Bàn Giao</button>
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
                        <input type="text" value="" class="search_input" id='search' placeholder="Nhập mã bàn giao">
                    </div>
                    <div class="select_wrap">
                        <select class=" select select-loaisp form-control" id="phong" data-dropup-auto="false" title="Phòng Ban" data-size='5' data-live-search="true">
                            <option value="" selected>--Chọn Phòng Ban--</option>
                           
                        </select>
                    </div>

                </div>
            </div>
            <div class="col-sm-12 ">
                <table class="table table_sp ">
                    <thead class="heading-table">
                        <tr>
                            <th style="border-left: 1px solid rgba(0,0,0,.1); width:5%;">STT</th>
                            <th style="width: 10%;">Mã Phiếu</th>
                            <th style="width: 12%;">Tên người giao</th>
                            <th style="width: 10%;">Phòng giao</th>
                            <th style="width: 12%;">Tên người nhận</th>
                            <th style="width: 10%;">Phòng nhận</th>
                            <th style="width: 10%;">Ngày giao</th>
                            <th style="width: 15%;">Lý do</th>
                            <th style="width: 5%;">In phiếu</th>
                            <th style="width: 11%;">Hoạt động</th>
                        </tr>
                    </thead>
                    <tbody id="list_product">
                           
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection