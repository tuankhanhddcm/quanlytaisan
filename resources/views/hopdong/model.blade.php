<div class="modal fade" id="create_ncc" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myModalLabel">
    <div class="modal-dialog " id="modal-ad" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Quản lý nhà cung cấp</h4>
          <button type="button" class="close" data-dismiss="modal"  aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body modal_admin--body">
          <div class="tabtable">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs tab-setting" role="tablist" style="background-color: #EFF3F8; padding: 20px 0 4px 15px;">
              <li role="presentation" style="margin-right: 3px;"><a href="#list-ncc" class="active" aria-controls="list-group" role="tab" data-toggle="tab"><i class='bx bx-list-ul' style="font-weight: 600"></i> Danh sách nhà cung cấp</a></li>
              <li role="presentation" style="float: left;margin-bottom:2px;"><a href="#create-ncc" aria-controls="create-group" role="tab" data-toggle="tab"><i class='bx bx-plus-medical'></i> Thêm mới nhà cung cấp</a>
              </li>
            </ul>
  
            <!-- Tab panes -->
            <div class="tab-content" style="padding:10px; border: 1px solid #ddd; border-top: none;">
              <div role="tabpanel" class="tab-pane active" id="list-ncc">
                <div class="prd_group-body">
                  <div class="text-center">
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr style="background-color: whitesmoke;">
                            <th style="font-size: 15px; font-weight: 400;padding: 10px;width: 60px">STT</th>
                          <th class="text-left" style="font-size: 15px; font-weight: 400;padding: 10px;">
                            Tên nhà cung cấp
                          </th>
                          <th class="text-left" style="font-size: 15px; font-weight: 400;padding: 10px;">
                            Số điện thoại
                          </th>
                          <th class="text-left" style="font-size: 15px; font-weight: 400;padding: 10px;">
                            Email
                          </th>
                          <th class="text-left" style="font-size: 15px; font-weight: 400;padding: 10px;">
                            Địa chỉ
                          </th>
                          <th style=" width: 80px;"></th>
                        </tr>
                      </thead>
                      <tbody >
                        @if (isset($nhacungcap))
                          @php
                          $page =$nhacungcap->currentPage();
                          $prepage = $page -1;
                              if($page>1){
                                  $count = $prepage*8+1;
                              }else {
                                  $count = 1;
                              }
                          @endphp
                          @foreach ($nhacungcap as $item)
                          <tr >
                            <td style="font-size: 14px">{{$count}}</td>
                            <td class="text_td item_" ><span>{{$item->ten_ncc}}</span></td>
                            <td class="text_td item_" ><span>{{$item->sdt}}</span></td>
                            <td class="text_td item_" ><span>{{$item->email}}</span></td>
                            <td class="text_td item_" ><span>{{$item->diachi}}</span></td>
                            <td style="display: flex;align-items: center;justify-content: center;padding-top: 10px;border-right: none;">
                              <button type="button" class=" btn-update loaisp_update" title="Sửa" data-loai=""><i class="fa fa-pencil-square-o"></i></button>
                              <!-- <button type="button" class=" btn-deletd" title="Xóa"><i class="bx bxs-trash"></i></button> -->
                            </td>
                          </tr>
                          @php
                              $count++;
                          @endphp
                          @endforeach
                        @endif  
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
  
              <!-- Tab Function -->
              <div role="tabpanel" class="tab-pane" id="create-ncc">
                <div class="row form-horizontal">
                  <div class="col-md-12">
                    <div class="form-group" style="margin-top: 10px">
                      <label for="" class="form-label ten_ncc_lb">Tên nhà cung cấp:</label>
                      <div class="form-wrap">
                          <div class="form_input">
                              <input type="text" class="form-input ten_ncc" name="ten_ncc" onkeyup="check('.ten_ncc_lb')" value="" placeholder="Nhập tên nhà cung cấp">
                          </div>
                          
                          <div style="display: flex;">
                              <i class='bx bxs-error-circle ten_ncc_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                              <span class="error_ten_ncc error"></span>
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="form-label sdt_ncc_lb">Số điện thoại:</label>
                      <div class="form-wrap">
                          <div class="form_input">
                              <input type="text" class="form-input sdt_ncc" name="sdt_ncc" onkeyup="check('.sdt_ncc_lb')" value="" placeholder="Nhập số điện thoại">
                          </div>
                          
                          <div style="display: flex;">
                              <i class='bx bxs-error-circle sdt_ncc_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                              <span class="error_sdt_ncc error"></span>
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="form-label email_ncc_lb">Email:</label>
                      <div class="form-wrap">
                          <div class="form_input">
                              <input type="text" class="form-input email_ncc" name="email_ncc" onkeyup="check('.email_ncc_lb')" value="" placeholder="Nhập email">
                          </div>
                          
                          <div style="display: flex;">
                              <i class='bx bxs-error-circle email_ncc_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                              <span class="error_email_ncc error"></span>
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="form-label diachi_ncc_lb">Địa chỉ:</label>
                      <div class="form-wrap">
                          <div class="form_input">
                              <input type="text" class="form-input diachi_ncc" name="diachi_ncc" onkeyup="check('.diachi_ncc_lb')" value="" placeholder="Nhập địa chỉ">
                          </div>
                          
                          <div style="display: flex;">
                              <i class='bx bxs-error-circle diachi_ncc_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                              <span class="error_diachi_ncc error"></span>
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-12" style="display: flex; align-items: center; justify-content: flex-end; padding-top: 50px;">
                        <button type="button" class="btn_cus btn-save" onclick="insert_ncc();"><i class='bx bx-check' ></i> Lưu
                        </button>
                        <button type="button" class="btn_cus btn-conti ">
                            <i class='bx bx-save'></i>
                          Lưu và tiếp tục
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn_cus btn-default btn-sm btn-close"  data-dismiss="modal"><i class='bx bx-undo' ></i> Đóng
          </button>
        </div>
      </div>
    </div>
  </div>