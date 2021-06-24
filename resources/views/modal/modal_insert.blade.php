


 {{-- modal thêm chi tiết tài sản --}}
 <div class="modal fade" id="Themchitiet" tabindex="-1" role="dialog" aria-labelledby="Thiemchitiet" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thêm chi tiết</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="">
            <div class="row" style="padding-top: 60px">
                <div class="col-6-sm">
                    <div class="form-group">
                        <label for="" class="form-label sl_lb">Nguyên giá:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <input type="text" class="form-input sl" name="nguyengia" onkeyup="check('.sl_lb')" value=""  placeholder="Nhập vào nguyên giá">
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle sl_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                <span class="error_sl error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Tiêu hao:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <div class="select_wrap form_input--items" style="width: 100%;">
                                    <select class=" select select-loaisp form-control" id="loaisp" name ="tieuhao" data-dropup-auto="false" data-size='5' data-live-search="true">
                                        <option value="">--Chọn tiêu hao--</option>
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
                        <label for="" class="form-label">Nhà cung cấp:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <div class="select_wrap form_input--items" style="width: 100%;">
                                    <select class=" select select-loaisp form-control" id="loaisp" name ="ncc" data-dropup-auto="false" data-size='5' data-live-search="true">
                                        <option value="">--Chọn nhà cung cấp--</option>
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
                        <label for="" class="form-label">Đơn vị quản lý:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <div class="select_wrap form_input--items" style="width: 100%;">
                                    <select class=" select select-loaisp form-control" id="loaisp" name ="dvql" data-dropup-auto="false" data-size='5' data-live-search="true">
                                        <option value="">--Chọn đơn vị quản lý--</option>
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
                        <label for="" class="form-label">Người sử dụng:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <div class="select_wrap form_input--items" style="width: 100%;">
                                    <select class=" select select-loaisp form-control" id="loaisp" name ="nguoisd" data-dropup-auto="false" data-size='5' data-live-search="true">
                                        <option value="">--Chọn người sử dụng--</option>
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
                </div>
                <div class="col-6-sm">
                    <div class="form-group">
                        <label for="" class="form-label sl_lb">Ngày mua:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <input type="text" class="form-input sl" name="ngaymua" onkeyup="check('.sl_lb')" value=""  placeholder="Nhập vào ngày mua">
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle sl_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                <span class="error_sl error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label sl_lb">Nơi mua:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <input type="text" class="form-input sl" name="noimua" onkeyup="check('.sl_lb')" value=""  placeholder="Nhập vào nơi mua">
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle sl_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                <span class="error_sl error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label sl_lb">Nơi sản xuất:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <input type="text" class="form-input sl" name="noi_sx" onkeyup="check('.sl_lb')" value=""  placeholder="Nhập vào nơi sản xuất">
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle sl_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                <span class="error_sl error"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="" class="form-label">Trạng thái:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <div class="select_wrap form_input--items" style="width: 100%;">
                                    <select class=" select select-loaisp form-control" id="loaisp" name ="trangthai" data-dropup-auto="false" data-size='5' data-live-search="true">
                                        <option value="">--Chọn trạng thái--</option>
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
                    
                   
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn_cus btn_luu " >Lưu</button>
                <button type="button" class="btn_cus btn-close"  style="margin-bottom: 5px; font-size: 16px;font-weight: 400" data-dismiss="modal">Đóng</button>
            </div>
        </form>
      </div>
    </div>
</div>


