<div class="modal fade" id="update_ncc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Sửa nhà cung cấp</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/nhacungcap/update/{{(isset($NCC)?$NCC->ma_ncc:'')}}" method="POST" >
            <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="" class="form-label ten_ncc_lb">Tên nhà cung cấp:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <input type="text" class="form-input ten_ncc" name="ten_ncc" value="{{isset($NCC)?$NCC->ten_ncc:''}}"  placeholder="Nhập vào tên nhà cung cấp">
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle ten_ncc_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_ten_ncc error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label sdt_lb">Số điện thoại:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <input type="text" class="form-input sdt" name="sdt" onkeyup="check('.sdt_lb')" value="{{(isset($NCC))?$NCC->sdt:''}}"  placeholder="Nhập vào số điện thoại">
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
                                <input type="text" class="form-input email" name="email" onkeyup="check('.email_lb')" value="{{(isset($NCC))?$NCC->email:''}}"  placeholder="Nhập vào tên loại">
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle email_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_email error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label dia_chi_lb">Địa chỉ:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <input type="text" class="form-input dia_chi" name="dia_chi" onkeyup="check('.dia_chi_lb')" value="{{(isset($NCC))?$NCC->diachi:''}}"  placeholder="Nhập vào tên loại">
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle dia_chi_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                <span class="error_dia_chi error"></span>
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