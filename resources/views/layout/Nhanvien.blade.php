@extends('home')
@section('nhanvien')
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
                        {{-- @foreach ($nhanvien as $key => $item)
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
                        @endforeach --}}
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
                        <div class="modal-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="" class="form-label sl_lb">Tên nhân viên:</label>
                                    <div class="form-wrap">
                                        <div class="form_input">
                                            <input type="text" class="form-input sl" name="ten_nv" onkeyup="check('.sl_lb')" value="" style="text-align: right;" placeholder="Nhập vào tên nhân viên">
                                        </div>
                                        <div style="display: flex;">
                                            <i class='bx bxs-error-circle sl_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                            <span class="error_sl error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label sl_lb">Email:</label>
                                    <div class="form-wrap">
                                        <div class="form_input">
                                            <input type="text" class="form-input sl" name="email" onkeyup="check('.sl_lb')" value="" style="text-align: right;" placeholder="Nhập vào email">
                                        </div>
                                        <div style="display: flex;">
                                            <i class='bx bxs-error-circle sl_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                            <span class="error_sl error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label sl_lb">Địa chỉ:</label>
                                    <div class="form-wrap">
                                        <div class="form_input">
                                            <input type="text" class="form-input sl" name="diachi" onkeyup="check('.sl_lb')" value="" style="text-align: right;" placeholder="Nhập vào địa chỉ">
                                        </div>
                                        <div style="display: flex;">
                                            <i class='bx bxs-error-circle sl_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                            <span class="error_sl error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Phòng ban:</label>
                                    <div class="form-wrap">
                                        <div class="form_input">
                                            <div class="select_wrap form_input--items" style="width: 100%;">
                                                <select class=" select select-loaisp form-control" id="loaisp" name ="ma_phong" data-dropup-auto="false" data-size='5' data-live-search="true">
                                                    <option value="">--Chọn Phong--</option>
                                                        <option value="">1</option>
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
                                    <label for="" class="form-label">Chức vụ:</label>
                                    <div class="form-wrap">
                                        <div class="form_input">
                                            <div class="select_wrap form_input--items" style="width: 100%;">
                                                <select class=" select select-loaisp form-control" id="loaisp" name ="ma_cv" data-dropup-auto="false" data-size='5' data-live-search="true">
                                                    <option value="">--Chọn chức vụ--</option>
                                                        <option value="">1</option>
                                                </select>
                                                
                                            </div>
                                        </div>
                                        <div style="display: flex;">
                                            <i class='bx bxs-error-circle loaisp_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                            <span class="error_loaisp error"></span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Thêm nhân viên</button>
                        </div>

                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection