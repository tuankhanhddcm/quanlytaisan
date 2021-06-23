<table class="table table_sp " >
    <thead class="heading-table">
        <tr>
            <th style="border-left: 1px solid rgba(0,0,0,.1);width: 50px">STT</th>
            <th >Mã tài sản</th>
            <th >Tên tài sản</th>
            <th >Số lượng</th>
            <th >Loại tài sản</th>
            <th style="border-right: none;"></th>
        </tr>
    </thead>
    <tbody >
        @php
            $page =$taisan->currentPage();
            $prepage = $page -1;
                if($page>1){
                    $count = $prepage*8+1;
                }else {
                    $count = 1;
                }
            @endphp
        @foreach ($taisan as $k=>$item)
            <tr class="body-table" >
                <td>{{$count}}</td>
                <td><a href="/taisan/{{$item->ma_ts}}">{{$item->ma_ts}}</a></td>
                <td>{{$item->ten_ts}}</td>
                <td>{{$item->soluong}}</td>
                <td>{{$item->ten_loai}}</td>
                <td style="border-right: none;"></td>
            </tr>
            @php
                $count++;
            @endphp
        @endforeach
    </tbody>
</table>
<div style="position: absolute; right: 0;">
    {{$taisan->onEachSide(2)->links()}}
</div>