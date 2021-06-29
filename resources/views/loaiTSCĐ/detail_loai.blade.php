@extends('home')
@section('detail_loaiTSCD')
<div class="col-sm-12" style=" background-color: white;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Thông tin loại tài sản cố định</h3>
            <div class="form-btn">
                <button class="btn_cus btn-back" onclick="location.href='{{route('loaiTSCD.index')}}'"><i class='bx bx-left-arrow-alt'></i> Trở về</button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Tên loại:</label>
                            <div class="col-sm-8">{{isset($loaiTSCD)?$loaiTSCD->ten_loai:''}}</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Thuộc loại:</label>
                            <div class="col-sm-8">{{isset($loaiTSCD)?$loaiTSCD->loai:''}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12" style="border: 1px solid rgba(0,0,0,0.1);margin-bottom: 10px">
                <span class="text_line">Chi tiết sử dụng</span>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-5">Thời gian sử dụng (năm):</label>
                            <div class="col-sm-6">{{isset($loaiTSCD)?$loaiTSCD->thoi_gian_sd:''}}</div>
                        </div>  
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Tỉ lệ HM (% năm):</label>
                            <div class="col-sm-8">{{isset($loaiTSCD)?$loaiTSCD->muc_tieuhao:''}}</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">TK nguyên giá:</label>
                            <div class="col-sm-8"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">TK hao mòn:</label>
                            <div class="col-sm-8"></div>
                        </div>
                    </div>
              </div>
            
        </div>
        <div class="col-sm-12 ">
            <div style=" display: flex;align-items: center;">
                <div style="font-size: 28px;color:#333;">Dach sách tài sản</div>
                <div style="margin-left: 20px"><button type="button" onclick="location.href='{{url('taisan/create')}}'" class="btn_cus btn-addsp"><i class='bx bx-plus' style="font-weight: 600; "></i>
                    Thêm tài sản</button>
                </div>
            </div>
            
            <div id="list_taisan">
                <table class="table table_sp ">
                    <thead class="heading-table">
                        <th style="border-left: 1px solid rgba(0,0,0,.1);width: 50px">STT</th>
                        <th >Mã tài sản</th>
                        <th >Tên tài sản</th>
                        <th >Loại tài sản</th>
                        <th >Phòng/ban</th>
                        <th >Số lượng</th>
                        <th>Ngày mua</th>
                        <th style="border-right: none;"></th>
                    </thead>
                    <tbody >
                        @php
                            $page =$taisan->currentPage();
                            $prepage = $page -1;
                                if($page>1){
                                    $count = $prepage*8+1;
                                }else {
                                    $count = 1;
                                }
                            @endphp
                        @foreach ($taisan as $k=>$item)
                            <tr class="body-table" >
                                <td>{{$count}}</td>
                                <td><a href="/taisan/{{$item->ma_ts}}">{{$item->ma_ts}}</a></td>
                                <td>{{$item->ten_ts}}</td>
                                <td>{{$item->ten_loai}}</td>
                                <td>{{$item->ten_phong}}</td>
                                <td>{{$item->soluong}}</td>
                                <td>{{$item->ngay_mua}}</td>
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
                    {{$taisan->onEachSide(2)->links()}}
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection
