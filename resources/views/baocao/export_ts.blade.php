
<table class="table table_sp " >
    <thead class="heading-table">
        <tr>
            <th style="text-align: center;font-size: 18px;font-family: 'Times New Roman', Times, serif;font-weight: bold" colspan="14">Danh sách tài sản</th>
            
        </tr>
        
        <tr>
            <th></th>
        </tr>
        <tr style="border: 1px solid black;" >
            <th style="border: 1px solid black;font-size: 14px;font-family: 'Times New Roman', Times, serif;font-weight: bold">STT</th>
            <th style="border: 1px solid black;font-size: 14px;font-family: 'Times New Roman', Times, serif;font-weight: bold">Mã tài sản</th>
            <th style="width: 20%;border: 1px solid black;font-size: 14px;font-family: 'Times New Roman', Times, serif;font-weight: bold">Tên tài sản</th>
            <th style="width: 25%;border: 1px solid black;font-size: 14px;font-family: 'Times New Roman', Times, serif;font-weight: bold">Loại TSCĐ</th>
            <th style="width: 25%;border: 1px solid black;font-size: 14px;font-family: 'Times New Roman', Times, serif;font-weight: bold">Phòng/ban</th>
            <th style="border: 1px solid black;font-size: 14px;font-family: 'Times New Roman', Times, serif;font-weight: bold">Số lượng</th>
            <th style="border: 1px solid black;font-size: 14px;font-family: 'Times New Roman', Times, serif;font-weight: bold">Nguyên giá</th>
            <th style="border: 1px solid black;font-size: 14px;font-family: 'Times New Roman', Times, serif;font-weight: bold">Ngày mua</th>
            <th style="border: 1px solid black;font-size: 14px;font-family: 'Times New Roman', Times, serif;font-weight: bold">Tỷ lệ hao mòn (% năm)</th>
            <th style="border: 1px solid black;font-size: 14px;font-family: 'Times New Roman', Times, serif;font-weight: bold">Giá trị HM/KH năm</th>
            <th style="border: 1px solid black;font-size: 14px;font-family: 'Times New Roman', Times, serif;font-weight: bold" >Năm sử dụng</th>
            <th style="border: 1px solid black;font-size: 14px;font-family: 'Times New Roman', Times, serif;font-weight: bold">Thời hạn sử dụng</th>
            <th style="border: 1px solid black;font-size: 14px;font-family: 'Times New Roman', Times, serif;font-weight: bold">Thời gian sử dụng còn lại</th>
            <th style="border: 1px solid black;font-size: 14px;font-family: 'Times New Roman', Times, serif;font-weight: bold">Giá trị còn lại</th>
        </tr>
    </thead>
    <tbody >
        @foreach ($taisan as $k=>$item)
                <tr class="body-table" style="border: 1px solid black;font-family: 'Times New Roman', Times, serif" >
                    <td style="border: 1px solid black;font-family: 'Times New Roman', Times, serif">{{$k+1}}</td>
                    <td style="border: 1px solid black;font-family: 'Times New Roman', Times, serif">{{$item->ma_ts}}</td>
                    <td style="border: 1px solid black;font-family: 'Times New Roman', Times, serif">{{$item->ten_ts}}</td>
                    <td style="border: 1px solid black;font-family: 'Times New Roman', Times, serif">{{$item->ten_loai}}</td>
                    <td style="border: 1px solid black;font-family: 'Times New Roman', Times, serif">
                        @php
                        if(isset($phongts)){
                            $ten ='';
                            foreach ($phongts as $val) {
                                if($item->ma_ts ==$val->ma_ts){
                                    $ten .= $val->ten_phong.', ';
                                }
                            }
                            echo $ten = chop($ten,', ');
                        }else {
                            echo $item->ten_phong;
                        }
                        
                    @endphp
                    </td>
                    <td style="text-align: center;border: 1px solid black;font-family: 'Times New Roman', Times, serif">{{$item->soluong}}</td>
                    <td style="text-align: center;border: 1px solid black;font-family: 'Times New Roman', Times, serif">{{number_format($item->nguyengia)}}đ</td>
                    <td style="text-align: center;border: 1px solid black;font-family: 'Times New Roman', Times, serif">{{date('d-m-Y', strtotime($item->ngay_mua))}}</td>
                    <td style="text-align: center;border: 1px solid black;font-family: 'Times New Roman', Times, serif">{{$item->muc_tieuhao}}</td>
                    <td style="text-align: center;border: 1px solid black;font-family: 'Times New Roman', Times, serif">{{number_format($item->nguyengia*$item->muc_tieuhao/100)}}đ</td>
                    <td style="text-align: center;border: 1px solid black;font-family: 'Times New Roman', Times, serif">{{date('Y',strtotime($item->ngay_sd))}}</td>
                    <td style="text-align: center;border: 1px solid black;font-family: 'Times New Roman', Times, serif">{{$item->thoi_gian_sd}} năm</td>
                    <td style="text-align: center;border: 1px solid black;font-family: 'Times New Roman', Times, serif">{{$item->thoi_gian_sd-(date('Y')-date('Y',strtotime($item->ngay_sd)))}} năm</td>
                    <td style="text-align: center;border: 1px solid black;font-family: 'Times New Roman', Times, serif">{{number_format($item->nguyengia - (($item->nguyengia*$item->muc_tieuhao/100)*(date('Y')-date('Y',strtotime($item->ngay_sd)))))}}đ</td>
                </tr>
        @endforeach
        
    </tbody>
</table>
