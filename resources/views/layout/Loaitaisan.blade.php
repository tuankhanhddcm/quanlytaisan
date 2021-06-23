@extends('home')
@section('loaitaisan')
<div class="col-sm-12" style="min-height: 665px; background-color: white;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Danh mục loại tài sản</h3>
            <div >
                <button type="button" data-toggle="modal" data-target="#themlts" class="btn_cus btn-addsp"><i class='bx bx-plus' style="font-weight: 600; "></i>
                    Thêm loại tài sản
                  </button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="admin_search">
                    <div class="admin_search--input  col-md-4">
                        <input type="text" value="" class="search_input" id='search' placeholder="Nhập loại tài sản">
                    </div>
                </div>
            </div>
            <div class="col-sm-12 ">
                <table class="table table_sp ">
                    <thead class="heading-table">
                        <tr>
                            <th style="border-left: 1px solid rgba(0,0,0,.1); width:10%;">STT</th>
                            <th style="width: 20%;">Mã Loại</th>
                            <th style="width: 25%;">Tên Loại</th>
                            <th style="width: 30%;">Mô tả</th>
                            <th style="width: 15%">Hoạt động</th>
                        </tr>
                    </thead>
                    <tbody id="list_product">
                        {{-- @foreach ($loai as $key => $item)
                            <tr>
                                <td style="border: 1px solid rgba(0,0,0,.1)">{{$key+1}}</td>
                                <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->ma_loai}}</td>
                                <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->ten_loai}}</td>
                                <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->mo_ta}}</td>
                                <td >
                                    <button style="width:40px; height:40px; margin-left: 10%; border:none; background-color: transparent;" ><i class='bx bx-edit' style="font-size: 30px; color:#5bc0de;"></i></button>
                                    <button style="width:40px; height:40px; margin-left: 10%; border:none; background-color: transparent;" ><i class='bx bxs-x-square' style="font-size: 30px; color:#FF3300;"></i></button>
                                </td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
                <div class="modal fade" id="themlts" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Thêm loại tài sản</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form action="">
                                <div class="form-group">
                                    <label for="" class="form-label sl_lb">Loại tài sản:</label>
                                    <div class="form-wrap">
                                        <div class="form_input">
                                            <input type="text" class="form-input sl" name="ten_nv" onkeyup="check('.sl_lb')" value="" style="text-align: right;" placeholder="Nhập vào loại tài sản">
                                        </div>
                                        <div style="display: flex;">
                                            <i class='bx bxs-error-circle sl_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                            <span class="error_sl error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label sl_lb">Mô tả:</label>
                                    <div class="form-wrap">
                                        <div class="form_input">
                                            <input type="text" class="form-input sl" name="email" onkeyup="check('.sl_lb')" value="" style="text-align: right;" placeholder="Nhập vào Mô tả loại tài sản">
                                        </div>
                                        <div style="display: flex;">
                                            <i class='bx bxs-error-circle sl_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                            <span class="error_sl error"></span>
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