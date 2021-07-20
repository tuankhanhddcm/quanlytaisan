<table class="table table_sp ">
    <thead class="heading-table">
        <tr>
            <th style="border-left: 1px solid rgba(0,0,0,.1); width:2%;">STT</th>
            <th style="width: 25%;">Tên Loại</th>
            <th style="width: 5%">Hoạt động</th>
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
                <td style="text-align: center" >{{$count}}</td>
                <td >{{$item->ten_loai}}</td>
                <td style="display: flex;justify-content: center">
                    <button class="btn_update_loai" data-id="{{$item->id_loai}}" style="width:40px; height:40px; margin-left: 10%; border:none; background-color: transparent;" title="Sửa loại" ><i class='bx bx-edit' style="font-size: 30px; color:#5bc0de;"></i></button>
                    <button class="btn_delete_loai" data-id="{{$item->id_loai}}" style="width:40px; height:40px; margin-left: 10%; border:none; background-color: transparent;" title="Xóa loại" ><i class='bx bxs-trash' style="font-size: 30px; color:#FF3300;"></i></button>
                </td>
            </tr>
            @php
                $count++;
            @endphp
        @endforeach
    </tbody>
</table>
<div style="display: flex;justify-content: flex-end">
    {{$loai->onEachSide(2)->links()}}
</div>