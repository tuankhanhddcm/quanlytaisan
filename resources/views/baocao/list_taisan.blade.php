<table class="table table_sp " >
    <thead class="heading-table">
        <tr>
            <th style="border-left: 1px solid rgba(0,0,0,.1);width: 50px">STT</th>
            <th >Mã tài sản</th>
            <th >Tên tài sản</th>
            <th >Loại TSCĐ</th>
            <th >Phòng/ban</th>
            <th >Số lượng</th>
            <th>Nguyên giá</th>
            <th style="width: 8%">Ngày mua</th>
        </tr>
    </thead>
    <tbody >
        @if ($taisan->total() >0)
            @php
            $page =$taisan->currentPage();
            $prepage = $page -1;
                if($page>1){
                    $count = $prepage*8+1;
                }else {
                    $count = 1;
                }
            @endphp
            @foreach ($taisan as $item)
                <tr class="body-table" >
                    <td>{{$count}}</td>
                    <td><a href="/taisan/{{$item->ma_ts}}">{{$item->ma_ts}}</a></td>
                    <td>{{$item->ten_ts}}</td>
                    <td>{{$item->ten_loai}}</td>
                    <td>
                        @php
                            if(isset($phongts)){
                                foreach ($phongts as $val) {
                                if($item->ma_ts ==$val->ma_ts){
                                    echo $val->ten_phong.'<br/>';
                                }
                                }
                            }else {
                                echo $item->ten_phong;
                            }
                            
                        @endphp
                    </td>
                    <td style="text-align: center">{{$item->soluong}}</td>
                    <td style="text-align: center">{{number_format($item->nguyengia)}}đ</td>
                    <td>{{date('d-m-Y', strtotime($item->ngay_mua))}}</td>
                    
                </tr>
                @php
                    $count++;
                @endphp
            @endforeach
        @else
        <tr class="body-table"><td colspan='9' style="text-align: center">Không có dữ liệu nào !!!</td></tr>
        @endif
        
    </tbody>
</table>
<div style="display: flex;justify-content: flex-end">
    {{$taisan->onEachSide(2)->links()}}
</div>