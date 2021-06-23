@extends('home')
@section('themphong')
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Thêm phòng ban</h3>
            <div >
                <button class="btn_cus btn-addsp" ><i class='bx bx-plus' style="font-weight: 600; "></i>Trở về</button>
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
                <form >
                    <label>Mã Phòng: </label>
                    <input type="text">
                    <label>Tên Phòng:</label>
                    <input type="text">
                    <label>Ghi chú: </label>
                    <input type="text">
                    <br>
                    <input type="button" value="Thêm phòng">
                </form>
            </div>
        </div>
    </div>
@endsection