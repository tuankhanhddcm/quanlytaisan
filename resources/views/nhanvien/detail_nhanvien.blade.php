@extends('home')
@section('chitiet')
<div class="col-sm-12" style=" background-color: white;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Thông tin nhân viên</h3>
            <div class="form-btn">
                <button class="btn_cus btn-back" onclick="location.href='{{route('nhanvien.index')}}'"><i class='bx bx-left-arrow-alt'></i> Trở về</button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12" style="border: 1px solid rgba(0,0,0,0.1);margin-bottom: 10px">
                <span class="text_line">Thông tin chung</span>
                <div class="row">
                    
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Tên nhân viên:</label>
                            <div class="col-sm-8">{{isset($nv)?$nv->ten_nv:''}}</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Email:</label>
                            <div class="col-sm-8">{{isset($nv)?$nv->email:''}}</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Địa chỉ:</label>
                            <div class="col-sm-8">{{isset($nv)?$nv->diachi:''}}</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Tên phòng/ban:</label>
                            <div class="col-sm-8">{{isset($nv)?$nv->ten_phong:''}}</div>
                        </div>  
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Chức vụ:</label>
                            <div class="col-sm-8">{{isset($nv)?$nv->ten_chucvu:''}}</div>
                        </div>  
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Số tài sản đang sử dụng:</label>
                            <div class="col-sm-8">{{isset($nv)?$nv->soluong:'0'}}</div>
                        </div>  
                    </div>
              </div>
            
        </div>
        <div class="col-sm-12 ">
            <div style=" display: flex;align-items: center;">
                <div style="font-size: 28px;color:#333;">Dach sách tài sản đang sử dụng</div>
            </div>
            <input type="hidden"  class="nhanvien" name="nhanvien" value="{{$nv->ma_nv}}">
            <div id="list_chitiet">
                @include('chitiettaisan.list_chitiet')
                
            </div>
        </div>
    </div>
</div>  


@endsection
