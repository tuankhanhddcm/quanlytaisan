    <!-- Modal -->
<div class="modal fade" id="insert_file" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="display: flex;align-items: center;justify-content: space-between">
                <h5 class="modal-title" >Thêm mẫu báo cáo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <form action="/maubaocao/store" method="post" enctype="multipart/form-data" onsubmit="return check_insertFile()">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="" class="form-label title_lb">Tiêu đề:</label>
                                    <div class="form-wrap">
                                        <div class="form_input">
                                            <input type="text" class="form-input title" name="tieude" onkeyup="check('.title_lb')" value="" placeholder="Nhập tiêu đề">
                                        </div>
                                        
                                        <div style="display: flex;">
                                            <i class='bx bxs-error-circle title_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                            <span class="error_title error"></span>
                                        </div>
                                    </div>
                                </div>
                            
                                
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="" class="form-label">Chọn file:</label>
                                    <div class="form-wrap">
                                        <div style="display: flex;">
                                            <label class="btn_upload"><input type="file" hidden name="file_temp" id="file_temp" onchange="readURL(this,'#file_temp')" accept=".docx,.doc" style="display: none" >Chọn file</label>
                                            <span class="text_name_file"></span>
                                        </div>
                                        <div style="display: flex;">
                                            <i class='bx bxs-error-circle file_temp_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                            <span class="error_file_temp error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="">
                                    <label for="" class="form-label mota_lb">Nội dung:</label>
                                    <div class="form-wrap" style="background-color: #ffff;position: relative;padding-bottom: 170px">
                                        <textarea class='mota' name="noidung" onkeyup="check('.mota_lb')" style="display: block; font-size: 14px;padding: 10px;" name=""  cols="60" rows="8"></textarea>
                                        <div style="display: flex;">
                                            <i class='bx bxs-error-circle mota_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                            <span class="error_mota error"></span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                    
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="submit" class="btn_cus btn_luu " onclick="check('.title_lb');check('#file_temp');">Lưu</button>
                    <button type="button" class="btn_cus btn-close"  style="margin-bottom: 5px; font-size: 16px;font-weight: 400" data-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- modal lagre --}}
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Large Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>One fine body&hellip;</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

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
</div>