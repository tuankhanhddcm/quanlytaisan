{{-- modal insert taisan --}}
<div class="modal fade" id="themTSCĐ" data-backdrop="static">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thêm loại tài sản cố định</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <form action="/loaiTSCD" method="POST" onsubmit="check('#loaits'); if(check('.tents_lb')&&check('.tgSD_lb')&& check('#loaits')&&check('.tile_HM_lb'))return true; return false;">
        <div class="modal-body">
                {{ csrf_field() }}
            <div class="form-group">
                    <label for="" class="form-label tents_lb">Tên loại:</label>
                    <div class="form-wrap">
                        <div class="form_input">
                            <input type="text" class="form-input tents" name="tents" onkeyup="check('.tents_lb')" value=""  placeholder="Nhập vào tên loại">
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
                                  @foreach ($loai as $val)
                                      <option value="{{$val->id_loai}}">{{$val->ten_loai}}</option>
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
              <div class="col-sm-12" style="border: 1px solid rgba(0,0,0,0.1);margin-bottom: 10px">
                <span class="text_line">Chi tiết sử dụng</span>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="" class="form-label tgSD_lb">Thời gian sử dụng (năm):</label>
                            <div class="form-wrap">
                                <div class="form_input">
                                    <input type="text" class="form-input tgSD soluong" name="tgSD" onkeyup="check('.tgSD_lb')" value="" style="text-align: right" placeholder="0">
                                </div>
                                <div style="display: flex;">
                                    <i class='bx bxs-error-circle tgSD_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                    <span class="error_tgSD error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label tile_HM_lb">Tỉ lệ HM (% năm):</label>
                            <div class="form-wrap">
                                <div class="form_input">
                                    <input type="text" class="form-input tile_HM  " pattern="[+-]?([0-9]*[.])?[0-9]+"  name='tile_HM' onkeyup="check('.tile_HM_lb')" value="" style="text-align: right" placeholder="0.00">
                                </div>
                                <div style="display: flex;">
                                    <i class='bx bxs-error-circle tile_HM_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                    <span class="error_tile_HM error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label conlai_lb">TK nguyên giá:</label>
                            <div class="form-wrap">
                                <div class="form_input">
                                    <input type="text" class="form-input conlai" disabled value="" style="text-align: right" placeholder="0">
                                </div>
                                <div style="display: flex;">
                                    <i class='bx bxs-error-circle conlai_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                    <span class="error_conlai error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label conlai_lb">TK hao mòn:</label>
                            <div class="form-wrap">
                                <div class="form_input">
                                    <input type="text" class="form-input conlai" disabled value="" style="text-align: right" placeholder="0">
                                </div>
                                <div style="display: flex;">
                                    <i class='bx bxs-error-circle conlai_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                    <span class="error_conlai error"></span>
                                </div>
                            </div>
                        </div>
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


</div>

{{-- modal update --}}
<div class="modal fade" id="updateTSCD">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Sửa loại tài sản cố định</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <form action="/loaiTSCD/update/{{(isset($TSCD))?$TSCD->ma_loai:''}}" class="form_put" method="POST" onsubmit="check('#loaits_up'); if(check('.tents__up_lb')&&check('.tgSD__up_lb')&&check('.tile_HM_up_lb'))return true; return false;">
            
            <div class="modal-body">
                  {{ csrf_field() }}
              <div class="form-group">
                      <label for="" class="form-label tents_up_lb">Tên loại:</label>
                      <div class="form-wrap">
                          <div class="form_input">
                              <input type="text" class="form-input tents_up" name="tents_up" onkeyup="check('.tents_up_lb')" value="{{(isset($TSCD))?$TSCD->ten_loai:''}}"  placeholder="Nhập vào tên loại">
                          </div>
                          <div style="display: flex;">
                              <i class='bx bxs-error-circle tents_up_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                              <span class="error_tents_up error"></span>
                          </div>
                      </div>
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Thuộc loại:</label>
                    <div class="form-wrap">
                        <div class="form_input ">
                            <div class="select_wrap form_input--items" style="width: 100%;">
                                <select class=" select loaits-select form-control" id="loaits_up" name ="loaits_up" data-dropup-auto="false" data-size='5' data-live-search="true">
                                    <option value="">--Chọn loại tài sản--</option>
                                    @foreach ($loai as $val)
                                      @if (isset($TSCD) && $TSCD->id_loai==$val->id_loai)
                                      <option value="{{$val->id_loai}}" selected>{{$val->ten_loai}}</option>
                                      @else
                                      <option value="{{$val->id_loai}}">{{$val->ten_loai}}</option>
                                      @endif
                                        
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
                <div class="col-sm-12" style="border: 1px solid rgba(0,0,0,0.1);margin-bottom: 10px">
                  <span class="text_line">Chi tiết sử dụng</span>
                  <div class="row">
                      <div class="col-sm-12">
                          <input type="hidden" name="ma_tieuhao" value="{{(isset($TSCD))?$TSCD->ma_tieuhao:''}}">
                          <div class="form-group">
                              <label for="" class="form-label tgSD_up_lb">Thời gian sử dụng (năm):</label>
                              <div class="form-wrap">
                                  <div class="form_input">
                                      <input type="text" class="form-input tgSD_up soluong" name="tgSD_up" onkeyup="check('.tgSD_up_lb')" value="{{(isset($TSCD))?$TSCD->thoi_gian_sd:''}}" style="text-align: right" placeholder="0">
                                  </div>
                                  <div style="display: flex;">
                                      <i class='bx bxs-error-circle tgSD_up_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                      <span class="error_tgSD_up error"></span>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="" class="form-label tile_HM_up_lb">Tỉ lệ HM (% năm):</label>
                              <div class="form-wrap">
                                  <div class="form_input">
                                      <input type="text" class="form-input tile_HM_up " pattern="[+-]?([0-9]*[.])?[0-9]+"  name='tile_HM_up' onkeyup="check('.tile_HM_up_lb')" value="{{(isset($TSCD))?$TSCD->muc_tieuhao:''}}" style="text-align: right" placeholder="0.00">
                                  </div>
                                  <div style="display: flex;">
                                      <i class='bx bxs-error-circle tile_HM_up_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                      <span class="error_tile_HM_up error"></span>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="" class="form-label conlai_lb">TK nguyên giá:</label>
                              <div class="form-wrap">
                                  <div class="form_input">
                                      <input type="text" class="form-input conlai" disabled value="" style="text-align: right" placeholder="0">
                                  </div>
                                  <div style="display: flex;">
                                      <i class='bx bxs-error-circle conlai_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                      <span class="error_conlai error"></span>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="" class="form-label conlai_lb">TK hao mòn:</label>
                              <div class="form-wrap">
                                  <div class="form_input">
                                      <input type="text" class="form-input conlai" disabled value="" style="text-align: right" placeholder="0">
                                  </div>
                                  <div style="display: flex;">
                                      <i class='bx bxs-error-circle conlai_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                                      <span class="error_conlai error"></span>
                                  </div>
                              </div>
                          </div>
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
  
  </div>