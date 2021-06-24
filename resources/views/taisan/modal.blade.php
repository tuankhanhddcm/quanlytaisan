{{-- modal insert taisan --}}
<div class="modal fade" id="insert_ts">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thêm tài sản</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <form action="/taisan" method="POST" onsubmit="check('#loaits'); if(check('.tents_lb')=='true'&& check('#loaits')=='true')return true; return false;">
          <div class="modal-body">
             
                  {{ csrf_field() }}
                <div class="form-group">
                      <label for="" class="form-label tents_lb">Tên tài sản:</label>
                      <div class="form-wrap">
                          <div class="form_input">
                              <input type="text" class="form-input tents" name="tents" onkeyup="check('.tents_lb')" value=""  placeholder="Nhập vào tên tên tài sản">
                          </div>
                          <div style="display: flex;">
                              <i class='bx bxs-error-circle tents_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                              <span class="error_tents error"></span>
                          </div>
                      </div>
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Thuộc loại:</label>
                    <div class="form-wrap">
                        <div class="form_input ">
                            <div class="select_wrap form_input--items" style="width: 100%;">
                                <select class=" select loaits-select form-control" id="loaits" name ="loaits" data-dropup-auto="false" data-size='5' data-live-search="true">
                                    <option value="">--Chọn loại tài sản--</option>
                                    @foreach ($loaits as $val)
                                        <option value="{{$val->ma_loai}}">{{$val->ten_loai}}</option>
                                    @endforeach
                                </select>
                                {{-- <button class=" btn_plus" onclick="phan_trang_loai(1);" type="button" data-toggle="modal" data-target="#themlts"><i class='bx bx-plus'></i></button> --}}
                            </div>
                        </div>
                        <div style="display: flex;">
                            <i class='bx bxs-error-circle loaits_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                            <span class="error_loaits error"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group" style="margin-top: 50px">
                      <label for="" class="form-label mota_loai_lb">Mô tả (nếu có):</label>
                      <div class="form-wrap" style="background-color: #ffff;position: relative;padding-bottom: 170px">
                          <textarea class='mota mota_loai' name="mota"  style="display: block; font-size: 14px;padding: 10px;" name=""  cols="40" rows="8"></textarea>
                          <div style="display: flex;">
                              <i class='bx bxs-error-circle mota_loai_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                              <span class="error_mota_loai error"></span>
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
    <!-- /.modal-dialog -->
  </div>

 
</div>