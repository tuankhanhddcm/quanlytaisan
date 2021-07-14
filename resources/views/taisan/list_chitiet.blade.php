<table class="table table_sp ">
    <thead class="heading-table">
        <th style="border-left: 1px solid rgba(0,0,0,.1);width: 50px">STT</th>
        <th >Mã chi tiết</th>
        <th >Tên chi tiết</th>
        <th >Tài sản</th>
        <th >Số serial</th>
        <th style="width: 25%" >Phòng ban</th>
        <th style="width: 10%" >Trạng thái</th>
        <th style="width: 13%">Nhân viên sử dụng</th>
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
                <td>{{$item->ten_phong}}</td>
                <td>
                    @php
                        switch ($item->trangthai) {
                            case '0':
                                echo 'Chưa sử dụng';
                                break;
                            case '1':
                                echo 'Đang sử dụng';
                                break;
                            case '2':
                                echo 'Hử hỏng';
                                break;
                        }
                    @endphp
                </td>
                
                <td>
                    @php
                        foreach($nhanvien as $val){
                            if($item->ma_nv==$val->ma_nv){
                                echo $val->ten_nv;
                            }
                        }
                    @endphp
                </td>
                
                <td style="border-right: none;">
                    <div style="display: flex;justify-content: space-around;align-items: center;">
                        <button class="btn_modal_chitiet" data-ma_ts="{{isset($taisan)?$taisan->ma_ts:''}}" data-id="{{$item->ma_chitiet}}" style="width:40px; height:40px; border:none; background-color: transparent;" title="Sửa loại" ><i class='bx bx-edit' style="font-size: 30px; color:#5bc0de;"></i></button>
                        {{-- <button class="btn_delete" data-id="{{$item->ma_chitiet}}" style="width:40px; height:40px; border:none; background-color: transparent;" title="Xóa chi tiết" ><i class='bx bxs-trash' style="font-size: 30px; color:#FF3300;"></i></button> --}}
                    </div>
                </td>
            </tr>
            @php
                $count++;
            @endphp
        @endforeach
    </tbody>
</table>
<div style="display: flex;justify-content: flex-end">
    {{$chitiettaisan->onEachSide(2)->links()}}
</div>