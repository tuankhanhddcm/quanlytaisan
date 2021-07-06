<table class="table table_sp ">
    <thead class="heading-table">
        <tr>
            <th style="border-left: 1px solid rgba(0,0,0,.1); width:5%;">STT</th>
            <th style="width: 5%;">Mã nhân viên</th>
            <th style="width: 18%;">Tên nhân viên</th>
            <th >Email</th>
            <th >Địa Chỉ</th>
            <th >Phòng ban</th>
            <th>Chức vụ</th>
            <th style="width: 12%">Hoạt động</th>
        </tr>
    </thead>
    <tbody id="list_product">
        @php
        $page =$nhanvien->currentPage();
        $prepage = $page -1;
            if($page>1){
                $count = $prepage*8+1;
            }else {
                $count = 1;
            }
        @endphp
        @foreach ($nhanvien as $item)
            <tr>
                <td style="border: 1px solid rgba(0,0,0,.1)">{{$count}}</td>
                <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->ma_nv}}</td>
                <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->ten_nv}}</td>
                <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->email}}</td>
                <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->diachi}}</td>
                <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->ten_phong}}</td>
                <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->ten_chucvu}}</td>
                
                <td >
                    <button class="btn_up_nhanvien" data-id="{{$item->ma_nv}}"   style="width:40px; height:40px; margin-left: 10%; border:none; background-color: transparent;" ><i class='bx bx-edit' style="font-size: 30px; color:#5bc0de;"></i></button>
                    <button style="width:40px; height:40px; margin-left: 10%; border:none; background-color: transparent;" ><i class='bx bxs-x-square' style="font-size: 30px; color:#FF3300;"></i></button>
                </td>
            </tr>
            @php
                $count++;
            @endphp
        @endforeach
        
    </tbody>
</table>
<div style="display: flex;justify-content: flex-end">
    {{$nhanvien->onEachSide(2)->links()}}
</div>