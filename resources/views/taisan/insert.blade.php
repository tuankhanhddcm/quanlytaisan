@extends('home')
@section('insert')
<div class="col-sm-12" style=" background-color: white; padding-left: 10px;">
    <div class="main_ward">
        <form action="{{(isset($taisan))?route('taisan.update',$taisan->ma_ts):route('taisan.store')}}" method="post"  onsubmit="return check_insert_taisan()">
            @csrf
            <div class="main-name">
                <h4 class="main-text">{{(isset($taisan))?'Sửa tài sản':'Thêm mới tài sản'}}</h4>
    
                <div class="form-btn">
                    <button  type="submit"  class="btn_cus btn-save" ><i class='bx bx-save'></i> Lưu</button>
                    {{-- <button class="btn_cus btn-conti"  ><i class='bx bx-save'></i> Lưu & Tiếp tục</button> --}}
                    <button class="btn_cus btn-conti" onclick="if(check_insert_taisan('cần in')){in_theTSCD();}" type="button" style="background-color: #3a3a3a"  ><i class='bx bx-printer'></i> In thẻ TSCĐ</button>
                    <button class="btn_cus btn-back" type="button" onclick="location.href='{{url('/taisan')}}'"><i class='bx bx-left-arrow-alt'></i> Trở về</button>
                </div>
    
            </div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs sign-header" style="border: none; margin-bottom: 30px; margin-top: 0;" id="navId">
                <li class="nav-item">
                    <a href="#tab1Id" class="nav-link active " id="info_sp" data-toggle="tab">Thông tin chung</a>
                </li>
                <li class="nav-item">
                    <a href="#tab2Id" class="nav-link" id="thongso_sp" data-toggle="tab">Thông tin hao mòn/khấu hao</a>
                </li>
            </ul>
    
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab1Id" role="tabpanel">
                    <div class="row">
                        <div class="col-sm-12" style="border: 1px solid rgba(0,0,0,0.1);margin-bottom: 10px">
                            <span class="text_line">Thông tin chung</span>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="form-label tents_lb">Tên tài sản:</label>
                                        <div class="form-wrap">
                                            <div class="form_input">
                                                <input type="text" class="form-input tents" name="tents" onkeyup="check('.tents_lb')" value="{{(isset($taisan))?$taisan->ten_ts:''}}" placeholder="Nhập tên tài sản">
                                            </div>
                                            <div style="display: flex;">
                                                <i class='bx bxs-error-circle tents_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                                <span class="error_tents error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    @if (!isset($taisan))
                                        <div class="form-group">
                                            <label for="" class="form-label sl_lb">Số lượng:</label>
                                            <div class="form-wrap">
                                                <div class="form_input">
                                                    <input type="text" class="form-input sl soluong" name="sl" onkeyup="check('.sl_lb');if($(this).val()=='0'){$(this).val('1')};" value="1" style="text-align: right;" placeholder="1">
                                                </div>
                                                <div style="display: flex;">
                                                    <i class='bx bxs-error-circle sl_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                                    <span class="error_sl error"></span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    
                                </div>
                                <div class="col-sm-6">
                                  
                                    <div class="form-group">
                                        <label for="" class="form-label">Loại tài sản:</label>
                                        <div class="form-wrap">
                                            <div class="form_input">
                                                <div class="select_wrap form_input--items" style="width: 100%;">
                                                    <select class=" select loaits-select form-control" id="loaits" name="ma_loai" data-dropup-auto="false" data-size='5' data-live-search="true">
                                                        <option value="">--Chọn loại tài sản--</option>
                                                        @foreach ($loaits as $item)
                                                            @if (isset($taisan) && $taisan->ma_loai ==$item->ma_loai)
                                                                <option value="{{$item->ma_loai}}" selected>{{$item->ten_loai}}</option>
                                                            @else
                                                                <option value="{{$item->ma_loai}}">{{$item->ten_loai}}</option>
                                                            @endif
                                                            
                                                        @endforeach
                                                    </select>
                                                    
                                                </div>
                                            </div>
                                            <div style="display: flex;">
                                                <i class='bx bxs-error-circle loaits_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                                <span class="error_loaits error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Phòng/ban:</label>
                                        <div class="form-wrap">
                                            <div class="form_input">
                                                <div class="select_wrap form_input--items" style="width: 100%;">
                                                    <select class=" select select-phongban form-control" id="phongban" name="phongban" data-dropup-auto="false" data-size='5' data-live-search="true">
                                                        <option value="" >--Chọn phòng ban--</option>
                                                        @foreach ($phongban as $item)
                                                            @if (isset($taisan) && $taisan->ma_phong==$item->ma_phong)
                                                                <option value="{{$item->ma_phong}}" selected>{{$item->ten_phong}}</option>
                                                            @else
                                                                <option value="{{$item->ma_phong}}">{{$item->ten_phong}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    <button class=" btn_plus"  type="button" data-toggle="modal" data-target="#create_ncc"><i class='bx bx-plus'></i></button>
                                                </div>
                                            </div>
                                            <div style="display: flex;">
                                                <i class='bx bxs-error-circle phongban_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                                <span class="error_phongban error"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            
                        </div>
                        <div class="col-sm-12" style="border: 1px solid rgba(0,0,0,0.1);margin: 10px 0px;">
                            <span class="text_line">Thông tin khác</span>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="form-label nsx_lb">Năm sản xuất:</label>
                                        <div class="form-wrap">
                                            <div class="form_input">
                                                <input type="text" class="form-input nsx soluong" name='nsx' onkeyup="check('.nsx_lb')" value="{{(isset($taisan))?$taisan->nam_sx:''}}"  placeholder="Nhập năm sản xuất">
                                            </div>
                                            <div style="display: flex;">
                                                <i class='bx bxs-error-circle nsx_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                                <span class="error_nsx error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label nuoc_sx_lb">Nước sản xuất:</label>
                                        <div class="form-wrap">
                                            <div class="form_input">
                                                <input type="text" class="form-input nuoc_sx" name="nuoc_sx" onkeyup="check('.nuoc_sx_lb')" value="{{(isset($taisan))?$taisan->nuoc_sx:''}}" placeholder="Nhập nước sản xuất">
                                            </div>
                                            <div style="display: flex;">
                                                <i class='bx bxs-error-circle nuoc_sx_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                                <span class="error_nuoc_sx error"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                  
                                    <div class="form-group">
                                        <label for="" class="form-label">Nhà cung cấp:</label>
                                        <div class="form-wrap">
                                            <div class="form_input">
                                                <div class="select_wrap form_input--items" style="width: 100%;">
                                                    <select class=" select select-ncc form-control" id="ncc" name="ncc" data-dropup-auto="false" data-size='5' data-live-search="true">
                                                        <option value="">--Chọn nhà cung cấp--</option>
                                                        @foreach ($nhacungcap as $item)
                                                            @if (isset($taisan) && $taisan->ma_ncc==$item->ma_ncc)
                                                                <option value="{{$item->ma_ncc}}" selected>{{$item->ten_ncc}}</option>
                                                            @else
                                                                <option value="{{$item->ma_ncc}}">{{$item->ten_ncc}}</option>
                                                            @endif
                                                            
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
                                    
                                </div>
                            </div>
                        
                            
                        </div>
    
                    </div>
                </div>
                <div class="tab-pane fade" id="tab2Id" role="tabpanel">
                    <div class="row">
                        <div class="col-sm-12" style="border: 1px solid rgba(0,0,0,0.1);margin-bottom: 10px">
                            <span class="text_line">Chi tiết sử dụng</span>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="form-label ngaymua_lb">Ngày mua:</label>
                                        <div class="form-wrap">
                                            <div class="form_input">
                                                <input type="text" class="form-input date ngaymua" name="ngay_mua" onchange="check('.ngaymua_lb')" value="{{(isset($taisan))?$taisan->ngay_mua:''}}"  placeholder="dd-mm-yyyy">
                                            </div>
                                            <div style="display: flex;">
                                                <i class='bx bxs-error-circle ngaymua_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                                <span class="error_ngaymua error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label ngaytang_lb">Ngày ghi tăng:</label>
                                        <div class="form-wrap">
                                            <div class="form_input">
                                                <input type="text" class="form-input date ngaytang" name="ngaytang" onchange="check('.ngaytang_lb')" value="{{(isset($taisan))?$taisan->ngay_ghi_tang:''}}"  placeholder="dd-mm-yyyy">
                                            </div>
                                            <div style="display: flex;">
                                                <i class='bx bxs-error-circle ngaytang_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                                <span class="error_ngaytang error"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="form-label ngaysd_lb">Ngày sử dụng:</label>
                                        <div class="form-wrap">
                                            <div class="form_input">
                                                <input type="text" class="form-input date ngaysd" name="ngaysd" onchange="check('.ngaysd_lb');$('.bd_HM').text($(this).val());tinh_nam_HM($(this).val());console.log(check_ngaysd());" value="{{(isset($taisan))?$taisan->ngay_sd:''}}"  placeholder="dd-mm-yyyy">
                                            </div>
                                            <div style="display: flex;">
                                                <i class='bx bxs-error-circle ngaysd_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                                <span class="error_ngaysd error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label ngia_lb">Nguyên giá:</label>
                                        <div class="form-wrap">
                                            <div class="form_input">
                                                <input type="text" class="form-input ngia soluong" name="ngia" onkeyup="check('.ngia_lb')" value="{{(isset($taisan))?$taisan->nguyengia:''}}" style="text-align: right"  placeholder="0">
                                            </div>
                                            <div style="display: flex;">
                                                <i class='bx bxs-error-circle ngia_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                                <span class="error_ngia error"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            
                        </div>
                        <div class="col-sm-12" style="border: 1px solid rgba(0,0,0,0.1);margin: 10px 0px;">
                            <span class="text_line">Thông tin hao mòn/khấu hao</span>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="form-label bd_HM_lb">Ngày bắt đầu tính hao mòn:</label>
                                        <div class="form-wrap">
                                            <div class="form_input">
                                                <span  class="form-input bd_HM " style="display: block;border-color:#4bac4d;">dd-mm-yyyy</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label tile_HM_lb">Tỉ lệ HM (% năm):</label>
                                        <div class="form-wrap">
                                            <div class="form_input">
                                                <span  class="form-input tile_HM " style="display: block;border-color:#4bac4d;text-align: right">0.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label tgSD_conlai_lb">Thời gian SD còn lại (năm):</label>
                                        <div class="form-wrap">
                                            <div class="form_input">
                                                <span  class="form-input tgSD_conlai_HM " style="display: block;border-color:#4bac4d;text-align: right">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-sm-6">
                                  
                                    <div class="form-group">
                                        <label for="" class="form-label tgSD_lb">Thời gian sử dụng (năm):</label>
                                        <div class="form-wrap">
                                            <div class="form_input">
                                                <span  class="form-input tgSD " style="display: block;border-color:#4bac4d;text-align: right">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label giatri_HM_lb">Giá trị HM/KH năm:</label>
                                        <div class="form-wrap">
                                            <div class="form_input">
                                                <span  class="form-input giatri_HM " style="display: block;border-color:#4bac4d;text-align: right">0</span>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label dennam_lb">Đến năm:</label>
                                        <div class="form-wrap">
                                            <div class="form_input">
                                                <span  class="form-input dennam_HM " style="display: block;border-color:#4bac4d;text-align: right">0</span>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12" style="border-top: 1px solid rgba(0,0,0,0.1);margin: 10px 0px;">
                                    <span class="text_line">Khấu hao</span>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="" class="form-label bd_KH_lb">Ngày bắt đầu tính khấu hao:</label>
                                                <div class="form-wrap">
                                                    <div class="form_input">
                                                        <input type="text" class="form-input date bd_KH" disabled value="" placeholder="dd-mm-yyyy">
                                                    </div>
                                                    <div style="display: flex;">
                                                        <i class='bx bxs-error-circle bd_KH_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                                        <span class="error_bd_KH error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="form-label kytinh_kh_lb">Kỳ tính khấu hao:</label>
                                                <div class="form-wrap">
                                                    <div class="form_input">
                                                        <input type="text" class="form-input kytinh_kh" disabled  value="Tháng" style="text-align: right" placeholder="">
                                                    </div>
                                                    <div style="display: flex;">
                                                        <i class='bx bxs-error-circle kytinh_kh_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                                        <span class="error_kytinh_kh error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="form-label tyle_KH_lb">Tỷ lệ tính khấu hao (%):</label>
                                                <div class="form-wrap">
                                                    <div class="form_input">
                                                        <input type="text" class="form-input tyle_KH" disabled  value="" style="text-align: right" placeholder="0.00">
                                                    </div>
                                                    <div style="display: flex;">
                                                        <i class='bx bxs-error-circle tyle_KH_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                                        <span class="error_tyle_KH error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="form-label luyke_lb">Khấu hao lũy kế:</label>
                                                <div class="form-wrap">
                                                    <div class="form_input">
                                                        <input type="text" class="form-input luyke" disabled  value="" style="text-align: right" placeholder="0">
                                                    </div>
                                                    <div style="display: flex;">
                                                        <i class='bx bxs-error-circle luyke_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                                        <span class="error_luyke error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-sm-6">
                                          
                                            <div class="form-group">
                                                <label for="" class="form-label giatri_KH_lb">Giá trị tính khấu hao:</label>
                                                <div class="form-wrap">
                                                    <div class="form_input">
                                                        <input type="text" class="form-input giatri_KH" disabled  value="" style="text-align: right" placeholder="0">
                                                    </div>
                                                    <div style="display: flex;">
                                                        <i class='bx bxs-error-circle giatri_KH_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                                        <span class="error_giatri_KH error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="form-label tg_KH_lb">Thời gian tính khấu hao:</label>
                                                <div class="form-wrap">
                                                    <div class="form_input">
                                                        <input type="text" class="form-input tg_KH" disabled value="" style="text-align: right" placeholder="0">
                                                    </div>
                                                    <div style="display: flex;">
                                                        <i class='bx bxs-error-circle tg_KH_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                                        <span class="error_tg_KH error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="form-label giatri_KH_thang_lb">Giá trị khấu hao tháng:</label>
                                                <div class="form-wrap">
                                                    <div class="form_input">
                                                        <input type="text" class="form-input giatri_KH_thang" disabled value="" style="text-align: right" placeholder="0">
                                                    </div>
                                                    <div style="display: flex;">
                                                        <i class='bx bxs-error-circle giatri_KH_thang_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                                        <span class="error_giatri_KH_thang error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="form-label tg_KH_conlai_lb">Thời gian tính KH còn lại tháng:</label>
                                                <div class="form-wrap">
                                                    <div class="form_input">
                                                        <input type="text" class="form-input tg_KH_conlai" disabled value="" style="text-align: right" placeholder="0">
                                                    </div>
                                                    <div style="display: flex;">
                                                        <i class='bx bxs-error-circle tg_KH_conlai_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                                        <span class="error_tg_KH_conlai error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                    
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="form-label HM_KH_luyke_lb">Hao mòn/khấu hao lũy kế:</label>
                                        <div class="form-wrap">
                                            <div class="form_input">
                                                <input type="text" class="form-input HM_KH_luyke"  value="" style="text-align: right" placeholder="0">
                                            </div>
                                            <div style="display: flex;">
                                                <i class='bx bxs-error-circle HM_KH_luyke_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                                <span class="error_HM_KH_luyke error"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="form-label conlai_lb">Giá trị còn lại:</label>
                                        <div class="form-wrap">
                                            <div class="form_input">
                                                <input type="text" class="form-input conlai" disabled value="" style="text-align: right" placeholder="0">
                                            </div>
                                            <div style="display: flex;">
                                                <i class='bx bxs-error-circle conlai_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                                <span class="error_conlai error"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </form>
        
    </div>
</div>
@include('taisan.modal')
@endsection
