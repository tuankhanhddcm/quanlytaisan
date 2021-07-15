<div class="col-sm-12 row" style="margin-bottom: 20px">
    <div class="col-sm-4">
        <label>Chi tiết tài sản :</label><br>
            <div style="width: 100%;">
                <select class=" select select-loaisp form-control " id="chitiet{{$a}}"  name ="ma_chitiet[]" data-dropup-auto="false" data-size='5' data-live-search="true">
                    <option value="">--Chọn chi tiết tài sản--</option>
                    @foreach ($taisan as $item)
                        <option value="{{$item->ma_chitiet}}">{{$item->ten_chitiet}}</option>
                    @endforeach
                </select>
            </div>
            <div style="display: flex;">
                <i class='bx bxs-error-circle chitiet{{$a}}_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                <span class="error_chitiet{{$a}} error"></span>
            </div>
    </div>
    <div class="col-sm-4">
        <label >Tình Trạng:</label><br>
            <div class="form_input">
                <input type="text" class="form-input tt" name="tinhtrang[]" value="">
            </div>
            <div style="display: flex;">
                <i class='bx bxs-error-circle tinhtrang_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                <span class="error_tinhtrang error"></span>
            </div>
    </div>
</div>