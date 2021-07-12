@extends('home')
@section('index')
<div class="col-sm-12" style="min-height: 665px; background-color: white;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Hợp đồng mua sắm tài sản</h3>
            <div >
                <button class="btn_cus btn-addsp" onclick="location.href='{{route('hopdong.create')}}'" ><i class='bx bx-plus' style="font-weight: 600; "></i>Thêm Hợp Đồng</button>
                <button class="btn_cus btn-addsp" style="background-color:#009900;"><i class='bx bx-export' style="font-weight: 600;"></i>Xuất file</button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="admin_search">
                    <div class="admin_search--input  col-md-3">
                        <input type="text" value="" class="search_input" id='search' onkeyup="search_hopdong(1)" placeholder="Nhập mã hợp đồng">
                    </div>
                    <div class="select_wrap">
                        <select class=" select select-loaisp form-control" id="ncc" data-dropup-auto="false" title="Nhà cung cấp" data-size='5' data-live-search="true">
                            <option value="" selected>--Chọn nhà cung cấp--</option>
                            @foreach ($nhacungcap as $val)
                                <option value="{{$val->ma_ncc}}">{{$val->ten_ncc}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 " id="list_hopdong">
               @include('hopdong.list_hopdong')
            </div>
        </div>
    </div>
</div>
@endsection