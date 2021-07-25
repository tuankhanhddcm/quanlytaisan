@extends('home')
@section('index')
<div class="col-sm-12" style="min-height: 810px; background-color: white;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Báo cáo  tài sản đã thanh lý</h3>
            <div>
                <button class="btn_cus btn-addsp" onclick="xuat_excel_baocao_ts('baocao_tl')" style="background-color:#009900;"><i class='bx bx-export' style="font-weight: 600;"></i>Xuất excel</button>
            </div>
               
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="admin_search">
                    
                    <div class="select_wrap">
                        <select class=" select select-baocao  form-control" id="phong" data-dropup-auto="false" title="Phòng ban" data-size='5' data-live-search="true">
                            <option value="" selected >--Chọn phòng ban--</option>
                            @foreach ($phongban as $item)
                                <option value="{{$item->ma_phong}}">{{$item->ten_phong}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                </div>
            </div>
            <div class="col-sm-12 " id='list_baocao_tl'>
                @include('baocao.list_taisan_tl')
            </div>
        </div>
    </div>
</div>
@endsection
