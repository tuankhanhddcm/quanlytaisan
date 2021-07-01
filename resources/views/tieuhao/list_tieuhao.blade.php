    <table class="table table_sp ">
        <thead class="heading-table">
            <tr>
                <th style="border-left: 1px solid rgba(0,0,0,.1); width:7%;">Mã tài sản</th>
                <th >Tên tài sản</th>
                <th >Nguyên giá</th>
                <th >Tỷ lệ hao mòn</th>
                <th >Số HM/KH năm</th>
                <th >Số khấu hao</th>
                <th>Số hao mòn</th>
                <th >Giá trị còn lại</th>
            </tr>
        </thead>
        <tbody >
            @php
            $page =$tieuhao->currentPage();
            $prepage = $page -1;
                if($page>1){
                    $count = $prepage*8+1;
                }else {
                    $count = 1;
                }
            @endphp
             @foreach ($tieuhao as $item)
                <tr>
                    <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->ma_ts}}</td>
                    <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->ten_ts}}</td>
                    <td style="border: 1px solid rgba(0,0,0,.1)">{{number_format($item->nguyengia)}}đ</td>
                    <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->muc_tieuhao}}</td>
                    <td style="border: 1px solid rgba(0,0,0,.1)">{{number_format($item->nguyengia*$item->muc_tieuhao/100)}}đ</td>
                    <td style="border: 1px solid rgba(0,0,0,.1)">{{($item->nguyengia*$item->muc_tieuhao/100)*(date('Y')-date('Y',strtotime($item->ngay_sd)))}}</td>
                    <td style="border: 1px solid rgba(0,0,0,.1)">{{($item->nguyengia*$item->muc_tieuhao/100)*(date('Y')-date('Y',strtotime($item->ngay_sd)))}}</td>
                    <td style="border: 1px solid rgba(0,0,0,.1)">{{number_format($item->nguyengia - (($item->nguyengia*$item->muc_tieuhao/100)*(date('Y')-date('Y',strtotime($item->ngay_sd)))))}}đ</td>
                </tr>
                @php
                    $count++;
                @endphp
            @endforeach
        </tbody>
    </table>
    <div style="position: absolute; right: 0;">
        {{$tieuhao->onEachSide(2)->links()}}
    </div>
