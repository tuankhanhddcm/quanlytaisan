<table class="table table_sp ">
    <thead class="heading-table">
        <tr>
            <th style="border-left: 1px solid rgba(0,0,0,.1); width:20px;">STT</th>
            <th >Mã Phiếu</th>
            <th >Tên người lập</th>
            <th >Phòng thanh lý</th>
            <th >Ngày thanh lý</th>
            <th style="width: 25%;">Ghi chú</th>
            <th style="width: 5%;">Xem phiếu</th>
            <th style="width: 5%;">In phiếu</th>
            <th style="width: 5%;">Hoạt động</th>
        </tr>
    </thead>
    <tbody >
        @php
            $page =$thanhly->currentPage();
            $prepage = $page -1;
                if($page>1){
                    $count = $prepage*8+1;
                }else {
                    $count = 1;
                }
            

            @endphp
        @foreach ($thanhly as $item)
            <tr class="body-table" >
                <td style="text-align: center">{{$count}}</td>
                <td><a href="{{route('thanhly.show',$item->ma_thanhly)}}">{{$item->ma_thanhly}}</a></td>
                <td>{{$item->ten_nv}}</td>
                <td>{{$item->ten_phong}}</td>
                <td>{{date('d-m-Y',strtotime($item->ngay_thanhly))}}</td>
                <td>{{$item->ghichu}}</td>
                <td>
                    <button onclick="location.href='/thanhly/phieu/{{$item->phieu}}'" style="width:40px; height:40px; margin-left: 10%; border:none; background-color: transparent;" title="In phiếu" ><i class='bx bx-file-blank' style="font-size: 25px; color:#3c97ff;"></i></button>
                </td>
                <td>
                    <button onclick="location.href='/thanhly/in_phieu/{{$item->ma_thanhly}}'" style="width:40px; height:40px; margin-left: 10%; border:none; background-color: transparent;" title="In phiếu" ><i class='bx bx-printer' style="font-size: 25px; color:black;"></i></button>
                </td>
                <td style="border-right: none; ">
                    <div style="display: flex;justify-content: space-around;">
                        <button style="width:40px; height:40px;border:none; background-color: transparent;" onclick="location.href=''"  title="Sửa phiếu bàn giao" ><i class='bx bx-edit' style="font-size: 25px; color:#5bc0de;"></i></button>
                        <button class="btn_delete_bg" data-id="{{$item->ma_thanhly}}" style="width:40px; height:40px; border:none; background-color: transparent;" title="Xóa phiếu bàn giao" ><i class='bx bxs-trash' style="font-size: 25px; color:#FF3300;"></i></button>
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
    {{$thanhly->onEachSide(2)->links()}}
</div>