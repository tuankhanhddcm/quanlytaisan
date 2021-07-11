<table class="table table_sp ">
    <thead class="heading-table">
        <tr>
            <th style="border-left: 1px solid rgba(0,0,0,.1); width:5%;">STT</th>
            <th style="width: 10%;">Mã Phòng</th>
            <th style="width: 20%;">Tên Phòng</th>
            <th style="width: 10%;">Số lượng tài sản hiện có</th>
            <th style="width: 20%;">Mô Tả</th>
            <th style="width: 5%">Hoạt động</th>
            
        </tr>
    </thead>
    <tbody id="list_product">
        @foreach ($phongban as $key => $item)
            <tr>
                <td style="border: 1px solid rgba(0,0,0,.1); text-align: center">{{$key+1}}</td>
                <td style="border: 1px solid rgba(0,0,0,.1)"><a href="{{route('phongban.show',$item->ma_phong)}}">{{$item->ma_phong}}</a></td>
                <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->ten_phong}}</td>
                <td style="text-align: center">{{$item->soluong}}</td>
                <td style="border: 1px solid rgba(0,0,0,.1);"><?= ($item->mota ==null)?'Không có mô tả':$item->mota?></td> 
                <td style="display: flex;justify-content: center">
                    <button class="btn_suaphong" data-id="{{$item->ma_phong}}" style="width:40px; height:40px;border:none; background-color: transparent;" ><i class='bx bx-edit' style="font-size: 30px; color:#5bc0de;"></i></button>
                    {{-- <button style="width:40px; height:40px; margin-left: 10%; border:none; background-color: transparent;" ><i class='bx bxs-x-square' style="font-size: 30px; color:#FF3300;"></i></button> --}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>