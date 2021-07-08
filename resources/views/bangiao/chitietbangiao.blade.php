@extends('home')
@section('chitiet')
<div class="col-sm-12" style=" background-color: white;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Chi tiết phiếu bàn giao</h3>
            <div class="form-btn">
                <button class="btn_cus btn-back" onclick="location.href='{{route('bangiao.index')}}'"><i class='bx bx-left-arrow-alt'></i> Trở về</button>
            </div>
        </div>
        <div class="row">
            @php
                $nv_giao='';
                $phonggiao ='';
                $nv_nhan ='';
                $phongnhan ='';
                foreach ($nhanvien as $val) {
                    if($bangiao->nguoi_giao == $val->ma_nv){
                        $nv_giao = $val->ten_nv;
                        $phonggiao = $val->ten_phong;
                    }
                    if($bangiao->nguoi_nhan == $val->ma_nv){
                        $nv_nhan = $val->ten_nv;
                        $phongnhan = $val->ten_phong;
                    }
                }
                
            @endphp
            <div class="col-sm-12" style="border: 1px solid rgba(0,0,0,0.1);margin-bottom: 10px">
                <span class="text_line">Thông tin phiếu bàn giao</span>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Phòng bàn giao:</label>
                            <div class="col-sm-8">{{$phonggiao}}</div>
                        </div>  
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Phòng nhận</label>
                            <div class="col-sm-8">{{$phongnhan}}</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Đại diện bàn giao:</label>
                            <div class="col-sm-8">{{$nv_giao}}</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Đại diện nhận:</label>
                            <div class="col-sm-8">{{$nv_nhan}}</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Ngày giao:</label>
                            <div class="col-sm-8">{{date('d-m-Y',strtotime($bangiao->ngay_nhan))}}</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Lý do:</label>
                            <div class="col-sm-8">{{$bangiao->ghichu}}</div>
                        </div>
                    </div>
                    
              </div>
            
        </div>
        <div class="col-sm-12 ">
            <div style=" display: flex;align-items: center;">
                <div style="font-size: 28px;color:#333;">Dach sách tài sản bàn giao</div>
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
                        <th >Phòng ban</th>
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
                        @foreach ($chitiettaisan as $item)
                            <tr class="body-table" >
                                <td>{{$count}}</td>
                                <td>{{$item->ma_chitiet}}</td>
                                <td>{{$item->ten_chitiet}}</td>
                                <td>{{$item->ten_ts}}</td>
                                <td>{{$item->so_serial}}</td>
                                <td>
                                    @php
                                        switch ($item->trangthai) {
                                            case '0':
                                                echo 'Không sử dụng';
                                                break;
                                            case '1':
                                                echo 'Đang sử dụng';
                                                break;
                                            case '2':
                                                echo 'Hử hỏng';
                                                break;
                                        }
                                    @endphp
                                </td>
                                <td>{{$item->ten_phong}}</td>
                                <td>
                                    @php
                                        foreach($nhanvien as $val){
                                            if($item->ma_nv == $val->ma_nv){
                                                echo $val->ten_nv; 
                                            }elseif ($item->ma_nv==null) {
                                                echo 'không có nhân viên sử dụng';
                                                break;
                                            }
                                        }
                                    @endphp
                                </td>
                                <td style="border-right: none;">
                                    <button class="btn_chitiet" style="width:40px; height:40px; border:none; background-color: transparent;" data-id_chitiet="{{$item->ma_chitiet}}"  title="Sửa chi tiết" ><i class='bx bx-edit' style="font-size: 30px; color:#5bc0de;"></i></button>
                                    <button style="width:40px; height:40px; border:none; background-color: transparent;" title="Xóa chi tiết" ><i class='bx bxs-trash' style="font-size: 30px; color:#FF3300;"></i></button>
                                </td>
                            </tr>
                            @php
                                $count++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
                <div style="display: flex;justify-content: flex-end">
                    {{$chitiettaisan->onEachSide(2)->links()}}
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection