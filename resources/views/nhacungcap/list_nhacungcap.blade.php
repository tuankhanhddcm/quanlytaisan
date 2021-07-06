<table class="table table_sp ">
    <thead class="heading-table">
        <tr>
            <th style="border-left: 1px solid rgba(0,0,0,.1); width:5%;">STT</th>
            <th style="width: 15%;">Mã nhà cung cấp</th>
            <th style="width: 15%;">Tên nhà cung cấp</th>
            <th style="width: 15%;">Số điện thoại</th>
            <th style="width: 25%;">Email</th>
            <th style="width: 25%;">Địa Chỉ</th>
            <th style="width: 15%">Hoạt động</th>
        </tr>
    </thead>
    <tbody id="list_product">
        @foreach ($ncc as $key => $item)
            <tr class="body-table">
                <td style="border: 1px solid rgba(0,0,0,.1)">{{$key+1}}</td>
                <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->ma_ncc}}</td>
                <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->ten_ncc}}</td>
                <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->sdt}}</td>
                <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->email}}</td>
                <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->diachi}}</td>
                <td >
                    <button class="btn_upNCC"  data-id="{{$item->ma_ncc}}" style="width:40px; height:40px; margin-left: 10%; border:none; background-color: transparent;" ><i class='bx bx-edit' style="font-size: 30px; color:#5bc0de;"></i></button>
                    <button style="width:40px; height:40px; margin-left: 10%; border:none; background-color: transparent;" ><i class='bx bxs-x-square' style="font-size: 30px; color:#FF3300;"></i></button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>