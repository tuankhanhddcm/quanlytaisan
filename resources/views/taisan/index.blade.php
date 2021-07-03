@extends('home')
@section('index')
<div class="col-sm-12" style="min-height: 810px; background-color: white;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Danh sách tài sản</h3>
            <div>
                <button type="button" onclick="location.href='{{url('/taisan/create')}}'" class="btn_cus btn-addsp"><i class='bx bx-plus' style="font-weight: 600; "></i>
                    Thêm tài sản
                    </button>
                    <button class="btn_cus btn-addsp" onclick="xuat_excel_ts();" style="background-color:#009900;"><i class='bx bx-export' style="font-weight: 600;"></i>Xuất excel</button>
                    {{-- <button class="btn_cus btn-addsp" style="background-color:#FF3300;"><i class='bx bx-import' style="font-weight: 600;"></i>Nhập dữ liệu</button>
                    <button class="btn_cus btn-addsp" style="background-color:#999999"><i class='bx bx-cog' style="font-weight: 600;"></i>Quản lý</button>
                    <button class="btn_cus btn-addsp" style="background-color:#33CCFF"><i class='bx bxs-report' style="font-weight: 600;"></i>Báo Cáo</button> --}}
            </div>
               
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="admin_search">
                    <div class="admin_search--input  col-md-5">
                        <input type="text" value="" class="search_input" id='search' onkeyup="search_ts(1);" placeholder="Nhập mã tài sản hoặc tên tài sản">
                    </div>
                    <div class="select_wrap">
                        <select class=" select select-loaits form-control" id="taisan"  data-dropup-auto="false" title="Loại TSCĐ" data-size='5' data-live-search="true">
                            <option value="" selected>--Chọn loại TSCĐ--</option>
                            @foreach ($loaits as $val)
                                <option value="{{$val->ma_loai}}">{{$val->ten_loai}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="select_wrap">
                        <select class=" select select-phongban  form-control" id="phong" data-dropup-auto="false" title="Phòng ban" data-size='5' data-live-search="true">
                            <option value="" selected >--Chọn phòng ban--</option>
                            @foreach ($phongban as $item)
                                <option value="{{$item->ma_phong}}">{{$item->ten_phong}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>
            <div class="col-sm-12 " id='list_taisan'>
                @include('taisan.list_taisan')
            </div>
        </div>
    </div>
</div>
@endsection
