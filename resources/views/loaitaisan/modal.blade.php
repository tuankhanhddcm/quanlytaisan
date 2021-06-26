{{-- thêm loại tài sản --}}
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
            <form action="/loaits" method="POST" onsubmit="if(check('.loaits_lb'))return true; return false;">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="" class="form-label loaits_lb">Tên loại:</label>
                    <div class="form-wrap">
                        <div class="form_input">
                            <input type="text" class="form-input loaits" name="ten_loai" onkeyup="check('.loaits_lb')" value=""  placeholder="Nhập vào tên loại">
                        </div>
                        <div style="display: flex;">
                            <i class='bx bxs-error-circle loaits_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                            <span class="error_loaits error"></span>
                        </div>
                    </div>
                </div>       
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn_cus btn_luu" >Lưu</button>
            <button type="button" class="btn_cus btn-close"  style="margin-bottom: 5px; font-size: 16px;font-weight: 400" data-dismiss="modal">Đóng</button>
        </div>
    </form>
      </div>
    </div>
</div>