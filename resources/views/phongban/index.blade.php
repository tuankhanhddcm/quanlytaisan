@extends('home')
@section('index')
    <div class="col-sm-12" style="min-height: 665px; background-color: white;">
        <div class="main_ward">
            <div class="main-name">
                <h3 class="main-text">Quản lý phòng ban</h3>
                <div >
                    <button type="button" data-toggle="modal" data-target="#them_phongban" class="btn_cus btn-addsp"><i class='bx bx-plus' style="font-weight: 600; "></i>
                        Thêm Phòng ban
                      </button>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="admin_search">
                        <div class="admin_search--input  col-md-5">
                            <input type="text" value="" class="search_input" id='search' onkeyup="search_phong();" placeholder="Nhập mã phòng ban hoặc tên phòng ban">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 " id="list_phong">
                    @include('phongban.list_phong')
                </div>
            </div>
            

            <div id="modal_phongban">
                
            </div>
        </div>
    </div>
    <div class="modal fade" id="them_phongban" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Sửa Phòng Ban</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="/phongban" method="POST" onsubmit="return check('.ten_phong_lb')" >
                <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="" class="form-label ten_phong_lb">Tên Phòng:</label>
                            <div class="form-wrap">
                                <div class="form_input">
                                    <input type="text" class="form-input ten_phong" name="ten_phong" value="" onkeyup="check('.ten_phong_lb')"  placeholder="Nhập vào tên phòng">
                                </div>
                                <div style="display: flex;">
                                    <i class='bx bxs-error-circle ten_phong_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                    <span class="error_ten_phong error"></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="" class="form-label mota_lb">Mô Tả:</label>
                            <div class="form-wrap">
                                <div class="form_input">
                                    <input type="text" class="form-input mota" name="mota"  value=""  placeholder="Nhập vào mô tả">
                                </div>
                                <div style="display: flex;">
                                    <i class='bx bxs-error-circle mota_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                    <span class="error_mota error"></span>
                                </div>
                            </div>
                            </div>       
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn_cus btn_luu" >Sửa</button>
                            <button type="button" class="btn_cus btn-close"  style="margin-bottom: 5px; font-size: 16px;font-weight: 400" data-dismiss="modal">Đóng</button>
                        </div>
                </div>
            </form>
        </div>
    </div>
@endsection