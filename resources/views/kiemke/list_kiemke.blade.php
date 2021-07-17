<table class="table table_sp ">
    <thead class="heading-table">
        <tr>
            <th style="border-left: 1px solid rgba(0,0,0,.1); width:20px;">STT</th>
            <th >Mã Phiếu</th>
            <th >Phòng kiểm kê</th>
            <th >Đợt kiểm kê</th>
            <th >Ngày kiểm kê</th>
            <th style="width: 20%;">Ghi chú</th>
            <th style="width: 2%;">Xuất excel</th>
            <th style="width: 3%;">Hoạt động</th>
        </tr>
    </thead>
    <tbody >
        @if ($kiemke->total() >0)
            @php
            $page =$kiemke->currentPage();
            $prepage = $page -1;
                if($page>1){
                    $count = $prepage*8+1;
                }else {
                    $count = 1;
                }
            @endphp
            @foreach ($kiemke as $k=>$item)
            <tr class="body-table" >
                <td>{{$count}}</td>
                <td><a href="{{route('kiemke.show',$item->ma_kiemke)}}">{{$item->ma_kiemke}}</a></td>
                <td>{{$item->ten_phong}}</td>
                <td>{{$item->dot_kiemke}}</td>
                <td>{{date('d-m-Y',strtotime($item->ngay_kiemke))}}</td>
                <td>{{$item->ghichu}}</td>
                <td>
                    <button onclick="location.href='{{route('kiemke.export',$item->ma_kiemke)}}'"  style="width:40px; height:40px; margin-left: 10%; border:none; background-color: transparent;" title="Xuất excel" ><i class='bx bxs-file-export' style="font-size: 25px; color:#278a0e;"></i></button>
                </td>
                <td style="border-right: none; ">
                    <div style="display: flex;justify-content: space-around">
                        <button onclick="location.href='{{route('kiemke.edit',$item->ma_kiemke)}}'" style="width:40px; height:40px;border:none; background-color: transparent;"  title="Sửa phiếu kiểm kê" ><i class='bx bx-edit' style="font-size: 25px; color:#5bc0de;"></i></button>
                        <button class="btn_delete_kk" data-id="{{$item->ma_kiemke}}" style="width:40px; height:40px; border:none; background-color: transparent;" title="Xóa phiếu kiểm kê" ><i class='bx bxs-trash' style="font-size: 25px; color:#FF3300;"></i></button>
                    </div>
                    
                </td>
            </tr>
                @php
                    $count++;
                @endphp
            @endforeach
        @else
        <tr class="body-table"><td colspan='8' style="text-align: center">Không có dữ liệu nào !!!</td></tr>
        @endif
            
    </tbody>
</table>
<div style="display: flex;justify-content: flex-end">
    {{$kiemke->onEachSide(2)->links()}}
</div>