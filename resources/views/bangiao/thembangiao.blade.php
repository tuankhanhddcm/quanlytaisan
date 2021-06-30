@extends('home')
@section('thembangiao')
<style>
    label{
        font-size: 14px !important;
    }
</style>

<div class="col-sm-12" style="min-height: 665px; background-color: white;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text" >Giao diện bàn giao tài sản</h3>
            <div >
                <button class="btn_cus btn-addsp" title="Tải mẫu phiếu bàn giao" ><i class='bx bx-download' style="font-weight: 600; "></i>Mẫu phiếu bàn giao</button>
                
            </div>
        </div>
        <form action="" method="POST">
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
                                            <option value="{{$item->ma_phong}}">{{$item->ten_phong}}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle phonggiao_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
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
                                            <option value="{{$item->ma_nv}}">{{$item->ten_nv}}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle nv_giao_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                <span class="error_nv_giao error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label ngaygiao_lb">Ngày Giao:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <input type="text" class="form-input date ngaygiao" name="ngaygiao" onchange="check('.ngaygiao_lb')" value=""  placeholder="dd-mm-yyyy">
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle ngaygiao_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_ngaygiao error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label" style="margin-top:4%;">Phiếu Bàn Giao: </label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <div class="select_wrap form_input--items" style="width: 100%;">
                                    <input type="file" name="phieubangiao" style="margin-top:3%">
                                </div>
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle phieubg_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                <span class="error_phieubg error"></span>
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
                                            <option value="{{$item->ma_phong}}">{{$item->ten_phong}}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle phongnhan_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
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
                                            <option value="{{$item->ma_nv}}">{{$item->ten_nv}}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle nv_nhan_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                <span class="error_nv_nhan error"></span>
                            </div>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="" class="form-label">Đại diện chứng kiến:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <div class="select_wrap form_input--items" style="width: 100%;">
                                    <select class=" select select-loaisp form-control" id="loaisp" name ="nv_ck" data-dropup-auto="false" data-size='5' data-live-search="true">
                                        <option value="">--Chọn nhân viên--</option>
                                        @foreach ($nhanvien as $item)
                                            <option value="{{$item->ma_nv}}">{{$item->ten_nv}}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle loaisp_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                <span class="error_loaisp error"></span>
                            </div>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="" class="form-label">Lý do:</label>
                        <div class="form-wrap" style="background-color: #ffff;">
                            <textarea id='lydo' name="lydo" style="display: block; font-size: 1.2rem;padding: 10px; width: 100%; height: 80px;" cols="50" rows="10"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <hr>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="" class="form-label so_ts_lb">Số tài sản:</label>
                    <div class="form-wrap">
                        <div class="form_input">
                            <input type="text" class="form-input so_ts soluong" id="so_tai_san"  onkeyup="check('.so_ts_lb');if($(this).val()=='0'){$(this).val('1')};" value="1"  placeholder="Nhập vào số tài sản">
                        </div>
                        <div style="display: flex;">
                            <i class='bx bxs-error-circle so_ts_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                            <span class="error_so_ts error"></span>
                        </div>
                    </div>
              </div>
            </div>
            <div class="more_taisan">
                <div class="col-sm-12 row">
                    <div class="col-sm-3">
                        <label >Tài sản:</label><br>
                            <div style="width: 100%;">
                                <select class=" select select-ts ts1 form-control"   name ="ma_ts[]" data-dropup-auto="false" data-size='5' data-live-search="true">
                                    <option value="">--Chọn tài sản--</option>
                                    @foreach ($taisan as $item)
                                        <option value="{{$item->ma_ts}}">{{$item->ten_ts}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle ts_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                <span class="error_ts error"></span>
                            </div>
                    </div>
                    <div class="col-sm-3">
                        <label>Chi tiết tài sản:</label><br>
                            <div style="width: 100%;">
                                <select class=" select select-loaisp form-control" id="chitiet1" name ="ma_chitiet[]" data-dropup-auto="false" data-size='5' data-live-search="true">
                                    <option value="">--Chọn chi tiết tài sản--</option>
                                </select>
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle loaisp_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                <span class="error_loaisp error"></span>
                            </div>
                    </div>
                    <div class="col-sm-3">
                        <label >Tình Trạng:</label><br>
                            <div class="form_input">
                                <input type="text" class="form-input tt" name="tinhtrang[]">
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle tinhtrang_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                <span class="error_tinhtrang error"></span>
                            </div>
                    </div>
                </div>
            </div>
            
           
            <div class="row">
                <div class="col">

                </div >
                <div class="col-sm-8">

                </div>
                <div class="col">
                    <Button type="submit" style="background-color: #1ec023; border: none;color: white; padding: 10px 25px; border-radius: 7px; margin:auto;margin-top: 20px;">Hoàn Thành</Button>
                </div>
                
            </div>
        </form>
    </div>
</div>

@endsection