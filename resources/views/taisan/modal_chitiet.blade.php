{{-- modal thêm chi tiết  --}}
<div class="modal fade" id="themchitiet" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thêm mới chi tiết tài sản</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <form action="/chitiettaisan" method="POST" onsubmit=" if(check('.tents_lb')&&check('.so_serial_lb')&&check('#trangthai'))return true; return false;">
          <div class="modal-body">
                  {{ csrf_field() }}
                {{-- <input type="hidden" class="page_chitiet" name="page" value=""> --}}
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
                                    {{-- <option value="">--Chọn loại tài sản--</option> --}}
                                    @if (isset($taisan))
                                        <option value="{{$taisan->ma_ts}}" selected>{{$taisan->ten_ts}}</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div style="display: flex;">
                            <i class='bx bxs-error-circle loaits_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                            <span class="error_loaits error"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="form-label so_serial_lb">Số serial:</label>
                    <div class="form-wrap">
                        <div class="form_input">
                            <input type="text" class="form-input so_serial" name="so_serial" onkeyup="check('.so_serial_lb')" value=""  placeholder="Nhập vào số serial">
                        </div>
                        <div style="display: flex;">
                            <i class='bx bxs-error-circle so_serial_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                            <span class="error_so_serial error"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                  <label for="" class="form-label">Trạng thái:</label>
                  <div class="form-wrap">
                        <div class="form_input ">
                            <div class="select_wrap form_input--items" style="width: 100%;">
                                <select class=" select trangthai-select form-control"  id="trangthai" name ="trangthai" data-dropup-auto="false" data-size='5' data-live-search="true">
                                    <option value="">--Chọn trạng thái--</option>
                                    <option value="0">Chưa sử dụng</option>
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
                    <label for="" class="form-label">Phòng ban:</label>
                    <div class="form-wrap">
                        <div class="form_input ">
                            <div class="select_wrap form_input--items" style="width: 100%;">
                                <select class=" select phongban-select form-control"  id="phongban" name ="phongban" data-dropup-auto="false" data-size='5' data-live-search="true">
                                    <option value="">--Chọn phòng ban--</option>
                                    @foreach ($phongban as $item)
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
              <button type="submit" class="btn_cus btn_luu" onclick="check('.so_serial_lb');check('#trangthai');check('#nhanvien');" >Lưu</button>
              <button type="button" class="btn_cus btn-close"  style="margin-bottom: 5px; font-size: 16px;font-weight: 400" data-dismiss="modal">Đóng</button>
          </div>
          <input type="hidden" name="taisan" value="{{isset($taisan)?$taisan->ma_ts:''}}">
    </form>
        </div>
      </div>
