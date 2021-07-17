@extends('home')
@section('index')
<div class="col-sm-12" style="min-height: 665px; background-color: white;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Thanh Lý Tài Sản</h3>
            <div >
                <button class="btn_cus btn-addsp" onclick="location.href='{{route('thanhly.create')}}'" ><i class='bx bx-plus' style="font-weight: 600; "></i>Thêm thanh lý</button>
                {{-- <button class="btn_cus btn-addsp" style="background-color:#009900;"><i class='bx bx-export' style="font-weight: 600;"></i>Xuất excel</button> --}}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="admin_search">
                    <div class="admin_search--input  col-md-4">
                        <input type="text" value="" class="search_input" id='search' onkeyup="" placeholder="Nhập mã phiếu thanh lý">
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
            <div class="col-sm-12 " id="list_phieuthanhly">
                @include('thanhly.list_phieuthanhly')
            </div>
        </div>
    </div>
</div>
@endsection