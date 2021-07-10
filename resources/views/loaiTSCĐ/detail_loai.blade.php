@extends('home')
@section('chitiet')
<div class="col-sm-12" style=" background-color: white;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Thông tin loại tài sản cố định</h3>
            <div class="form-btn">
                <button class="btn_cus btn-back" onclick="location.href='{{route('loaiTSCD.index')}}'"><i class='bx bx-left-arrow-alt'></i> Trở về</button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Tên loại:</label>
                            <div class="col-sm-8">{{isset($loaiTSCD)?$loaiTSCD->ten_loai:''}}</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Thuộc loại:</label>
                            <div class="col-sm-8">{{isset($loaiTSCD)?$loaiTSCD->loai:''}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12" style="border: 1px solid rgba(0,0,0,0.1);margin-bottom: 10px">
                <span class="text_line">Chi tiết sử dụng</span>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-5">Thời gian sử dụng (năm):</label>
                            <div class="col-sm-6">{{isset($loaiTSCD)?$loaiTSCD->thoi_gian_sd:''}}</div>
                        </div>  
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Tỉ lệ HM (% năm):</label>
                            <div class="col-sm-8">{{isset($loaiTSCD)?$loaiTSCD->muc_tieuhao:''}}</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">TK nguyên giá:</label>
                            <div class="col-sm-8"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">TK hao mòn:</label>
                            <div class="col-sm-8"></div>
                        </div>
                    </div>
              </div>
            
        </div>
        <div class="col-sm-12 ">
            <div style=" display: flex;align-items: center;">
                <div style="font-size: 28px;color:#333;">Dach sách tài sản</div>
                <div style="margin-left: 20px"><button type="button" onclick="location.href='{{url('taisan/create')}}'" class="btn_cus btn-addsp"><i class='bx bx-plus' style="font-weight: 600; "></i>
                    Thêm tài sản</button>
                </div>
            </div>
            <input type="hidden" class="ma_loai" name="ma_loai" value="{{$loaiTSCD->ma_loai}}">
            
            <div id="list_taisan">
                @include('taisan.list_taisan')
                
            </div>
        </div>
    </div>
</div>    
@endsection
