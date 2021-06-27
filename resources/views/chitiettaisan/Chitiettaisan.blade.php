@extends('home')
@section('chitiettaisan')
<div class="col-sm-12" style="min-height: 800px; background-color: white;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Chi tiết tài sản</h3>
            <div >
                <button class="btn_cus btn-addsp" data-toggle="modal" data-target="#themchitiet" ><i class='bx bx-plus' style="font-weight: 600; "></i>Thêm chi tiết</button>
                
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="admin_search">
                    <div class="admin_search--input  col-md-5">
                        <input type="text" value="" class="search_input" id='search' onkeyup="search_chitiet(1);" placeholder="Nhập tên chi tiết">
                    </div>
                    <div class="select_wrap">
                        <select class=" select select-loaits form-control" id="taisan" data-dropup-auto="false" title="Danh mục" data-size='5' data-live-search="true">
                            <option value="" selected>--Chọn tài sản--</option>
                            @foreach ($taisan as $item)
                                <option value="{{$item->ma_ts}}">{{$item->ten_ts}}</option>
                            @endforeach
                        </select>
                    </div>
                    

                </div>
            </div>
            <div class="col-sm-12 " id="list_chitiet">
                @include('chitiettaisan.list_chitiet')
            </div>
        </div>
    </div>
</div>
@include('chitiettaisan.modal')
@endsection
