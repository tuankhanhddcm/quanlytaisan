<table class="table table_sp ">
    <thead class="heading-table">
        <tr>
            <th style="border-left: 1px solid rgba(0,0,0,.1); width:10%;">STT</th>
            <th style="width: 15%;">Mã Phòng</th>
            <th style="width: 20%;">Tên Phòng</th>
            <th style="width: 25%;">Mô Tả</th>
            <th style="width: 15%">Hoạt động</th>
        </tr>
    </thead>
    <tbody id="list_product">
        @foreach ($phongban as $key => $item)
            <tr>
                <td style="border: 1px solid rgba(0,0,0,.1)">{{$key+1}}</td>
                <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->ma_phong}}</td>
                <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->ten_phong}}</td>
                <td style="border: 1px solid rgba(0,0,0,.1)"><?= ($item->mota ==null)?'Không có mô tả':$item->mota?></td> 
                <td >
                    <button class="btn_suaphong" data-id="{{$item->ma_phong}}" style="width:40px; height:40px; margin-left: 10%; border:none; background-color: transparent;" ><i class='bx bx-edit' style="font-size: 30px; color:#5bc0de;"></i></button>
                    <button style="width:40px; height:40px; margin-left: 10%; border:none; background-color: transparent;" ><i class='bx bxs-x-square' style="font-size: 30px; color:#FF3300;"></i></button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>