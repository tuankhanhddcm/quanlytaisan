@extends('home')
@section('tieuhao')
<div class="col-sm-12" style="min-height: 665px; background-color: white;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Tiêu Hao Tài Sản</h3>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="admin_search">
                    <div class="admin_search--input  col-md-4">
                        <input type="text" value="" class="search_input" onkeyup="search_tieuhao(1)" id='search' placeholder="Nhập mã tài sản hoặc tài sản">
                    </div>
                </div>
            </div>
            <div class="col-sm-12" id="list_tieuhao">
                @include('tieuhao.list_tieuhao')
            </div>
        </div>
    </div>
</div>
@endsection