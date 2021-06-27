@extends('home')
@section('detail_taisan')
<div class="col-sm-12" style=" background-color: white;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Thông tin tài sản</h3>
            <div class="form-btn">
                <button class="btn_cus btn-back" onclick="location.href='{{route('taisan.index')}}'"><i class='bx bx-left-arrow-alt'></i> Trở về</button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12" style="border: 1px solid rgba(0,0,0,0.1);margin-bottom: 10px">
                <span class="text_line">Thông tin chung</span>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Tên tài sản:</label>
                            <div class="col-sm-8">{{isset($taisan)?$taisan->ten_ts:''}}</div>
                        </div>  
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Loại TSCĐ:</label>
                            <div class="col-sm-8">{{isset($taisan)?$taisan->ten_loai:''}}</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Số lượng:</label>
                            <div class="col-sm-8">{{isset($taisan)?$taisan->soluong:''}}</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Nguyên giá:</label>
                            <div class="col-sm-8">{{isset($taisan)?$taisan->nguyengia:''}}</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Phòng ban:</label>
                            <div class="col-sm-8">{{isset($taisan)?$taisan->ten_phong:''}}</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Năm sản xuất:</label>
                            <div class="col-sm-8">{{isset($taisan)?$taisan->nam_sx:''}}</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Nước sản xuất:</label>
                            <div class="col-sm-8">{{isset($taisan)?$taisan->nuoc_sx:''}}</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Nhà cung cấp:</label>
                            <div class="col-sm-8">{{isset($taisan)?$taisan->ten_ncc:''}}</div>
                        </div>
                    </div>

              </div>
            
        </div>
        <div class="col-sm-12 ">
            <div style=" display: flex;align-items: center;">
                <div style="font-size: 28px;color:#333;">Dach sách chi tiết tài sản</div>
                <div style="margin-left: 20px"><button type="button" data-toggle="modal" data-target="#themchitiet" class="btn_cus btn-addsp"><i class='bx bx-plus' style="font-weight: 600; "></i>
                    Thêm mới chi tiết</button>
                </div>
            </div>
            
            <div id="list_taisan">
                <table class="table table_sp ">
                    <thead class="heading-table">
                        <th style="border-left: 1px solid rgba(0,0,0,.1);width: 50px">STT</th>
                        <th >Mã chi tiết</th>
                        <th >Tên chi tiết</th>
                        <th >Tài sản</th>
                        <th >Số serial</th>
                        <th >Trạng thái</th>
                        <th>Nhân viên sử dụng</th>
                        <th style="border-right: none;"></th>
                    </thead>
                    <tbody >
                        @php
                            $page =$chitiettaisan->currentPage();
                            $prepage = $page -1;
                                if($page>1){
                                    $count = $prepage*8+1;
                                }else {
                                    $count = 1;
                                }
                            @endphp
                        @foreach ($chitiettaisan as $k=>$item)
                            <tr class="body-table" >
                                <td>{{$count}}</td>
                                <td>{{$item->ma_chitiet}}</td>
                                <td>{{$item->ten_chitiet}}</td>
                                <td>{{$item->ten_ts}}</td>
                                <td>{{$item->so_serial}}</td>
                                <td>{{$item->trangthai}}</td>
                                <td>{{$item->ma_nv}}</td>
                                <td style="border-right: none;">
                                    <button style="width:40px; height:40px; margin-left: 10%; border:none; background-color: transparent;" title="Sửa loại" ><i class='bx bx-edit' style="font-size: 30px; color:#5bc0de;"></i></button>
                                    <button style="width:40px; height:40px; margin-left: 10%; border:none; background-color: transparent;" title="Xóa loại" ><i class='bx bxs-trash' style="font-size: 30px; color:#FF3300;"></i></button>
                                </td>
                            </tr>
                            @php
                                $count++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
                <div style="position: absolute; right: 0;">
                    {{$chitiettaisan->onEachSide(2)->links()}}
                </div>
            </div>
        </div>
    </div>
</div>  
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
                                <select class=" select loaits-select form-control" disabled id="loaits" name ="loaits" data-dropup-auto="false" data-size='5' data-live-search="true">
                                    {{-- <option value="">--Chọn loại tài sản--</option> --}}
                                    
                                    <option value="{{$taisan->ma_ts}}" selected>{{$taisan->ten_ts}}</option>
                                    
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
                                <select class=" select loaits-select form-control"  id="trang_thai" name ="trang_thai" data-dropup-auto="false" data-size='5' data-live-search="true">
                                    <option value="">--Chọn loại tài sản--</option>
                                    <option value="0">Không sử dụng</option>
                                    <option value="1">Đang sử dụng</option>
                                    <option value="2">Hư hỏng</option>
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
                <label for="" class="form-label">Nhân viên sử dụng:</label>
                <div class="form-wrap">
                    <div class="form_input ">
                        <div class="select_wrap form_input--items" style="width: 100%;">
                            <select class=" select loaits-select form-control"  id="loaits" name ="loaits" data-dropup-auto="false" data-size='5' data-live-search="true">
                                <option value="">--Chọn nhân viên--</option>
                                @foreach ($nhanvien as $item)
                                    <option value="{{$item->ma_nv}}">{{$item->ten_nv}}</option>
                                @endforeach
                            </select>
                        </div>
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
@endsection
