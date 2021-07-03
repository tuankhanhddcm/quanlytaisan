<div class="modal fade" id="update_nhanvien" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Sửa Nhân Viên</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/nhanvien/update/{{$nv->ma_nv}}" method="POST" >
            <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="" class="form-label ten_nv_lb">Tên nhân viên:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <input type="text" class="form-input ten_nv" name="ten_nv" value="{{$nv->ten_nv}}"  placeholder="Nhập vào tên phòng">
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle ten_nv_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_ten_nv error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label sdt_lb">Số điện thoại:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <input type="text" class="form-input sdt" name="sdt" onkeyup="check('.sdt_lb')" value="{{$nv->sdt}}"  placeholder="Nhập vào số điện thoại">
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle sdt_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_sdt error"></span>
                            </div>
                        </div>      
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label email_lb">Email:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <input type="text" class="form-input email" name="email" onkeyup="check('.email_lb')" value="{{$nv->email}}"  placeholder="Nhập vào email">
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle email_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_email error"></span>
                            </div>
                        </div>      
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label diachi_lb">Địa chỉ:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <input type="text" class="form-input diachi" name="diachi" onkeyup="check('.diachi_lb')" value="{{$nv->diachi}}"  placeholder="Nhập vào địa chỉ">
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle diachi_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_diachi error"></span>
                            </div>
                        </div>      
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Phòng ban:</label>
                        <div class="form-wrap">
                            <div class="form_input ">
                                <div class="select_wrap form_input--items" style="width: 100%;">
                                    <select class=" select phongban-select form-control"  id="phongban" name ="ma_phong" data-dropup-auto="false" data-size='5' data-live-search="true">
                                        <option value="{{$nv->ma_phong}}">{{$nv->ten_phong}}</option>
                                            @foreach ($pb as $item)
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
                            <div class="form_input ">
                                <div class="select_wrap form_input--items" style="width: 100%;">
                                    <select class=" select chucvu-select form-control"  id="ma_chucvu" name ="ma_chucvu" data-dropup-auto="false" data-size='5' data-live-search="true">
                                        <option value="{{$nv->ma_chucvu}}">{{$nv->ten_chucvu}}</option>
                                        @foreach ($cv as $item)
                                            <option value="{{$item->ma_chucvu}}">{{$item->ten_chucvu}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle ma_chucvu_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_ma_chucvu error"></span>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn_cus btn_luu" >Sửa</button>
                        <button type="button" class="btn_cus btn-close"  style="margin-bottom: 5px; font-size: 16px;font-weight: 400" data-dismiss="modal">Đóng</button>
                    </div>
        </form>
    </div>
</div>