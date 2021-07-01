<div class="col-sm-12 row" style="margin-bottom: 25px">
    <div class="col-sm-3">
        <label >Tài sản:</label><br>
            <div style="width: 100%;">
                <select class=" select select-ts  form-control" id="ts{{$a}}" data-tt="{{$a}}"  name ="ma_ts[]" data-dropup-auto="false" data-size='5' data-live-search="true">
                    <option value="">--Chọn tài sản--</option>
                    @foreach ($taisan as $item)
                        <option value="{{$item->ma_ts}}">{{$item->ten_ts}}</option>
                    @endforeach
                </select>
            </div>
            <div style="display: flex;">
                <i class='bx bxs-error-circle ts{{$a}}_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                <span class="error_ts{{$a}} error"></span>
            </div>
    </div>
    <div class="col-sm-3">
        <label>Chi tiết tài sản:</label><br>
            <div style="width: 100%;">
                <select class=" select select-loaisp  form-control" id="chitiet{{$a}}"   name ="ma_chitiet[]" data-dropup-auto="false" data-size='5' data-live-search="true">
                    <option value="">--Chọn chi tiết tài sản--</option>
                </select>
            </div>
            <div style="display: flex;">
                <i class='bx bxs-error-circle chitiet{{$a}}_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                <span class="error_chitiet{{$a}} error"></span>
            </div>
    </div>
    <div class="col-sm-3">
        <label >Tình Trạng:</label><br>
            <div class="form_input">
                <input type="text" class="form-input tt" name="tinhtrang[]">
            </div>
            <div style="display: flex;">
                <i class='bx bxs-error-circle tinhtrang_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 18px;padding-right: 5px;"></i>
                <span class="error_tinhtrang error"></span>
            </div>
    </div>
</div>