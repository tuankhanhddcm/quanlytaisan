@extends('home')
@section('index')
<div class="col-sm-12" style="min-height: 810px; background-color: white;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Báo cáo  tài sản</h3>
            <div>
                <button class="btn_cus btn-addsp" onclick="xuat_excel_baocao_ts('baocao_ts');" style="background-color:#009900;"><i class='bx bx-export' style="font-weight: 600;"></i>Xuất excel</button>
            </div>
               
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="admin_search">
                    <div class="select_wrap">
                        <select class=" select select-baocao form-control" id="taisan"  data-dropup-auto="false" title="Loại TSCĐ" data-size='5' data-live-search="true">
                            <option value="" selected>--Chọn loại TSCĐ--</option>
                            @foreach ($loaits as $val)
                                <option value="{{$val->ma_loai}}">{{$val->ten_loai}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="select_wrap">
                        <select class=" select select-baocao  form-control" id="phong" data-dropup-auto="false" title="Phòng ban" data-size='5' data-live-search="true">
                            <option value="" selected >--Chọn phòng ban--</option>
                            @foreach ($phongban as $item)
                                <option value="{{$item->ma_phong}}">{{$item->ten_phong}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="select_wrap">
                        <select class=" select select-baocao  form-control" id="trangthai" data-dropup-auto="false" title="Trạng thái" data-size='5' data-live-search="true">
                            <option value="0" selected>Tài sản còn sử dụng</option>
                            <option value="1">Tài sản đã bị xóa</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 " id='list_baocao_ts'>
                @include('baocao.list_taisan')
            </div>
        </div>
    </div>
</div>
@endsection
