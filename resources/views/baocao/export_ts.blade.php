<table class="table table_sp " >
    <thead class="heading-table">
        <tr>
            <th >STT</th>
            <th >Mã tài sản</th>
            <th style="width: 20%">Tên tài sản</th>
            <th style="width: 25%">Loại TSCĐ</th>
            <th style="width: 25%">Phòng/ban</th>
            <th >Số lượng</th>
            <th>Nguyên giá</th>
            <th >Ngày mua</th>
            <th >Tỷ lệ hao mòn (% năm)</th>
            <th >Giá trị HM/KH năm</th>
            <th >Năm sử dụng</th>
            <th >Thời hạn sử dụng</th>
            <th >Thời gian sử dụng còn lại</th>
            <th >Giá trị còn lại</th>
        </tr>
    </thead>
    <tbody >
        @foreach ($taisan as $k=>$item)
                <tr class="body-table" >
                    <td>{{$k+1}}</td>
                    <td>{{$item->ma_ts}}</td>
                    <td>{{$item->ten_ts}}</td>
                    <td>{{$item->ten_loai}}</td>
                    <td>
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
                    <td style="text-align: center">{{$item->soluong}}</td>
                    <td style="text-align: center">{{number_format($item->nguyengia)}}đ</td>
                    <td>{{date('d-m-Y', strtotime($item->ngay_mua))}}</td>
                    <td style="text-align: center">{{$item->muc_tieuhao}}</td>
                    <td style="text-align: center">{{number_format($item->nguyengia*$item->muc_tieuhao/100)}}đ</td>
                    <td style="text-align: center">{{date('Y',strtotime($item->ngay_sd))}}</td>
                    <td style="text-align: center">{{$item->thoi_gian_sd}} năm</td>
                    <td style="text-align: center">{{$item->thoi_gian_sd-(date('Y')-date('Y',strtotime($item->ngay_sd)))}} năm</td>
                    <td style="text-align: center">{{number_format($item->nguyengia - (($item->nguyengia*$item->muc_tieuhao/100)*(date('Y')-date('Y',strtotime($item->ngay_sd)))))}}đ</td>
                </tr>
        @endforeach
        
    </tbody>
</table>
