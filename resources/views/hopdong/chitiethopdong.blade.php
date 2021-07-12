@extends('home')
@section('chitiet')

<div class="col-sm-12" style=" background-color: white;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Chi tiết hợp đồng</h3>
            <div class="form-btn">
                <button class="btn_cus btn-addsp" onclick="" ><i class='bx bx-printer' style="font-weight: 600; "></i>In chi tiết hợp đồng</button>
                <button class="btn_cus btn-back" onclick="location.href='{{route('kiemke.index')}}'"><i class='bx bx-left-arrow-alt'></i> Trở về</button>
            </div>
        </div>
        <div class="row">
           
            <div class="col-sm-12" style="border: 1px solid rgba(0,0,0,0.1);margin-bottom: 10px">
                <span class="text_line">Thông tin hợp đồng</span>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Nhà cung cấp:</label>
                            <div class="col-sm-8">{{$cthopdong->ten_ncc}}</div>
                        </div>  
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Ngày ký:</label>
                            <div class="col-sm-8">{{$cthopdong->ngay_ky}}</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Trạng thái:</label>
                            <div class="col-sm-8">{{$cthopdong->trangthai}}</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Tổng tiền:</label>
                            <div class="col-sm-8">{{$cthopdong->tongtien}}</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Đã thanh toán:</label>
                            <div class="col-sm-8">{{$cthopdong->dathanhtoan}}</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Ghi chú:</label>
                            <div class="col-sm-8">{{$cthopdong->ghichu}}</div>
                        </div>
                    </div>
                    
              </div>
        </div>
        <div class="col-sm-12" style=" background-color: white; padding-left: 10px;">
            <table class="table table_sp ">
                <thead class="heading-table">
                    <tr>
                        <th style="border-left: 1px solid rgba(0,0,0,.1); width:5%;">STT</th>
                        <th >Mã tài sản</th>
                        <th >Tên tài sản</th>
                        <th >Số lượng</th>
                        <th >Nguyên giá</th>
                        <th >VAT</th>
                    </tr>
                </thead>
                <tbody >
                    @php
                        $page =$cttaisan->currentPage();
                        $prepage = $page -1;
                        if($page>1){
                            $count = $prepage*8+1;
                        }else {
                            $count = 1;
                        }
                    @endphp
                    @foreach ($cttaisan as $item)
                    <tr class="body-table">
                        <td>{{$count}}</td>
                        <td>{{$item->ma_ts}}</td>
                        <td>{{$item->ten_ts}}</td>
                        <td>{{$item->soluong}}</td>
                        <td>{{$item->nguyengia}}</td>
                        <td>{{$item->vat}}</td>
                    </tr>
                    @endforeach
                    @php
                        $count++;
                    @endphp
                </tbody>
            </table>
        </div>
    </div>
</div>  
@endsection
<div style="display: flex;justify-content: flex-end">
    {{$cttaisan->onEachSide(2)->links()}}
</div>