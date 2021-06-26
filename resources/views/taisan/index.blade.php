@extends('home')
@section('taisan')
<div class="col-sm-12" style="min-height: 810px; background-color: white;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Danh sách tài sản</h3>
            <button type="button" onclick="location.href='{{url('/taisan/create')}}'" class="btn_cus btn-addsp"><i class='bx bx-plus' style="font-weight: 600; "></i>
                Thêm tài sản
              </button>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="admin_search">
                    <div class="admin_search--input  col-md-5">
                        <input type="text" value="" class="search_input" id='search' onkeyup="search_ts(1);" placeholder="Nhập mã tài sản hoặc tên tài sản">
                    </div>
                    <div class="select_wrap">
                        <select class=" select select-loaits form-control" id="loai_taisan"  data-dropup-auto="false" title="Danh mục" data-size='5' data-live-search="true">
                            <option value="" selected>--Chọn loại tài sản--</option>
                            @foreach ($loaits as $val)
                                <option value="{{$val->ma_loai}}">{{$val->ten_loai}}</option>
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
@include('taisan.modal')
@endsection
