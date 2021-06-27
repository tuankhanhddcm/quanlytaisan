@extends('home')
@section('loaiTSCĐ')
<div class="col-sm-12" style="min-height: 665px; background-color: white;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Danh mục loại tài sản cố định</h3>
            <div >
                <button type="button" data-toggle="modal" data-target="#themTSCĐ" class="btn_cus btn-addsp"><i class='bx bx-plus' style="font-weight: 600; "></i>
                    Thêm loại TSCĐ
                  </button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="admin_search">
                    <div class="admin_search--input  col-md-4">
                        <input type="text" value="" class="search_input" id='search_loai' onkeyup="search_loaiTSCD(1);" placeholder="Nhập loại tài sản">
                    </div>
                    <div class="select_wrap">
                        <select class=" select select-loaits form-control" id="loai_taisan"  data-dropup-auto="false" title="Danh mục" data-size='5' data-live-search="true">
                            <option value="" selected>--Chọn loại tài sản--</option>
                            @foreach ($loai as $val)
                                <option value="{{$val->id_loai}}">{{$val->ten_loai}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
            </div>
            <div class="col-sm-12 " id="list_loaiTSCD">
                @include('loaiTSCĐ.list_loai')
            </div>
        </div>
    </div>
</div>
<div id="modal_tscd">
    @include('loaiTSCĐ.modal')
</div>

@endsection