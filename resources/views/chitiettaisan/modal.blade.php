{{-- modal thêm chi tiết  --}}
<div class="modal fade" id="themchitiet">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thêm mới chi tiết tài sản</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <form action="" method="POST" onsubmit="check('#loaits'); if(check('.tents_lb')&&check('.tgSD_lb')&& check('#loaits')&&check('.tile_HM_lb'))return true; return false;">
          <div class="modal-body">
                  {{ csrf_field() }}
              <div class="form-group">
                      <label for="" class="form-label tents_lb">Tên chi tiết:</label>
                      <div class="form-wrap">
                          <div class="form_input">
                              <input type="text" class="form-input tents" name="tents" onkeyup="check('.tents_lb')" value=""  placeholder="Nhập vào tên chi tiết">
                          </div>
                          <div style="display: flex;">
                              <i class='bx bxs-error-circle tents_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                              <span class="error_tents error"></span>
                          </div>
                      </div>
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Thuộc tài sản:</label>
                    <div class="form-wrap">
                        <div class="form_input ">
                            <div class="select_wrap form_input--items" style="width: 100%;">
                                <select class=" select loaits-select form-control"  id="loaits" name ="loaits" data-dropup-auto="false" data-size='5' data-live-search="true">
                                    <option value="">--Chọn tài sản--</option>
                                    @foreach ($taisan as $item)
                                    <option value="{{$item->ma_ts}}">{{$item->ten_ts}}</option>
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
                <div class="form-group">
                    <label for="" class="form-label so-serial_lb">Số serial:</label>
                    <div class="form-wrap">
                        <div class="form_input">
                            <input type="text" class="form-input so-serial" name="so-serial" onkeyup="check('.so-serial_lb')" value=""  placeholder="Nhập vào số serial">
                        </div>
                        <div style="display: flex;">
                            <i class='bx bxs-error-circle so-serial_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                            <span class="error_so-serial error"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                  <label for="" class="form-label">Trạng thái:</label>
                  <div class="form-wrap">
                        <div class="form_input ">
                            <div class="select_wrap form_input--items" style="width: 100%;">
                                <select class=" select trangthai-select form-control"  id="trang_thai" name ="trang_thai" data-dropup-auto="false" data-size='5' data-live-search="true">
                                    <option value="">--Chọn loại tài sản--</option>
                                    <option value="0">Không sử dụng</option>
                                    <option value="1">Đang sử dụng</option>
                                    <option value="2">Hư hỏng</option>
                                </select>
                            </div>
                        </div>
                        <div style="display: flex;">
                            <i class='bx bxs-error-circle trangthai_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                            <span class="error_trangthai error"></span>
                        </div>
                    </div>
                </div>
              <div class="form-group">
                <label for="" class="form-label">Nhân viên sử dụng:</label>
                <div class="form-wrap">
                    <div class="form_input ">
                        <div class="select_wrap form_input--items" style="width: 100%;">
                            <select class=" select nhanvien-select form-control"  id="nhanvien" name ="nhanvien" data-dropup-auto="false" data-size='5' data-live-search="true">
                                <option value="">--Chọn nhân viên--</option>
                                @foreach ($nhanvien as $item)
                                    <option value="{{$item->ma_nv}}">{{$item->ten_nv}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div style="display: flex;">
                        <i class='bx bxs-error-circle nhanvien_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                        <span class="error_nhanvien error"></span>
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