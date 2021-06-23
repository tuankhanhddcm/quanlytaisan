@extends('home')
@section('taisan')
<div class="col-sm-12" style="min-height: 665px; background-color: white;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Danh sách tài sản</h3>
            <button class="btn_cus btn-addsp" onclick="location.href='/taisan/create'" ><i class='bx bx-plus' style="font-weight: 600;"></i>Tạo sản phẩm</button>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="admin_search">
                    <div class="admin_search--input  col-md-5">
                        <input type="text" value="" class="search_input" id='search' onkeyup="search_ts();" placeholder="Nhập mã tài sản hoặc tên tài sản">
                    </div>
                    <div class="select_wrap">
                        <select class=" select select-loaisp form-control" id="loaits"  data-dropup-auto="false" title="Danh mục" data-size='5' data-live-search="true">
                            <option value="" selected>--Chọn loại tài sản--</option>
                            @foreach ($loaits as $val)
                                <option value="{{$val->ma_loai}}">{{$val->ten_loai}}</option>
                            @endforeach
                        </select>
                    </div>
                    

                </div>
            </div>
            <div class="col-sm-12 ">
                <table class="table table_sp ">
                    <thead class="heading-table">
                        <tr>
                            <th style="border-left: 1px solid rgba(0,0,0,.1);width: 50px">STT</th>
                            <th >Mã tài sản</th>
                            <th >Tên tài sản</th>
                            <th >Số lượng</th>
                            <th >Loại tài sản</th>
                            <th style="border-right: none;"></th>
                        </tr>
                    </thead>
                    <tbody id="list_taisan">
                        @foreach ($taisan as $k=>$item)

                            <tr>
                                <td>{{$k+1}}</td>
                                <td><a href="/thongtints/{{$item->ma_ts}}">{{$item->ma_ts}}</a></td>
                                <td>{{$item->ten_ts}}</td>
                                <td>{{$item->soluong}}</td>
                                <td>{{$item->ten_loai}}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $taisan->onEachSide(1)->links() }} --}}
            </div>
        </div>
    </div>
</div>
@endsection
