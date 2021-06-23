@extends('home')
@section('insert_ts')
<div class="col-sm-12" style=" background-color: white; padding-left: 10px; margin-bottom: 65px;">
    <div class="main_ward">
        <form action="/taisan" method="post">
            @csrf
        <div class="main-name">
            <h3 class="main-text">Tạo tài sản</h3>

            <div class="form-btn">
                <button class="btn_cus btn-save" type="submit" ><i class='bx bx-save'></i> Lưu</button>
                <a href="{{route('taisan.index')}}" class="btn_cus btn-back" ><i class='bx bx-left-arrow-alt'></i> Trở về</a>
            </div>
            
        </div>
        <div class="row" style="padding-top: 60px">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="form-label sp_lb">Tên tài sản:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <input type="text" class="form-input sp" name="taisan" onkeyup="check('.sp_lb')" value="" placeholder="Nhập tên tài sản">
                            </div>
                            
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle sp_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                <span class="error_sp error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Loại tài sản:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <div class="select_wrap form_input--items" style="width: 100%;">
                                    <select class=" select select-loaisp form-control" id="loaisp" name ="loaits" data-dropup-auto="false" data-size='5' data-live-search="true">
                                        <option value="">--Chọn loại tài sản--</option>
                                        @foreach ($loaits as $val)
                                            <option value="{{$val->ma_loai}}">{{$val->ten_loai}}</option>
                                        @endforeach
                                    </select>
                                    {{-- <button class=" btn_plus" onclick="phan_trang_loai(1);" type="button" data-toggle="modal" data-target="#create_danhmuc"><i class='bx bx-plus'></i></button> --}}
                                </div>
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle loaisp_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                <span class="error_loaisp error"></span>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="form-label sl_lb">Số lượng:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <input type="text" class="form-input sl" name="soluong" onkeyup="check('.sl_lb')" value="" style="text-align: right;" placeholder="0">
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle sl_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                <span class="error_sl error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="">
                        <label for="" class="form-label">Mô tả tài sản:</label>
                        <div class="form-wrap" style="background-color: #ffff;">
                            <textarea id='mota' name="mota" style="display: block; font-size: 14px;padding: 10px;" name="" id="" cols="50" rows="10"></textarea>
                        </div>
                    </div>
                </div>
           
        </div>
    </form>
    </div>
</div>
@endsection
