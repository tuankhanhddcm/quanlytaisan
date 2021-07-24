<table class="table table_sp ">
    <thead class="heading-table">
        <tr>
            <th colspan="4" style="font-weight: bold;font-family: 'Times New Roman', Times, serif ">Đơn vị:Trung tâm Công nghệ thông tin và Truyền thông</th>
        </tr>
        <tr>
            <th colspan="4" style="font-weight: bold;font-family: 'Times New Roman', Times, serif ">Bộ phận: {{$phong}}</th>
        </tr>
        <tr>
            <th colspan="4" style="font-weight: bold;font-family: 'Times New Roman', Times, serif ">Mã đơn vị SDNS:1109565</th>
        </tr>
        <tr></tr>
        <tr><th colspan="4" style="font-weight: bold;font-family: 'Times New Roman', Times, serif;font-size: 14px ">BIÊN BẢN KIỂM KÊ THIẾT BỊ, CÔNG CỤ DỤNG CỤ, TÀI SẢN CỐ ĐỊNH</th></tr>
        <tr></tr>
        <tr></tr>
        <tr><th colspan="4" style="font-family: 'Times New Roman', Times, serif; ">Thời điểm kiểm kê: {{date('d-m-Y',strtotime($ngay))}}</th></tr>
        <tr><th colspan="4" style="font-family: 'Times New Roman', Times, serif; ">Tổ kiểm kê gồm:</th></tr>
        @foreach ($kiemke as $item)
        <tr>
            <td style="font-family: 'Times New Roman', Times, serif; ">Ông/Bà: {{$item->ten_nv}}</td>
            <td></td>
            <td style="font-family: 'Times New Roman', Times, serif; ">Chức vụ:  {{$item->ten_chucvu}}</td>
        </tr>
        @endforeach
        
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td style="font-family: 'Times New Roman', Times, serif; ">Đơn vị tính:  đồng/cái/mét (chiếc)</td>
        </tr>
        <tr>
            <td colspan="8" style="font-family: 'Times New Roman', Times, serif; ">Đã kiểm kê tài sản cố định, kết quả như sau:</td>
        </tr>
        <tr>
            <th rowspan="2" style="text-align: center; vertical-align: auto; border: 1px solid black; width: 10% font-weight: bold;font-family: 'Times New Roman', Times, serif;font-size: 12px;font-weight: bold;">Số TT</th>
            <th rowspan="2" style="text-align: center; vertical-align: auto; border: 1px solid black; font-weight: bold;font-family: 'Times New Roman', Times, serif;font-size: 12px;width: 35% " >Tên tài<br>sản cố định</th>
            <th rowspan="2" style="text-align: center; vertical-align: auto; border: 1px solid black; font-weight: bold;font-family: 'Times New Roman', Times, serif;font-size: 12px;width: 35%">Nơi sử<br> dụng</th>
            <th colspan="2" style="text-align: center; vertical-align: auto; border: 1px solid black; font-weight: bold;font-family: 'Times New Roman', Times, serif;font-size: 12px;">Theo sổ kế toán</th>
            <th colspan="2" style="text-align: center; vertical-align: auto; border: 1px solid black; font-weight: bold;font-family: 'Times New Roman', Times, serif;font-size: 12px;">Theo sổ kiểm kê</th> 
            <th rowspan="2" style="text-align: center; vertical-align: auto; border: 1px solid black; font-weight: bold;font-family: 'Times New Roman', Times, serif;font-size: 12px;width: 15%">Ghi chú</th>
        </tr>
        <tr>
            <th style="text-align: center; vertical-align: auto; border: 1px solid black; font-weight: bold;font-family: 'Times New Roman', Times, serif;font-size: 12px;width: 20%">Số<br>lượng</th>
            <th style="text-align: center; vertical-align: auto; border: 1px solid black; font-weight: bold;font-family: 'Times New Roman', Times, serif;font-size: 12px;width: 20%">Nguyên <br> giá</th>
            <th style="text-align: center; vertical-align: auto; border: 1px solid black; font-weight: bold;font-family: 'Times New Roman', Times, serif;font-size: 12px;width: 20%">Số<br>lượng</th>
            <th style="text-align: center; vertical-align: auto; border: 1px solid black; font-weight: bold;font-family: 'Times New Roman', Times, serif;font-size: 12px;width: 20%">Nguyên <br> giá</th>
        </tr>
    </thead>
    <tbody >           
        @foreach ($taisan as $k=> $item)
        <tr class="body-table">
            <td  style="text-align: center; vertical-align: auto; border: 1px solid black;font-family: 'Times New Roman', Times, serif;">{{$k+1}}</td>
            <td style=" border: 1px solid black;font-family: 'Times New Roman', Times, serif;">{{$item->ten_ts}}</td>
            <td style=" border: 1px solid black;font-family: 'Times New Roman', Times, serif;">{{$item->ten_phong}}</td>
            <td style="text-align: center; vertical-align: auto; border: 1px solid black;font-family: 'Times New Roman', Times, serif;">{{$item->soluong}}</td>
            <td style="text-align: center; vertical-align: auto; border: 1px solid black;font-family: 'Times New Roman', Times, serif;">{{number_format($item->nguyengia)}}đ</td>
            @php
            $sl=0;
            if(isset($chitiet)){
                foreach ($chitiet as  $val) {
                    if($val->ma_ts==$item->ma_ts){
                        $sl= $val->soluong;
                    }    
                }
            }else {
                $sl = $item->soluong;
            }
        @endphp
            <td style="text-align: center; border: 1px solid black;font-family: 'Times New Roman', Times, serif;">{{$sl}}</td>
            <td style="text-align: center; border: 1px solid black;font-family: 'Times New Roman', Times, serif;">{{number_format($item->nguyengia)}}đ</td>
            <td style=" border: 1px solid black;font-family: 'Times New Roman', Times, serif;"></td>
        </tr>
        
        @endforeach
        <tr></tr>
        <tr></tr>
        <tr>
            <td  colspan="2" style="text-align: center;  font-weight: bold;font-family: 'Times New Roman', Times, serif;font-size: 12px">Thủ trưởng đơn vị<br />
                (Ký, họ tên, đóng dấu)</td>
            <td style="text-align: center;  font-weight: bold;font-family: 'Times New Roman', Times, serif;font-size: 12px">Các tổ  viên <br />
                (Ký, họ tên)</td>
            <td style="text-align: center;  font-weight: bold;font-family: 'Times New Roman', Times, serif;font-size: 12px" ></td>
            <td  style="text-align: center;  font-weight: bold;font-family: 'Times New Roman', Times, serif;font-size: 12px">Tổ trưởng<br />
                (Ký, họ tên)</td>
        </tr>
    </tbody>
</table>