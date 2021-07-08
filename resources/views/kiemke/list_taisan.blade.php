<table class="table table_sp ">
    <thead class="heading-table">
        <tr>
            <th rowspan="2" style="border-left: 1px solid rgba(0,0,0,.1); width:5%;">STT</th>
            <th rowspan="2">Mã tài sản</th>
            <th rowspan="2">Tên tài sản</th>
            <th rowspan="2">Phòng ban</th>
            <th colspan="2">Theo sổ kế toán</th>
            <th colspan="2">Theo sổ kiểm kê</th> 
            <th colspan="2">Chênh lệch</th>
        </tr>
        <tr>
            <th>Số lượng</th>
            <th>Nguyên giá</th>
            <th>Số lượng</th>
            <th>Nguyên giá</th>
            <th>Số lượng</th>
            <th>Nguyên giá</th>
        </tr>
    </thead>
    <tbody >
        @if (isset($taisan) && count($taisan) >0)
           
                @foreach ($taisan as $k=> $item)
                <tr class="body-table">
                    <td style="text-align: center">{{$k+1}}</td>
                    <td >{{$item->ma_ts}} <input type="hidden" name='taisan[]' value="{{$item->ma_ts}}"></td>
                    <td>{{$item->ten_ts}}</td>
                    <td>{{$item->ten_phong}}</td>
                    <td style="text-align: center" id='soluong_ht{{$item->ma_ts}}'>{{$item->soluong}}</td>
                    <td style="text-align: center">{{number_format($item->nguyengia)}}đ</td>
                    <td style="text-align: center"><input type="text" style="width: 100px;text-align: center;outline: none" class="soluongkiemke" name="soluongkiemke[]" data-id="{{$item->ma_ts}}" value="{{$item->soluong}}"></td>
                    <td style="text-align: center">{{number_format($item->nguyengia)}}đ</td>
                    <td style="text-align: center;border-bottom: 1px solid rgba(0,0,0,.1)" id="soluong{{$item->ma_ts}}">{{$item->soluong-$item->soluong}}</td>
                    <td style="text-align: center">{{number_format($item->nguyengia)}}đ</td>
                </tr>
                @endforeach
        @else
        <tr class="body-table"><td colspan='10' style="text-align: center">Không có dữ liệu nào !!!</td></tr>
        @endif
        
    </tbody>
</table>