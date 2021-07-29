@extends('home')
@section('chitiet')
<div class="col-sm-12" style=" background-color: white;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Thông tin tài sản</h3>
            <div class="form-btn">
                <button class="btn_cus btn-back" onclick="location.href='{{url()->previous()}}'"><i class='bx bx-left-arrow-alt'></i> Trở về</button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12" style="border: 1px solid rgba(0,0,0,0.1);margin-bottom: 10px">
                <span class="text_line">Thông tin chung</span>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Tên tài sản:</label>
                            <div class="col-sm-8">{{isset($taisan)?$taisan->ten_ts:''}}</div>
                        </div>  
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Loại TSCĐ:</label>
                            <div class="col-sm-8">{{isset($taisan)?$taisan->ten_loai:''}}</div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Số lượng:</label>
                            <div class="col-sm-8">{{isset($taisan)?$taisan->soluong:''}}</div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Nguyên giá:</label>
                            <div class="col-sm-8">{{isset($taisan)?number_format($taisan->nguyengia).'đ':''}}</div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-7">Giá trị hao mòn hàng năm:</label>
                            <div class="col-sm-5">{{isset($taisan)?number_format($taisan->nguyengia*$taisan->muc_tieuhao/100):''}}đ</div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Giá trị còn lại:</label>
                            <div class="col-sm-8">{{isset($taisan)?number_format($taisan->nguyengia - (($taisan->nguyengia*$taisan->muc_tieuhao/100)*(date('Y')-date('Y',strtotime($taisan->ngay_sd))))):''}}đ</div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Phòng ban:</label>
                            <div class="col-sm-8">
                                @php
                                    if(isset($taisan)){
                                        foreach ($phongts as $val) {
                                            if($taisan->ma_ts ==$val->ma_ts){
                                                echo $val->ten_phong.'<br/>';
                                            }
                                        }
                                    }
                                    
                                @endphp
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Năm sản xuất:</label>
                            <div class="col-sm-8">{{isset($taisan)?$taisan->nam_sx:''}}</div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Nước sản xuất:</label>
                            <div class="col-sm-8">{{isset($taisan)?$taisan->nuoc_sx:''}}</div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Nhà cung cấp:</label>
                            <div class="col-sm-8">{{isset($taisan)?$taisan->ten_ncc:''}}</div>
                        </div>
                    </div>
                    
                    <div class="col-sm-4">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-6">Ngày sử dụng:</label>
                            <div class="col-sm-6">{{isset($taisan)?date('d-m-Y',strtotime($taisan->ngay_sd)):''}}</div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-8">Thời gian sử dụng còn lại (năm):</label>
                            <div class="col-sm-4">
                                @php
                                    if(isset($taisan)){
                                        $nam_ht = date('Y',time());
                                        $nam_sd = date('Y',strtotime($taisan->ngay_sd));
                                        $conlai = $nam_ht-$nam_sd;
                                        if($conlai < $taisan->thoi_gian_sd){
                                            echo $taisan->thoi_gian_sd -$conlai.' năm';
                                        }else {
                                            echo '0 năm';
                                        }
                                    }
                                @endphp
                            </div>
                        </div>
                    </div>

              </div>
            
        </div>
        <div class="col-sm-12 ">
            <div style=" display: flex;align-items: center;">
                <div style="font-size: 28px;color:#333;">Dach sách chi tiết tài sản</div>
                <div style="margin-left: 20px"><button type="button" data-toggle="modal" data-target="#themchitiet" class="btn_cus btn-addsp"><i class='bx bx-plus' style="font-weight: 600; "></i>
                    Thêm mới chi tiết</button>
                </div>
            </div>
            <input type="hidden"  class="ma_ts" name="ma_ts" value="{{$taisan->ma_ts}}">
            <div id="list_chitiet">
                @include('taisan.list_chitiet')
                
            </div>
        </div>
    </div>
</div>
<div id="modal_chitietofts">
    @include('taisan.modal_chitiet')
</div>  

@endsection
