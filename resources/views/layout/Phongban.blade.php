@extends('home')
@section('phongban')
    <div class="col-sm-12" style="min-height: 665px; background-color: white;">
        <div class="main_ward">
            <div class="main-name">
                <h3 class="main-text">Quản lý phòng ban</h3>
                <div >
                    <button class="btn_cus btn-addsp" ><i class='bx bx-plus' style="font-weight: 600; "></i>Thêm Phòng</button>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="admin_search">
                        <div class="admin_search--input  col-md-4">
                            <input type="text" value="" class="search_input" id='search' placeholder="Nhập mã phòng ban hoặc tên phòng ban">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 ">
                    <table class="table table_sp ">
                        <thead class="heading-table">
                            <tr>
                                <th style="border-left: 1px solid rgba(0,0,0,.1); width:10%;">STT</th>
                                <th style="width: 15%;">Mã Phòng</th>
                                <th style="width: 20%;">Tên Phòng</th>
                                <th style="width: 25%;">Mô Tả</th>
                                <th style="width: 15%;">Ngày Tạo</th>
                                <th style="width: 15%">Hoạt động</th>
                            </tr>
                        </thead>
                        <tbody id="list_product">
                            {{-- @foreach ($phongban as $key => $item)
                                <tr>
                                    <td style="border: 1px solid rgba(0,0,0,.1)">{{$key+1}}</td>
                                    <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->ma_phong}}</td>
                                    <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->ten_phong}}</td>
                                    <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->mota}}</td>
                                    <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->created}}</td>
                                    <td >
                                        <button style="width:40px; height:40px; margin-left: 15%" class="btn btn-info"><i class='bx bx-edit' style="font-size: 20px; color:white;"></i></button>
                                        <button style="width:40px; height:40px; margin-left: 15%" class="btn btn-denger"><i class='bx bxs-x-square' style="font-size: 20px; color:white;"></i></button>
                                    </td>
                                </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection