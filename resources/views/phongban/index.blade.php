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
                        <div class="admin_search--input  col-md-4">
                            <input type="text" value="" class="search_input" id='search' placeholder="Nhập mã phòng ban hoặc tên phòng ban">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 ">
                    <table class="table table_sp ">
                        <thead class="heading-table">
                            <tr>
                                <th style="border-left: 1px solid rgba(0,0,0,.1); width:10%;">STT</th>
                                <th style="width: 15%;">Mã Phòng</th>
                                <th style="width: 20%;">Tên Phòng</th>
                                <th style="width: 25%;">Mô Tả</th>
                                <th style="width: 15%">Hoạt động</th>
                            </tr>
                        </thead>
                        <tbody id="list_product">
                            @foreach ($phongban as $key => $item)
                                <tr>
                                    <td style="border: 1px solid rgba(0,0,0,.1)">{{$key+1}}</td>
                                    <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->ma_phong}}</td>
                                    <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->ten_phong}}</td>
                                    <td style="border: 1px solid rgba(0,0,0,.1)"><?= ($item->mota ==null)?'Không có mô tả':$item->mota?></td> 
                                    <td >
                                        <button class="btn_suaphong" data-id="{{$item->ma_phong}}" style="width:40px; height:40px; margin-left: 10%; border:none; background-color: transparent;" ><i class='bx bx-edit' style="font-size: 30px; color:#5bc0de;"></i></button>
                                        <button style="width:40px; height:40px; margin-left: 10%; border:none; background-color: transparent;" ><i class='bx bxs-x-square' style="font-size: 30px; color:#FF3300;"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            

            <div id="modal_phongban">
                
            </div>
        </div>
    </div>
    <div class="modal fade" id="them_phongban" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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