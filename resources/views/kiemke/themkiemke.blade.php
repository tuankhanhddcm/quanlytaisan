@extends('home')
@section('insert')
<style>
    label{
        font-size: 14px !important;
    }
</style>

<div class="col-sm-12" style="min-height: 665px; background-color: white;">
    <div class="main_ward">
        <form action="{{isset($kiemke)?route('kiemke.update',$kiemke->ma_kiemke):route('kiemke.store')}}" method="POST" enctype="multipart/form-data" onsubmit="return check_inser_kiemke()">
            @csrf
            <div class="main-name">
                <h3 class="main-text" >{{isset($kiemke)?"Sửa phiếu kiểm kê":"Thêm phiếu kiểm kê"}}</h3>
                <div style="display: flex; align-items: center" >
                    <button class="btn_cus btn-save" type="submit"><i class='bx bx-save' style="font-weight: 400; "></i>Lưu</button>
                    <button class="btn_cus btn-save" type="button" onclick="check_export_ds_kiemke()" style="background-color:#009900;"><i class='bx bx-export' style="font-weight: 600;"></i>Xuất danh sách tài sản</button>
                    <button class="btn_cus btn-back" type="button" onclick="location.href='{{route('kiemke.index')}}'"><i class='bx bx-left-arrow-alt'></i> Trở về</button>
                </div>
            </div>
        
            <div class="col-sm-12 row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="form-label">Phòng kiểm kê:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <div class="select_wrap form_input--items" style="width: 100%;">
                                    <select class=" select select-phongban form-control" id="phongban" name ="phongban" data-dropup-auto="false" data-size='5' data-live-search="true">
                                        <option value="">--Chọn phòng kiểm kê--</option>
                                        @foreach ($phongban as $item)
                                            @if (isset($kiemke) && $kiemke->ma_phong == $item->ma_phong)
                                                <option value="{{$item->ma_phong}}" selected>{{$item->ten_phong}}</option>
                                            @else
                                                <option value="{{$item->ma_phong}}">{{$item->ten_phong}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle phongban_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_phongban error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="margin-top: 10px">
                        <label for="" class="form-label dot_kk_lb">Đợt kiểm kê:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <input type="text" class="form-input dot_kk" name="dot_kk" onkeyup="check('.dot_kk_lb')" value="{{isset($kiemke)?$kiemke->dot_kiemke:''}}" placeholder="Nhập vào đợt kiểm kê">
                            </div>
                            
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle dot_kk_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_dot_kk error"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="form-label ngaykk_lb">Ngày kiểm kê:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <input type="text" class="form-input date ngaykk" name="ngaykk" onchange="check('.ngaykk_lb');tinh_haomon_kiemke();" value="{{isset($kiemke)?date('d-m-Y',strtotime($kiemke->ngay_kiemke)):''}}"  placeholder="dd-mm-yyyy">
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle ngaykk_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_ngaykk error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Ghi chú:</label>
                        <div class="form-wrap" style="background-color: #ffff;">
                            <textarea id='ghichu' name="ghichu" style="display: block; font-size: 14px;padding: 10px; width: 100%; height: 80px;" cols="50" rows="10">{{isset($kiemke)?$kiemke->ghichu:''}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            @if (isset($nv_kiemke))
            <div class="col-sm-12 row">
                <div class="col-sm-6">
                    @foreach ($nv_kiemke as $i => $item)
                    <div class="form-group">
                        <label for="" class="form-label" id="nv_kk_{{$i+1}}_lb">Tổ kiểm kê:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <div class="select_wrap form_input--items" style="width: 100%;">
                                    <select class=" select select-nv-kk form-control" id="nv_kk_{{$i+1}}" name ="nv_kk[]" data-dropup-auto="false" data-size='5' data-live-search="true">
                                        @foreach ($nhanvien as $item1)
                                            @if ($item->ten_nv == $item1->ten_nv)
                                                <option value="{{$item1->ma_nv}}" selected>{{$item1->ten_nv}}</option>
                                            @else
                                                <option value="{{$item1->ma_nv}}">{{$item1->ten_nv}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle nv_kk_{{$i+1}}_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_nv_kk_{{$i+1}} error"></span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-sm-6">
                    @foreach ($nv_kiemke as $i => $item)
                    <div class="form-group" style="margin-top: 10px">
                        <label for="" class="form-label chucvu_{{$i+1}}_lb">Chức vụ:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <input type="text" class="form-input chucvu_{{$i+1}}" name="chucvu_{{$i+1}}"  value="{{$item->ten_chucvu}}" disabled>
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle chucvu_{{$i+1}}_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_chucvu_{{$i+1}} error"></span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @else
            <div class="col-sm-12 row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="form-label" id="nv_kk_1_lb">Tổ kiểm kê:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <div class="select_wrap form_input--items" style="width: 100%;">
                                    <select class=" select select-nv-kk form-control" id="nv_kk_1" name ="nv_kk[]" data-dropup-auto="false" data-size='5' data-live-search="true">
                                        <option value="">--Chọn nhân viên--</option>
                                        @foreach ($nhanvien as $item)
                                            <option value="{{$item->ma_nv}}">{{$item->ten_nv}}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle nv_kk_1_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_nv_kk_1 error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label  " id="nv_kk_2_lb">Tổ kiểm kê:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <div class="select_wrap form_input--items" style="width: 100%;">
                                    <select class=" select select-nv-kk form-control " id='nv_kk_2'  name ="nv_kk[]" data-dropup-auto="false" data-size='5' data-live-search="true">
                                        <option value="">--Chọn nhân viên--</option>
                                        @foreach ($nhanvien as $item)
                                            <option value="{{$item->ma_nv}}">{{$item->ten_nv}}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle nv_kk_2_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_nv_kk_2 error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label" id="nv_kk_3_lb">Tổ kiểm kê:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <div class="select_wrap form_input--items" style="width: 100%;">
                                    <select class=" select select-nv-kk form-control" id="nv_kk_3" name ="nv_kk[]" data-dropup-auto="false" data-size='5' data-live-search="true">
                                        <option value="">--Chọn nhân viên--</option>
                                        @foreach ($nhanvien as $item)
                                            <option value="{{$item->ma_nv}}">{{$item->ten_nv}}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle nv_kk_3_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_nv_kk_3 error"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group" style="margin-top: 10px">
                        <label for="" class="form-label chucvu_1_lb">Chức vụ:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <input type="text" class="form-input chucvu_1" name="chucvu_1"  value="" disabled>
                            </div>
                            
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle chucvu_1_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_chucvu_1 error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="margin-top: 10px">
                        <label for="" class="form-label chucvu_2_lb">Chức vụ:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <input type="text" class="form-input chucvu_2" name="chucvu_2"  value="" disabled>
                            </div>
                            
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle chucvu_2_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_chucvu_2 error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="margin-top: 10px">
                        <label for="" class="form-label chucvu_3_lb">Chức vụ:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <input type="text" class="form-input chucvu_3" name="chucvu_3"  value="" disabled>
                            </div>
                            
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle chucvu_3_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_chucvu_3 error"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            
            <hr>
            <div class="col-sm-12" id= 'list_taisan_kiemke'>
                @include('kiemke.list_taisan')
            </div>
        </form>
    </div>
</div>

@endsection