<table class="table table_sp ">
    <thead class="heading-table">
        <th style="border-left: 1px solid rgba(0,0,0,.1);width: 50px">STT</th>
        <th >Mã chi tiết</th>
        <th >Tên chi tiết</th>
        <th >Tài sản</th>
        <th >Số serial</th>
        <th >Trạng thái</th>
        <th>Nhân viên sử dụng</th>
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
                <td>{{$item->trangthai}}</td>
                <td>{{$item->ma_nv}}</td>
                <td style="border-right: none;">
                    <button style="width:40px; height:40px; margin-left: 10%; border:none; background-color: transparent;" title="Sửa loại" ><i class='bx bx-edit' style="font-size: 30px; color:#5bc0de;"></i></button>
                    <button style="width:40px; height:40px; margin-left: 10%; border:none; background-color: transparent;" title="Xóa loại" ><i class='bx bxs-trash' style="font-size: 30px; color:#FF3300;"></i></button>
                </td>
            </tr>
            @php
                $count++;
            @endphp
        @endforeach
    </tbody>
</table>
<div style="position: absolute; right: 0;">
    {{$chitiettaisan->onEachSide(2)->links()}}
</div>