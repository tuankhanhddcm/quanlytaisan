@extends('home')
@section('insert_doc')
<div class="col-sm-12" style=" background-color: white; padding-left: 10px; margin-bottom: 65px;">
    <div class="main_ward">
        <form action="/taisan" method="post">
            @csrf
        <div class="main-name">
            <h3 class="main-text">Thêm mẫu báo cáo</h3>

            <div class="form-btn">
                <button class="btn_cus btn-save" type="submit" ><i class='bx bx-save'></i> Lưu</button>
                <a href="{{url('/maubaocao')}}" class="btn_cus btn-back" ><i class='bx bx-left-arrow-alt'></i> Trở về</a>
            </div>
            
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="" class="form-label sp_lb">Tiêu đề:</label>
                    <div class="form-wrap">
                        <div class="form_input">
                            <input type="text" class="form-input sp" name="taisan" onkeyup="check('.sp_lb')" value="" placeholder="Nhập tiêu đề">
                        </div>
                        
                        <div style="display: flex;">
                            <i class='bx bxs-error-circle sp_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                            <span class="error_sp error"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group" style="">
                    <label for="" class="form-label">Nội dung:</label>
                    <div class="form-wrap" style="background-color: #ffff;">
                        <textarea id='mota' name="mota" style="display: block; font-size: 1.2rem;padding: 10px;" name="" id="" cols="50" rows="10"></textarea>
                    </div>
                </div>
                
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="" class="form-label">Chọn ảnh đại diện:</label>
                    <div class="form-wrap">
                        <div style="display: flex;">
                            <label class="btn_upload"><input type="file" onchange="readURL(this,'#img_temp','#img_insert')" id="img_temp" hidden accept=".gif, .png, .jpg, .jfif, .jpeg">Chọn ảnh</label>
                        </div>
                        <div style="display: flex;">
                            <i class='bx bxs-error-circle img_temp_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                            <span class="error_img_temp error"></span>
                        </div>
                    </div>
                </div>
            </div>
       
    </div>
    </form>
    </div>
</div>
@endsection