</div>
{{-- modal sửa chi tiết  --}}
<div class="modal fade" id="suachitiet" data-backdata-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Sửa chi tiết tài sản</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <form action="{{isset($chitiet_up)?route('chitiettaisan.update',$chitiet_up->ma_chitiet):''}}" method="POST" onsubmit="if(check('.tents_up_lb')&&check('.so_serial_up_lb') && check('#loaits_up'))return true; return false;">
          <div class="modal-body">
                  {{ csrf_field() }}
            <input type="hidden" name="detail_ts" value="{{isset($taisan)?$taisan->ma_ts:''}}">
            <input type="hidden" class="page_chitiet" name="page" value="">
              <div class="form-group">
                      <label for="" class="form-label tents_up_lb">Tên chi tiết:</label>
                      <div class="form-wrap">
                          <div class="form_input">
                              <input type="text" class="form-input tents_up" name="tents_up" onkeyup="check('.tents_up_lb')" value="{{isset($chitiet_up)?$chitiet_up->ten_chitiet:''}}"  placeholder="Nhập vào tên chi tiết">
                          </div>
                          <div style="display: flex;">
                              <i class='bx bxs-error-circle tents_up_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                              <span class="error_tents_up error"></span>
                          </div>
                      </div>
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Thuộc tài sản:</label>
                    <div class="form-wrap">
                        <div class="form_input ">
                            <div class="select_wrap form_input--items" style="width: 100%;">
                                <select class=" select loaits-select form-control"  id="loaits_up" name ="loaits_up" data-dropup-auto="false" data-size='5' data-live-search="true">
                                    {{-- <option value="">--Chọn tài sản--</option> --}}
                                    @if (isset($taisan))
                                        <option value="{{$taisan->ma_ts}}" selected>{{$taisan->ten_ts}}</option>
                                    @endif
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
                    <label for="" class="form-label so_serial_up_lb">Số serial:</label>
                    <div class="form-wrap">
                        <div class="form_input">
                            <input type="text" class="form-input so_serial_up" name="so_serial_up" onkeyup="check('.so-serial_lb')" value="{{isset($chitiet_up)?$chitiet_up->so_serial:''}}"  placeholder="Nhập vào số serial">
                        </div>
                        <div style="display: flex;">
                            <i class='bx bxs-error-circle so_serial_up_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                            <span class="error_so_serial_up error"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                  <label for="" class="form-label">Trạng thái:</label>
                  <div class="form-wrap">
                        <div class="form_input ">
                            <div class="select_wrap form_input--items" style="width: 100%;">
                                <select class=" select trangthai-select form-control"  id="trangthai_up" name ="trangthai_up" data-dropup-auto="false" data-size='5' data-live-search="true">
                                    <option value="">--Chọn loại trạng thái--</option>
                                    @if (isset($chitiet_up))
                                        @switch($chitiet_up->trangthai)
                                            @case(0)
                                            <option value="0" selected>Chưa sử dụng</option>
                                            <option value="1" >Đang sử dụng</option>
                                            <option value="2" >Hư hỏng</option>
                                                @break
                                            @case(1)
                                            <option value="0" >Chưa sử dụng</option>
                                            <option value="1" selected >Đang sử dụng</option>
                                            <option value="2" >Hư hỏng</option>
                                                @break
                                            @case(1)
                                            <option value="0" >Chưa sử dụng</option>
                                            <option value="1"  >Đang sử dụng</option>
                                            <option value="2" selected >Hư hỏng</option>
                                                @break
                                        @endswitch
                                    @endif
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
                    <label for="" class="form-label">Phòng ban:</label>
                    <div class="form-wrap">
                        <div class="form_input ">
                            <div class="select_wrap form_input--items" style="width: 100%;">
                                <select class=" select phongban-select form-control"  id="phongban_up" name ="phongban_up" data-dropup-auto="false" data-size='5' data-live-search="true">
                                    <option value="">--Chọn phòng ban--</option>
                                    @foreach ($phongban as $item)
                                    @if (isset($chitiet_up) && $chitiet_up->ma_phong==$item->ma_phong)
                                        <option value="{{$item->ma_phong}}" selected>{{$item->ten_phong}}</option>
                                    @else
                                        <option value="{{$item->ma_phong}}">{{$item->ten_phong}}</option>
                                    @endif
                                    
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
              <div class="form-group">
                <label for="" class="form-label">Nhân viên sử dụng:</label>
                <div class="form-wrap">
                    <div class="form_input ">
                        <div class="select_wrap form_input--items" style="width: 100%;">
                            <select class=" select nhanvien-select form-control"  id="nhanvien_up" name ="nhanvien_up" data-dropup-auto="false" data-size='5' data-live-search="true">
                                <option value="">--Chọn nhân viên--</option>
                                @foreach ($nhanvien as $item)
                                    @if (isset($chitiet_up) && $chitiet_up->ma_nv==$item->ma_nv)
                                        <option value="{{$item->ma_nv}}" selected>{{$item->ten_nv}}</option>
                                    @else
                                        <option value="{{$item->ma_nv}}">{{$item->ten_nv}}</option>
                                    @endif
                                    
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