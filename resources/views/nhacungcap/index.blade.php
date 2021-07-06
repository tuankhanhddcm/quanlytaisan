@extends('home')
@section('index')
<div class="col-sm-12" style="min-height: 665px; background-color: white;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Quản nhà cung cấp</h3>
            <div >
                <button type="button" data-toggle="modal" data-target="#themncc" class="btn_cus btn-addsp"><i class='bx bx-plus' style="font-weight: 600; "></i>
                    Thêm nhà cung cấp
                  </button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="admin_search">
                    <div class="admin_search--input  col-md-4">
                        <input type="text" value="" class="search_input" id='search' onkeyup="search_ncc()" placeholder="Nhập mã mã nhà cung cấp hoặc tên nhà cung cấp">
                    </div>
                </div>
            </div>
            <div class="col-sm-12 " id="list_nhacungcap">
                @include('nhacungcap.list_nhacungcap')
            </div>
            <div id="modal_ncc">
                
            </div>
            <div>
                <div class="modal fade" id="themncc" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Thêm nhà cung cấp</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="/nhacungcap" method="post" onsubmit=" return check_insert_ncc()">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group" style="margin-top: 10px">
                                    <label for="" class="form-label ten_ncc_lb">Tên nhà cung cấp:</label>
                                    <div class="form-wrap">
                                        <div class="form_input">
                                            <input type="text" class="form-input ten_ncc" name="ten_ncc" onkeyup="check('.ten_ncc_lb')" value="" placeholder="Nhập tên nhà cung cấp">
                                        </div>
                                        
                                        <div style="display: flex;">
                                            <i class='bx bxs-error-circle ten_ncc_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                            <span class="error_ten_ncc error"></span>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="" class="form-label sdt_ncc_lb">Số điện thoại:</label>
                                    <div class="form-wrap">
                                        <div class="form_input">
                                            <input type="text" class="form-input sdt_ncc" name="sdt_ncc" onkeyup="check('.sdt_ncc_lb')" value="" placeholder="Nhập số điện thoại">
                                        </div>
                                        
                                        <div style="display: flex;">
                                            <i class='bx bxs-error-circle sdt_ncc_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                            <span class="error_sdt_ncc error"></span>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="" class="form-label email_ncc_lb">Email:</label>
                                    <div class="form-wrap">
                                        <div class="form_input">
                                            <input type="text" class="form-input email_ncc" name="email_ncc" onkeyup="check('.email_ncc_lb')" value="" placeholder="Nhập email">
                                        </div>
                                        
                                        <div style="display: flex;">
                                            <i class='bx bxs-error-circle email_ncc_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                            <span class="error_email_ncc error"></span>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="" class="form-label diachi_ncc_lb">Địa chỉ:</label>
                                    <div class="form-wrap">
                                        <div class="form_input">
                                            <input type="text" class="form-input diachi_ncc" name="diachi_ncc" onkeyup="check('.diachi_ncc_lb')" value="" placeholder="Nhập địa chỉ">
                                        </div>
                                        
                                        <div style="display: flex;">
                                            <i class='bx bxs-error-circle diachi_ncc_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                            <span class="error_diachi_ncc error"></span>
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