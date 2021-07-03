@extends('home')
@section('index')
<div class="col-sm-12" style="min-height: 665px; background-color: white;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Danh mục loại tài sản</h3>
            <div >
                <button type="button" data-toggle="modal" data-target="#themlts" class="btn_cus btn-addsp"><i class='bx bx-plus' style="font-weight: 600; "></i>
                    Thêm loại tài sản
                  </button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="admin_search">
                    <div class="admin_search--input  col-md-4">
                        <input type="text" value="" class="search_input" id='search_loai' onkeyup="search_loai(1);" placeholder="Nhập loại tài sản">
                    </div>
                </div>
            </div>
            <div class="col-sm-12 " id="list_loai">
                @include('loaitaisan.list_loai')
            </div>
        </div>
    </div>
</div>
@include('loaitaisan.modal')
@endsection