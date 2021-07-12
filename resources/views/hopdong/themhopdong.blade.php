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
            <h3 class="main-text">Thêm Hợp Đồng</h3>
            <div >
                <button class="btn_cus btn-addsp"> <i class='bx bx-download' style="font-weight: 600; "></i>Mẫu hợp đòng mua sắm tài sản</button>
                <button class="btn_cus btn-back" type="button" onclick="location.href='{{route('hopdong.index')}}'"><i class='bx bx-left-arrow-alt'></i> Trở về</button>
            </div>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-sm-12 row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="form-label">Nhà cung cấp:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <div class="select_wrap form_input--items" style="width: 100%;">
                                    <select class=" select select-ncc form-control" id="ncc" name="ncc" data-dropup-auto="false" data-size='5' data-live-search="true">
                                        <option value="">--Chọn nhà cung cấp--</option>
                                        @foreach ($nhacungcap as $item)
                                            {{-- @if (isset($taisan) && $taisan->ma_ncc==$item->ma_ncc)
                                                <option value="{{$item->ma_ncc}}" selected>{{$item->ten_ncc}}</option>
                                            @else
                                                <option value="{{$item->ma_ncc}}">{{$item->ten_ncc}}</option>
                                            @endif --}}
                                        @endforeach
                                    </select>
                                    <button class=" btn_plus"  type="button" data-toggle="modal" data-target="#create_ncc"><i class='bx bx-plus'></i></button>
                                </div>
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle ncc_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_ncc error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="margin-top: 10px">
                        <label for="" class="form-label tongtien_lb">Tổng tiền:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <input type="text" class="form-input tongtien" name="tongtien" onkeyup="check('.tongtien_lb')" value="" placeholder="Nhập vào tổng số tiền">
                            </div>
                            
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle tongtien_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_tongtien error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="margin-top: 10px">
                        <label for="" class="form-label thanhtoan_lb">Đã thanh toán:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <input type="text" class="form-input thanhtoan" name="thanhtoan" onkeyup="check('.thanhtoan_lb')" value="" placeholder="Nhập vào số tiền đẫ thanh toán">
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle thanhtoan_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_thanhtoan error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="margin-top: 50px" >
                        <label for="" class="form-label">Hợp đồng:</label>
                        <div class="form-wrap">
                            <div style="display: flex;">
                                <label class="btn_upload"><input type="file" hidden name="file_pdf" id="file_pdf" onchange="readURL(this,'#file_pdf','pdf')" accept=".pdf" style="display: none" >Chọn file</label>
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
                        <label for="" class="form-label ngayky_lb">Ngày ký:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <input type="text" class="form-input date ngayky" name="ngayky" onchange="check('.ngayky_lb')" value=""  placeholder="dd-mm-yyyy">
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle ngayky_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_ngayky error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="margin-top: 10px">
                        <label for="" class="form-label trangthai_lb">Trạng thái:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <input type="text" class="form-input trangthai" name="trangthai" onkeyup="check('.trangthai_lb')" value="" placeholder="Nhập vào trạng thái">
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle trangthai_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_trangthai error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Ghi chú:</label>
                        <div class="form-wrap" style="background-color: #ffff;">
                            <textarea id='ghichu' name="ghichu" style="display: block; font-size: 1.2rem;padding: 10px; width: 100%; height: 130px;" cols="50" rows="10"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            {{-- <div class="col-sm-12" id="list_taisan">
                @include('kiemke.list_taisan')
            </div> --}}
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="" class="form-label so_ts_lb">Số tài sản mua sắm:</label>
                    <div class="form-wrap">
                        <div class="form_input">
                            <input type="text" class="form-input so_ts soluong" id="so_tai_san_hd"  onkeyup="check('.so_ts_lb');if($(this).val()=='0'){$(this).val('1')};" value="1"  placeholder="Nhập vào số tài sản">
                        </div>
                        <div style="display: flex;">
                            <i class='bx bxs-error-circle so_ts_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                            <span class="error_so_ts error"></span>
                        </div>
                    </div>
              </div>
            </div>
            <div class="more_taisanhd">
                <div class="col-sm-12 row" style="margin-bottom: 20px">
                    <div class="form_input col-sm-4">
                        <label >Tài sản:</label><br>
                        <div class="select_wrap form_input--items" style="width: 100%;">
                            <select class=" select select-loaisp form-control" id="taisan" name="ma_taisan[]" data-dropup-auto="false" data-size='5' data-live-search="true">
                                <option value="">--Chọn tài sản--</option>
                                
                            </select>
                            <button class=" btn_plus"  type="button" data-toggle="modal" data-target="#create_ts"><i class='bx bx-plus'></i></button>
                        </div>
                        <div style="display: flex;">
                            <i class='bx bxs-error-circle taisan_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                            <span class="error_taisan error"></span>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label >Số lượng:</label><br>
                            <div class="form_input">
                                <input type="text" class="form-input tt" name="sl[]">
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle sl_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_sl error"></span>
                            </div>
                    </div>
                    <div class="col-sm-4">
                        <label >VAT :</label><br>
                            <div class="form_input">
                                <input type="text" class="form-input tt" name="vat[]">
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle vat_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_vat error"></span>
                            </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12" style="display: flex; justify-content: flex-end">
                    <Button type="submit" style="background-color: #1ec023; border: none;color: white; padding: 10px 25px; border-radius: 7px;margin-top: 20px">Hoàn Thành</Button>
                </div>
                
            </div>
        </form>
    </div>
</div>
@include('hopdong.model')
@endsection
