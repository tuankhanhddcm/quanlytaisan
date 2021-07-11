@extends('home')
@section('chitiet')
<div class="col-sm-12" style=" background-color: white;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Thông tin phòng/ban</h3>
            <div class="form-btn">
                <button class="btn_cus btn-back" onclick="location.href='{{route('phongban.index')}}'"><i class='bx bx-left-arrow-alt'></i> Trở về</button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12" style="border: 1px solid rgba(0,0,0,0.1);margin-bottom: 10px">
                <span class="text_line">Thông tin chung</span>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Mã phòng/ban:</label>
                            <div class="col-sm-8">{{isset($phongban)?$phongban->ma_phong:''}}</div>
                        </div>  
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Tên phòng/ban:</label>
                            <div class="col-sm-8">{{isset($phongban)?$phongban->ten_phong:''}}</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Số lượng tài sản hiện có:</label>
                            <div class="col-sm-8">{{isset($phongban)?$phongban->soluong:''}}</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Mô tả:</label>
                            <div class="col-sm-8">{{(isset($phongban ) && $phongban->mota !='')?$phongban->mota:'Không có mô tả'}}</div>
                        </div>
                    </div>
              </div>
            
        </div>
        <div class="col-sm-12 ">
            <div style=" display: flex;align-items: center;">
                <div style="font-size: 28px;color:#333;">Dach sách tài sản hiện có</div>
            </div>
            <input type="hidden"  class="phongban" name="phongban" value="{{$phongban->ma_phong}}">
            <div id="list_taisan">
                @include('taisan.list_taisan')
                
            </div>
        </div>
    </div>
</div>  

@endsection
