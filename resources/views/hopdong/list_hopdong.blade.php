<table class="table table_sp ">
    <thead class="heading-table">
        <tr>
            <th style="border-left: 1px solid rgba(0,0,0,.1); width:5%;">STT</th>
            <th style="width: 10%;">Mã hợp đồng</th>
            <th style="width: 15%;">Nhà cung cấp</th>
            <th style="width: 10%;">Ngày ký</th>
            <th style="width: 10%;">Trạng thái</th>
            <th style="width: 10%;">Tổng tiền</th>
            <th style="width: 10%;">Đã thanh toán</th>
            <th style="width: 20%;">Ghi chú</th>
            <th style="width: 5%;">In</th>
            <th style="width: 5%;">Xóa</th> 
        </tr>
    </thead>
    <tbody>
        @php
            $page =$hopdong->currentPage();
            $prepage = $page -1;
            if($page>1){
                $count = $prepage*8+1;
            }else {
                $count = 1;
            }
        @endphp
        @foreach ($hopdong as $item)
            <tr class="body-table" >
                <td >{{$count}}</td>
                <td ><a href="{{route('hopdong.show',$item->ma_hopdong)}}">{{$item->ma_hopdong}}</a></td>
                <td >{{$item->ten_ncc}}</td>
                <td >{{$item->ngay_ky}}</td>
                <td >{{$item->trangthai}}</td>
                <td >{{$item->tongtien}}</td>
                <td >{{$item->dathanhtoan}}</td>
                <td >{{$item->ghichu}}</td>
                <td >
                    <button onclick="'" style="width:40px; height:40px; margin-left: 10%; border:none; background-color: transparent;" title="In phiếu" ><i class='bx bx-file-blank' style="font-size: 25px; color:#3c97ff;"></i></button>
                </td>
                <td style="border-right: none; display: flex;justify-content: space-around">
                    <button style="width:40px; height:40px; border:none; background-color: transparent;" title="Xóa phiếu bàn giao" ><i class='bx bxs-trash' style="font-size: 25px; color:#FF3300;"></i></button>
                </td>
            </tr>
        @endforeach
        @php
            $count++;
        @endphp
    </tbody>
</table>


{{-- // <div style="display: flex;justify-content: flex-end">
    //     {{$hopdong->onEachSide(2)->links()}}
    // </div> --}}