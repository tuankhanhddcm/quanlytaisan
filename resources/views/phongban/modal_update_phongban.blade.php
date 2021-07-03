<div class="modal fade" id="update_phongban" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Sửa Phòng Ban</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/phongban/update/{{(isset($phong)?$phong->ma_phong:'')}}" method="POST"  onsubmit="return check('.ten_phong_up_lb')">
            <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="" class="form-label ten_phong_up_lb">Tên Phòng:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <input type="text" class="form-input ten_phong_up" name="ten_phong" onkeyup="check('.ten_phong_up_lb')" value="{{isset($phong)?$phong->ten_phong:''}}"  placeholder="Nhập vào tên phòng">
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle ten_phong_up_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_ten_phong_up error"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="" class="form-label mota_lb">Mô Tả:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <input type="text" class="form-input mota" name="mota"  value="{{(isset($phong))?$phong->mota:''}}"  placeholder="Nhập vào mô tả">
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