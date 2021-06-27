@extends('home')
@section('chitiettaisan')
<div class="col-sm-12" style="min-height: 665px; background-color: white;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Chi tiết tài sản</h3>
            <div >
                <button class="btn_cus btn-addsp" data-toggle="modal" data-target="#themchitiet" ><i class='bx bx-plus' style="font-weight: 600; "></i>Thêm chi tiết</button>
                
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="admin_search">
                    <div class="admin_search--input  col-md-5">
                        <input type="text" value="" class="search_input" id='search' placeholder="Nhập tên chi tiết">
                    </div>
                    <div class="select_wrap">
                        <select class=" select select-loaisp form-control" id="loaisp" data-dropup-auto="false" title="Danh mục" data-size='5' data-live-search="true">
                            <option value="" selected>--Chọn tài sản--</option>
                            @foreach ($taisan as $item)
                                <option value="{{$item->ma_ts}}">{{$item->ten_ts}}</option>
                            @endforeach
                        </select>
                    </div>
                    

                </div>
            </div>
            <div class="col-sm-12 ">
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
@include('chitiettaisan.modal')
@endsection
