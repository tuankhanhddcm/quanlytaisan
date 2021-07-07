<table class="table table_sp ">
    <thead class="heading-table">
        <tr>
            <th style="border-left: 1px solid rgba(197, 197, 197, 0.1); width:2%;">STT</th>
            <th style="width: 25%;">Mã loại TSCĐ</th>
            <th style="width: 25%;">Tên Loại TSCĐ</th>
            <th style="width: 25%;">Thuộc loại</th>
            <th style="width: 15%">Hoạt động</th>
        </tr>
    </thead>
    <tbody>
        @if ($loaiTSCD->total() >0)
            @php
                $page =$loaiTSCD->currentPage();
                $prepage = $page -1;
                    if($page>1){
                        $count = $prepage*8+1;
                    }else {
                        $count = 1;
                    }
            @endphp
            @foreach ($loaiTSCD as $item)
                    <tr class="body-table">
                        <td >{{$count}}</td>
                        <td><a href="{{url('/loaiTSCD/'.$item->ma_loai)}}">{{$item->ma_loai}}</a></td>
                        <td >{{$item->ten_loai}}</td>
                        <td >{{$item->loai}}</td>
                        <td >
                            <button class="btn_uploaiTSCD"  data-id="{{$item->ma_loai}}" style="width:40px; height:40px; margin-left: 10%; border:none; background-color: transparent;" title="Sửa loại" ><i class='bx bx-edit' style="font-size: 30px; color:#5bc0de;"></i></button>
                            <button style="width:40px; height:40px; margin-left: 10%; border:none; background-color: transparent;" title="Xóa loại" ><i class='bx bxs-trash' style="font-size: 30px; color:#FF3300;"></i></button>
                        </td>
                    </tr>
                    @php
                        $count++;
                    @endphp
            @endforeach
        @else
            <tr class="body-table"><td colspan='5' style="text-align: center">Không có dữ liệu nào !!!</td></tr>
        @endif
        
    </tbody>
</table>
<div style="display: flex;justify-content: flex-end">
    {{$loaiTSCD->onEachSide(2)->links()}}
</div>