@extends('home')
@section('insert')
<style>
    label{
        font-size: 14px !important;
    }
</style>
<div class="col-sm-12" style="min-height: 665px; background-color: white;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text" >Thêm Phiếu Thanh Lý</h3>
            <div >
                <button class="btn_cus btn-addsp" onclick="" title="Tải mẫu phiếu bàn giao" ><i class='bx bx-download' style="font-weight: 600; "></i>Mẫu phiếu thanh lý</button>
                <button class="btn_cus btn-back" type="button" onclick="location.href='{{route('thanhly.index')}}'"><i class='bx bx-left-arrow-alt'></i> Trở về</button>
            </div>
        </div>
        <form action="{{isset($thanhly)?route('thanhly.update',$thanhly->ma_thanhly):route('thanhly.store')}}"  onsubmit="return check_inser_thanhly()" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- @php
            if(isset($thanhly)){
                $phonggiao ='';
                $phongnhan = '';
                    foreach ($nhanvien as $val) {
                        if($thanhly->nguoi_giao == $val->ma_nv){
                            $phonggiao = $val->ma_phong;
                        }
                        if($thanhly->nguoi_nhan == $val->ma_nv){
                            $phongnhan = $val->ma_phong;
                        }
                    }
            }
            @endphp --}}
            <div class="col-sm-12 row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="form-label">Phòng thanh lý:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <div class="select_wrap form_input--items" style="width: 100%;">
                                    <select class=" select phongban-select form-control" id="phongban" name ="phongban" data-dropup-auto="false" data-size='5' data-live-search="true">
                                        <option value="">--Chọn phòng ban--</option>
                                        @foreach ($phongban as $item)
                                            @if (isset($thanhly) && $thanhly->ma_phong == $item->ma_phong)
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
                    <div class="form-group">
                        <label for="" class="form-label">Người lập phiếu:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <div class="select_wrap form_input--items" style="width: 100%;">
                                    <select class=" select select-nhanvien form-control" id="nhanvien" name ="nhanvien" data-dropup-auto="false" data-size='5' data-live-search="true">
                                        <option value="">--Chọn nhân viên--</option>
                                        @foreach ($nhanvien as $item)
                                            @if (isset($thanhly) && $thanhly->ma_nv == $item->ma_nv)
                                                <option value="{{$item->ma_nv}}" selected>{{$item->ten_nv}}</option>
                                            @else
                                                <option value="{{$item->ma_nv}}">{{$item->ten_nv}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle nhanvien_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_nhanvien error"></span>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="form-group">
                        <label for="" class="form-label nguoimua_lb">Đơn vị mua:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <input type="text" class="form-input  nguoimua" name="nguoimua" onchange="check('.nguoimua_lb')" value="{{isset($thanhly)?$thanhly->:''}}"  placeholder="dd-mm-yyyy">
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle nguoimua_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_nguoimua error"></span>
                            </div>
                        </div>
                    </div> --}}
                    <div class="form-group" style="margin-top: 50px" >
                        <label for="" class="form-label">Phiếu thanh lý:</label>
                        <div class="form-wrap">
                            <div style="display: flex;">
                                <label class="btn_upload"><input type="file" hidden name="file_pdf" id="file_pdf" onchange="readURL(this,'#file_pdf','pdf')" accept=".pdf"  style="display: none" >Chọn file</label>
                                <div style="width: 300px">
                                    <div class="text_name_pdf" style="overflow:hidden"></div>
                                </div>
                            </div>
                           
                            <div style="display: flex; padding-bottom: 20px">
                                <i class='bx bxs-error-circle file_pdf_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_file_pdf error"></span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="form-label ngaylap_lb">Ngày thanh lý:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <input type="text" class="form-input date ngaylap" name="ngaylap" onchange="check('.ngaylap_lb')" value="{{isset($thanhly)?date('d-m-Y',strtotime($thanhly->ngay_thanhly)):''}}"  placeholder="dd-mm-yyyy">
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle ngaylap_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_ngaylap error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Lý do:</label>
                        <div class="form-wrap" style="background-color: #ffff;">
                            <textarea id='lydo' name="lydo" style="display: block; font-size: 14px;padding: 10px; width: 100%; height: 80px;" cols="50" rows="10">{{isset($thanhly)?$thanhly->ghichu:''}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <hr>
           <div class="col-sm-4">
                <div class="form-group">
                    <label for="" style="width: 200px" class="form-label so_ts_lb">Số tài sản thanh lý:</label>
                    <div class="form-wrap">
                        <div class="form_input">
                            <input type="text" class="form-input so_ts soluong" id="so_tai_san"  onkeyup="check('.so_ts_lb');if($(this).val()=='0'){$(this).val('1')};" value="{{isset($chitiet)?count($chitiet):'1'}}"  placeholder="Nhập vào số tài sản">
                        </div>
                        <div style="display: flex;">
                            <i class='bx bxs-error-circle so_ts_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                            <span class="error_so_ts error"></span>
                        </div>
                    </div>
              </div>
            </div>

            <div class="more_taisan_tl">

                @if (isset($chitiet) &&  count($chitiet) >0)

                @foreach ($chitiet as $i=> $item)
                <div class="col-sm-12 row" style="margin-bottom: 20px">
                    <div class="col-sm-4">
                        <label>Chi tiết tài sản thuộc nhân viên giao:</label><br>
                            <div style="width: 100%;">
                                <select class=" select select-loaisp form-control " id="chitiet{{$i+1}}"  name ="ma_chitiet[]" data-dropup-auto="false" data-size='5' data-live-search="true">
                                    <option value="{{$item->ma_chitiet}}">{{$item->ten_chitiet}}</option>
                                </select>
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle chitiet1_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_chitiet1 error"></span>
                            </div>
                    </div>
                    <div class="col-sm-4">
                        <label >Tình Trạng:</label><br>
                            <div class="form_input">
                                <input type="text" class="form-input tt" name="tinhtrang[]" value="{{$item->tinhtrang}}">
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle tinhtrang_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_tinhtrang error"></span>
                            </div>
                    </div>
                </div>
                @endforeach
            @else
            <div class="col-sm-12 row" style="margin-bottom: 20px">
                <div class="col-sm-4">
                    <label>Chi tiết tài sản thuộc nhân viên giao:</label><br>
                        <div style="width: 100%;">
                            <select class=" select select-loaisp form-control " id="chitiet1"  name ="ma_chitiet[]" data-dropup-auto="false" data-size='5' data-live-search="true">
                                <option value="">--Chọn chi tiết tài sản--</option>
                            </select>
                        </div>
                        <div style="display: flex;">
                            <i class='bx bxs-error-circle chitiet1_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                            <span class="error_chitiet1 error"></span>
                        </div>
                </div>
                <div class="col-sm-4">
                    <label >Tình Trạng:</label><br>
                        <div class="form_input">
                            <input type="text" class="form-input tt" name="tinhtrang[]" value="">
                        </div>
                        <div style="display: flex;">
                            <i class='bx bxs-error-circle tinhtrang_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                            <span class="error_tinhtrang error"></span>
                        </div>
                </div>
            </div>
            @endif
            </div>
            <div class="row">
                <div class="col-sm-12" style="display: flex; justify-content: flex-end">
                    <Button type="submit" style="background-color: #1ec023; border: none;color: white; padding: 10px 25px; border-radius: 7px;margin-top: 20px">Hoàn Thành</Button>
                </div>
                
            </div>
        </form>
    </div>
</div>
@endsection