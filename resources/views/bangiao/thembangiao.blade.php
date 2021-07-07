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
            <h3 class="main-text" >{{isset($bangiao)?"Sửa phiếu bàn giao tài sản":'Thêm phiếu bàn giao tài sản'}}</h3>
            <div >
                <button class="btn_cus btn-addsp" onclick="location.href='{{url('/word_export/M_u s_ 01 Biên b_n bàn giao, ti_p nh_n tài s_n công (1).docx')}}'" title="Tải mẫu phiếu bàn giao" ><i class='bx bx-download' style="font-weight: 600; "></i>Mẫu phiếu bàn giao</button>
                <button class="btn_cus btn-back" type="button" onclick="location.href='{{route('bangiao.index')}}'"><i class='bx bx-left-arrow-alt'></i> Trở về</button>
            </div>
        </div>
        <form action="{{isset($bangiao)?route('bangiao.update',$bangiao->ma_bangiao):route('bangiao.store')}}" onsubmit="return check_inser_bangiao();" method="POST" enctype="multipart/form-data">
            @csrf
            @php
            if(isset($bangiao)){
                $phonggiao ='';
                $phongnhan = '';
                    foreach ($nhanvien as $val) {
                        if($bangiao->nguoi_giao == $val->ma_nv){
                            $phonggiao = $val->ma_phong;
                        }
                        if($bangiao->nguoi_nhan == $val->ma_nv){
                            $phongnhan = $val->ma_phong;
                        }
                    }
            }
            
            @endphp
            <div class="col-sm-12 row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="form-label">Phòng giao:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <div class="select_wrap form_input--items" style="width: 100%;">
                                    <select class=" select select-phonggiao form-control" id="phonggiao" name ="phong_giao" data-dropup-auto="false" data-size='5' data-live-search="true">
                                        <option value="">--Chọn phòng ban--</option>
                                        @foreach ($phongban as $item)
                                            @if (isset($bangiao) && $phonggiao==$item->ma_phong)
                                                <option value="{{$item->ma_phong}}" selected>{{$item->ten_phong}}</option>
                                            @else
                                                <option value="{{$item->ma_phong}}">{{$item->ten_phong}}</option>
                                            @endif
                                            
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle phonggiao_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_phonggiao error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Đại diện bên giao:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <div class="select_wrap form_input--items" style="width: 100%;">
                                    <select class=" select select-nv_giao form-control" id="nv_giao" name ="nv_giao" data-dropup-auto="false" data-size='5' data-live-search="true">
                                        <option value="">--Chọn nhân viên--</option>
                                        @foreach ($nhanvien as $item)
                                            @if (isset($bangiao) && $bangiao->nguoi_giao == $item->ma_nv)
                                                <option value="{{$item->ma_nv}}" selected>{{$item->ten_nv}}</option>
                                            @else
                                                <option value="{{$item->ma_nv}}">{{$item->ten_nv}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle nv_giao_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_nv_giao error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label ngaygiao_lb">Ngày giao:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <input type="text" class="form-input date ngaygiao" name="ngaygiao" onchange="check('.ngaygiao_lb')" value="{{isset($bangiao)?date('m-d-Y',strtotime($bangiao->ngay_nhan)):''}}"  placeholder="dd-mm-yyyy">
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle ngaygiao_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_ngaygiao error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="margin-top: 50px" >
                        <label for="" class="form-label">Phiếu bàn giao:</label>
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
                        <label for="" class="form-label">Phòng nhận:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <div class="select_wrap form_input--items" style="width: 100%;">
                                    <select class=" select select-phongnhan form-control" id="phongnhan" name ="phong_nhan" data-dropup-auto="false" data-size='5' data-live-search="true">
                                        <option value="">--Chọn phòng ban--</option>
                                        @foreach ($phongban as $item)
                                            @if (isset($bangiao) && $phongnhan==$item->ma_phong)
                                                <option value="{{$item->ma_phong}}" selected>{{$item->ten_phong}}</option>
                                            @else
                                                <option value="{{$item->ma_phong}}">{{$item->ten_phong}}</option>
                                            @endif
                                            
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle phongnhan_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_phongnhan error"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="" class="form-label">Đại diện bên nhận:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <div class="select_wrap form_input--items" style="width: 100%;">
                                    <select class=" select select-nv_nhan form-control" id="nv_nhan" name ="nv_nhan" data-dropup-auto="false" data-size='5' data-live-search="true">
                                        <option value="">--Chọn nhân viên--</option>
                                        @foreach ($nhanvien as $item)
                                            @if (isset($bangiao) && $bangiao->nguoi_nhan == $item->ma_nv)
                                                <option value="{{$item->ma_nv}}" selected>{{$item->ten_nv}}</option>
                                            @else
                                                <option value="{{$item->ma_nv}}">{{$item->ten_nv}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle nv_nhan_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_nv_nhan error"></span>
                            </div>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="" class="form-label">Đại diện chứng kiến:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <div class="select_wrap form_input--items" style="width: 100%;">
                                    <select class=" select select-loaisp form-control"  name ="nv_ck" data-dropup-auto="false" data-size='5' data-live-search="true">
                                        <option value="">--Chọn nhân viên--</option>
                                        @foreach ($nhanvien as $item)
                                            <option value="{{$item->ma_nv}}">{{$item->ten_nv}}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle loaisp_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_loaisp error"></span>
                            </div>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="" class="form-label">Lý do:</label>
                        <div class="form-wrap" style="background-color: #ffff;">
                            <textarea id='lydo' name="lydo" style="display: block; font-size: 14px;padding: 10px; width: 100%; height: 80px;" cols="50" rows="10">{{isset($bangiao)?$bangiao->ghichu:''}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <hr>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="" class="form-label so_ts_lb">Số tài sản bàn giao:</label>
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
            <div class="more_taisan">
                
                    {{-- <div class="col-sm-3">
                        <label >Tài sản bàn giao:</label><br>
                            <div style="width: 100%;">
                                <select class=" select select-ts  form-control" id="ts1"  name ="ma_ts[]" data-dropup-auto="false" data-size='5' data-live-search="true">
                                    <option value="">--Chọn tài sản--</option>
                                    @foreach ($taisan as $item)
                                        <option value="{{$item->ma_ts}}">{{$item->ten_ts}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle ts1_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_ts1 error"></span>
                            </div>
                    </div> --}}
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