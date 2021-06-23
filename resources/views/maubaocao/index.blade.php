@extends('home')
@section('maubaocao')
    <div class="col-sm-12" style="min-height: 770px; background-color: white;">
        <div class="main_ward">
            <div class="main-name">
                <h3 class="main-text">Mẫu Báo Cáo</h3>
                <div >
                    
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="admin_search" style="justify-content: space-between">
                        <div class="admin_search--input  col-md-4">
                            <input type="text" value="" class="search_input" id='search_baocao' onkeyup="search_baocao()" placeholder="Nhập tên mẫu báo cáo hoặc nội dung">
                        </div>
                        <div class="form-btn" > 
                            <button class="btn_cus btn-addsp" data-toggle="modal" data-target="#insert_file" ><i class='bx bx-plus' style="font-weight: 600;"></i>Thêm mẫu báo cáo</button>
                        </div>
                    </div>
                    
                </div>
                <div class="col-sm-12 " id="list_baocao">
                    @include('maubaocao.list_maubaocao')
                </div>
        </div>
    </div>
@endsection