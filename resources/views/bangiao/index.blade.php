@extends('home')
@section('index')
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
                        <input type="text" value="" class="search_input" id='search' onkeyup="search_phieubangiao(1);" placeholder="Nhập mã phiếu bàn giao">
                    </div>
                    <div class="select_wrap">
                        <select class=" select select-loaisp form-control" id="nv" data-dropup-auto="false" title="Nhân viên" data-size='5' data-live-search="true">
                            <option value="" selected>--Chọn nhân viên--</option>
                            @foreach ($nhanvien as $val)
                                <option value="{{$val->ma_nv}}">{{$val->ten_nv}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>
            <div class="col-sm-12 " id="list_phieubangiao">
                @include('bangiao.list_phieubangiao')
            </div>
        </div>
    </div>
</div>
@endsection