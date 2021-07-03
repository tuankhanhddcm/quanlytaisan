@extends('home')
@section('index')
<div class="col-sm-12" style="min-height: 665px; background-color: white;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Quản lý nhân viên</h3>
            <div >
                <button type="button" data-toggle="modal" data-target="#themnhanvien" class="btn_cus btn-addsp"><i class='bx bx-plus' style="font-weight: 600; "></i>
                    Thêm Nhân viên
                  </button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="admin_search">
                    <div class="admin_search--input  col-md-4">
                        <input type="text" value="" class="search_input" id='search' placeholder="Nhập mã phòng ban hoặc tên phòng ban">
                    </div>
                </div>
            </div>
            <div class="col-sm-12 ">
                <table class="table table_sp ">
                    <thead class="heading-table">
                        <tr>
                            <th style="border-left: 1px solid rgba(0,0,0,.1); width:5%;">STT</th>
                            <th style="width: 10%;">Mã nhân viên</th>
                            <th style="width: 18%;">Tên nhân viên</th>
                            <th style="width: 18%;">Email</th>
                            <th style="width: 17%;">Địa Chỉ</th>
                            <th style="width: 7%">Phòng ban</th>
                            <th style="width: 7%">Chức vụ</th>
                            <th style="width: 12%">Hoạt động</th>
                        </tr>
                    </thead>
                    <tbody id="list_product">
                        @foreach ($nhanvien as $key => $item)
                            <tr>
                                <td style="border: 1px solid rgba(0,0,0,.1)">{{$key+1}}</td>
                                <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->ma_nv}}</td>
                                <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->ten_nv}}</td>
                                <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->email}}</td>
                                <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->diachi}}</td>
                                <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->ten_chucvu}}</td>
                                <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->ten_phong}}</td>
                                <td >
                                    <button style="width:40px; height:40px; margin-left: 10%; border:none; background-color: transparent;" ><i class='bx bx-edit' style="font-size: 30px; color:#5bc0de;"></i></button>
                                    <button style="width:40px; height:40px; margin-left: 10%; border:none; background-color: transparent;" ><i class='bx bxs-x-square' style="font-size: 30px; color:#FF3300;"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="modal fade" id="themnhanvien" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Thêm nhân viên</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="/nhanvien" method="post" onsubmit=" return check_insert_nv()">
                            @csrf
                            <div class="modal-body">
                                    <div class="form-group">
                                        <label for="" class="form-label ten_nv_lb">Tên nhân viên:</label>
                                        <div class="form-wrap">
                                            <div class="form_input">
                                                <input type="text" class="form-input ten_nv" name="ten_nv" onkeyup="check('.ten_nv_lb')" value=""  placeholder="Nhập vào tên nhân viên">
                                            </div>
                                            <div style="display: flex;">
                                                <i class='bx bxs-error-circle ten_nv_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                                <span class="error_ten_nv error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label email_nv_lb">Email:</label>
                                        <div class="form-wrap">
                                            <div class="form_input">
                                                <input type="text" class="form-input email_nv" name="email" onkeyup="check('.email_nv_lb')" value=""  placeholder="Nhập vào email">
                                            </div>
                                            <div style="display: flex;">
                                                <i class='bx bxs-error-circle email_nv_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                                <span class="error_email_nv error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label sdt_nv_lb">Số điện thoại:</label>
                                        <div class="form-wrap">
                                            <div class="form_input">
                                                <input type="text" class="form-input sdt_nv" name="sdt" onkeyup="check('.sdt_nv_lb')" value=""  placeholder="Nhập vào số điện thoại">
                                            </div>
                                            <div style="display: flex;">
                                                <i class='bx bxs-error-circle sdt_nv_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                                <span class="error_sdt_nv error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label diachi_nv_lb">Địa chỉ:</label>
                                        <div class="form-wrap">
                                            <div class="form_input">
                                                <input type="text" class="form-input diachi_nv" name="diachi" onkeyup="check('.diachi_nv_lb')" value=""  placeholder="Nhập vào địa chỉ">
                                            </div>
                                            <div style="display: flex;">
                                                <i class='bx bxs-error-circle diachi_nv_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                                <span class="error_diachi_nv error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Phòng ban:</label>
                                        <div class="form-wrap">
                                            <div class="form_input">
                                                <div class="select_wrap form_input--items" style="width: 100%;">
                                                    <select class=" select select-phongban form-control" id="phongban" name ="ma_phong" data-dropup-auto="false" data-size='5' data-live-search="true">
                                                        <option value="">--Chọn phòng ban--</option>
                                                        @foreach ($phongban as $item)
                                                            <option value="{{$item->ma_phong}}">{{$item->ten_phong}}</option>
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
                                        <label for="" class="form-label">Chức vụ:</label>
                                        <div class="form-wrap">
                                            <div class="form_input">
                                                <div class="select_wrap form_input--items" style="width: 100%;">
                                                    <select class=" select select-chucvu form-control" id="chucvu" name ="ma_chucvu" data-dropup-auto="false" data-size='5' data-live-search="true">
                                                        <option value="">--Chọn chức vụ--</option>
                                                        @foreach ($chucvu as $item)
                                                            <option value="{{$item->ma_chucvu}}">{{$item->ten_chucvu}}</option>
                                                        @endforeach
                                                    </select>
                                                    
                                                </div>
                                            </div>
                                            <div style="display: flex;">
                                                <i class='bx bxs-error-circle chucvu_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                                <span class="error_chucvu error"></span>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn_cus btn_luu " onclick="">Lưu</button>
                                <button type="button" class="btn_cus btn-close"  style="margin-bottom: 5px; font-size: 16px;font-weight: 400" data-dismiss="modal">Đóng</button>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection