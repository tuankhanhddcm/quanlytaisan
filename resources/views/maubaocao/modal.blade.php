    <!-- Modal thêm mẫu báo cáo -->
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
                                        <label for="" class="form-label">Chọn file word:</label>
                                        <div class="form-wrap">
                                            <div style="display: flex;">
                                                <label class="btn_upload"><input type="file" hidden name="file_temp" id="file_temp" onchange="readURL(this,'#file_temp','word')" accept=".docx,.doc" style="display: none" >Chọn file</label>
                                                <div style="width: 400px">
                                                    <span class="text_name_file"></span>
                                                </div>
                                            </div>
                                            <div style="display: flex;padding-bottom: 20px">
                                                <i class='bx bxs-error-circle file_temp_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                                    <span class="error_file_temp error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-top: 50px" >
                                        <label for="" class="form-label">Chọn file pdf:</label>
                                        <div class="form-wrap">
                                            <div style="display: flex;">
                                                <label class="btn_upload"><input type="file" hidden name="file_pdf" id="file_pdf" onchange="readURL(this,'#file_pdf','pdf')" accept=".pdf" style="display: none" >Chọn file</label>
                                                <div style="width: 400px">
                                                    <span class="text_name_pdf"></span>
                                                </div>
                                                
                                            </div>
                                            <div style="display: flex; padding-bottom: 20px">
                                                <i class='bx bxs-error-circle file_pdf_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                                <span class="error_file_pdf error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-top: 50px">
                                        <label for="" class="form-label mota_lb">Nội dung:</label>
                                        <div class="form-wrap" style="background-color: #ffff;position: relative;padding-bottom: 170px">
                                            <textarea class='mota' name="noidung" onkeyup="check('.mota_lb')" style="display: block; font-size: 14px;padding: 10px;" name=""  cols="40" rows="8"></textarea>
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
