@extends('home')
@section('chitiet')

<div class="col-sm-12" style=" background-color: white;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Chi tiết phiếu kiểm kê</h3>
            <div class="form-btn">
                <button class="btn_cus btn-addsp" onclick="location.href='{{route('kiemke.export',$phieukk->ma_kiemke)}}'" style="background-color:#009900;"><i class='bx bx-export' style="font-weight: 600;"></i>Xuất excel</button>
                <button class="btn_cus btn-back" onclick="location.href='{{route('kiemke.index')}}'"><i class='bx bx-left-arrow-alt'></i> Trở về</button>
            </div>
        </div>
        <div class="row">
           
            <div class="col-sm-12" style="border: 1px solid rgba(0,0,0,0.1);margin-bottom: 10px">
                <span class="text_line">Thông tin phiếu kiểm kê</span>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Phòng kiểm kê:</label>
                            <div class="col-sm-8">{{$phieukk->ten_phong}}</div>
                        </div>  
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Đợt kiểm kê:</label>
                            <div class="col-sm-8">{{$phieukk->dot_kiemke}}</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Ngày kiểm kê:</label>
                            <div class="col-sm-8">{{date('d-m-Y',strtotime($phieukk->ngay_kiemke))}}</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Ghi chú:</label>
                            <div class="col-sm-8">{{$phieukk->ghichu}}</div>
                        </div>
                    </div>
                    @foreach ($nv as $val)
                        <div class="col-sm-6">
                            <div class="form-group detail_user">
                                <label for="" class="col-sm-4">Tên Ông/Bà:</label>
                                <div class="col-sm-8">{{$val->ten_nv}}</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group detail_user">
                                <label for="" class="col-sm-4">Chức Vụ:</label>
                                <div class="col-sm-8">{{$val->ten_chucvu}}</div>
                            </div>
                        </div>
                    @endforeach
              </div>
        </div>
        <div class="col-sm-12 ">
            <div style=" display: flex;align-items: center;">
                <div style="font-size: 28px;color:#333;">Dach sách tài sản kiểm kê</div>
                
            </div>
            <div id="list_taisan">
                @include('kiemke.list_taisan')
            </div>
        </div>
    </div>
</div>  
@endsection