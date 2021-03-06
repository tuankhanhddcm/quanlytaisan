<table class="table table_sp " >
    <thead class="heading-table">
        <tr>
            <th style="border-left: 1px solid rgba(0,0,0,.1);width: 50px">STT</th>
            <th >Mã tài sản</th>
            <th >Tên tài sản</th>
            <th >Loại TSCĐ</th>
            <th >Phòng/ban</th>
            <th >Số lượng</th>
            <th style="width: 8%">Ngày mua</th>
            <th style="width: 3%">In thẻ TSCĐ</th>
            <th style="border-right: none;"></th>
        </tr>
    </thead>
    <tbody >
        @if ($taisan->total() >0)
            @php
            $page =$taisan->currentPage();
            $prepage = $page -1;
                if($page>1){
                    $count = $prepage*8+1;
                }else {
                    $count = 1;
                }
            @endphp
            @foreach ($taisan as $item)
                <tr class="body-table" >
                    <td>{{$count}}</td>
                    <td><a href="/taisan/{{$item->ma_ts}}">{{$item->ma_ts}}</a></td>
                    <td>{{$item->ten_ts}}</td>
                    <td>{{$item->ten_loai}}</td>
                    <td>
                        @php
                            if(isset($phongts)){
                                foreach ($phongts as $val) {
                                if($item->ma_ts ==$val->ma_ts){
                                    echo $val->ten_phong.'<br/>';
                                }
                                }
                            }else {
                                echo $item->ten_phong;
                            }
                            
                        @endphp
                    </td>
                    <td style="text-align: center">{{$item->soluong}}</td>
                    <td>{{date('d-m-Y', strtotime($item->ngay_mua))}}</td>
                    <td> <button style="width:40px; height:40px;  border:none; background-color: transparent;" onclick="location.href='{{route('inthe_id',$item->ma_ts)}}'" title="In thẻ" ><i class='bx bxs-memory-card' style="font-size: 30px; color:#5bc0de;"></i></button></td>
                    
                    
                    <td style="border-right: none; ">
                        <div style="display: flex;justify-content: space-around;align-items: center;">
                            @if ($item->deleted ==0)

                                <button  style="width:40px; height:40px;  border:none; background-color: transparent;" onclick="location.href='{{route('taisan.edit',$item->ma_ts)}}'" title="Sửa tài sản" ><i class='bx bx-edit' style="font-size: 30px; color:#5bc0de;"></i></button>
                                <button class="btn_delete_ts" data-id="{{$item->ma_ts}}" style="width:40px; height:40px;  border:none; background-color: transparent;" title="Xóa tài sản" ><i class='bx bxs-trash' style="font-size: 30px; color:#FF3300;"></i></button>
                            @else
                                <button class="btn_update_delete" data-id="{{$item->ma_ts}}" style="width:40px; height:40px;  border:none; background-color: transparent;"  title="Khôi phục tài sản" ><i class='bx bx-rotate-left' style="font-size: 30px; color:#5bc0de;"></i></button>
                                <button class="btn_delete_ts_vv" data-id="{{$item->ma_ts}}" style="width:40px; height:40px;  border:none; background-color: transparent;" title="Xóa tài sản" ><i class='bx bxs-trash' style="font-size: 30px; color:#FF3300;"></i></button>
                            @endif
                        </div>
                    </td>
                </tr>
                @php
                    $count++;
                @endphp
            @endforeach
        @else
        <tr class="body-table"><td colspan='9' style="text-align: center">Không có dữ liệu nào !!!</td></tr>
        @endif
        
    </tbody>
</table>
<div style="display: flex;justify-content: flex-end">
    {{$taisan->onEachSide(2)->links()}}
</div>