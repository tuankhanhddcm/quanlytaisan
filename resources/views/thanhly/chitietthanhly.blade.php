@extends('home')
@section('chitiet')
<div class="col-sm-12" style=" background-color: white;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Chi tiết phiếu thanh lý</h3>
            <div class="form-btn">
                <button class="btn_cus btn-back" onclick="location.href='{{route('thanhly.index')}}'"><i class='bx bx-left-arrow-alt'></i> Trở về</button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12" style="border: 1px solid rgba(0,0,0,0.1);margin-bottom: 10px">
                <span class="text_line">Thông tin phiếu thanh lý</span>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Phòng thanh lý:</label>
                            <div class="col-sm-8">{{$thanhly->ten_phong}}</div>
                        </div>  
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Người lập phiếu:</label>
                            <div class="col-sm-8">{{$thanhly->ten_nv}}</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Ngày lập phiếu:</label>
                            <div class="col-sm-8">{{date('d-m-Y',strtotime($thanhly->ngay_thanhly))}}</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Lý do:</label>
                            <div class="col-sm-8">{{$thanhly->ghichu}}</div>
                        </div>
                    </div>
                    
              </div>
            
        </div>
        <div class="col-sm-12 ">
            <div style=" display: flex;align-items: center;">
                <div style="font-size: 28px;color:#333;">Dach sách tài sản thanh lý</div>
            </div>
            @php
                echo $chitiettaisan;
            @endphp
            <div id="list_taisan">
                <table class="table table_sp ">
                    <thead class="heading-table">
                        <th style="border-left: 1px solid rgba(0,0,0,.1);width: 50px">STT</th>
                        <th >Mã chi tiết</th>
                        <th >Tên chi tiết</th>
                        <th >Tài sản</th>
                        <th >Số serial</th>
                        <th >Nguyên giá</th>
                        <th >Giá trị còn lại</th>
                        <th >Tình trạng</th>
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
                                <td>{{number_format($item->nguyengia)}}</td>
                                <td>
                                @php
                                    $gt = ((($item->thoi_gian_sd-(date('Y',strtotime($thanhly->ngay_thanhly))-date('Y',strtotime($item->ngay_sd))))*$item->muc_tieuhao*$item->nguyengia)/100);
                                    if($gt > 0)
                                        echo number_format($gt);
                                    else
                                        echo "0";
                                @endphp
                                </td>
                                <td>{{$item->tinhtrang}}</td>
                                
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