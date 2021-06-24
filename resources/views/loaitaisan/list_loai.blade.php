<table class="table table_sp ">
    <thead class="heading-table">
        <tr>
            <th style="border-left: 1px solid rgba(0,0,0,.1); width:10%;">STT</th>
            <th style="width: 20%;">Mã Loại</th>
            <th style="width: 25%;">Tên Loại</th>
            <th style="width: 30%;">Mô tả</th>
            <th style="width: 15%">Hoạt động</th>
        </tr>
    </thead>
    <tbody>
        @php
        $page =$loai->currentPage();
        $prepage = $page -1;
            if($page>1){
                $count = $prepage*8+1;
            }else {
                $count = 1;
            }
        @endphp
        @foreach ($loai as $item)
            <tr class="body-table">
                <td >{{$count}}</td>
                <td >{{$item->ma_loai}}</td>
                <td >{{$item->ten_loai}}</td>
                <td >{{$item->mo_ta}}</td>
                <td >
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
    {{$loai->onEachSide(2)->links()}}
</div>