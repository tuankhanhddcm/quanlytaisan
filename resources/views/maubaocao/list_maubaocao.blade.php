    <table class="table table_sp ">
        <thead class="heading-table">
            <tr>
                <th style="border-left: 1px solid rgba(0,0,0,.1); width:5%;">STT</th>
                <th style="width: 30%;">Tên Mẫu Cáo Cáo</th>
                <th style="width: 45%"> Nội dung</th>
                <th style="width: 20%;">Hoạt Động</th>
            </tr>
        </thead>
        <tbody >
            @php
            $page =$baocao->currentPage();
            $prepage = $page -1;
                if($page>1){
                    $count = $prepage*8+1;
                }else {
                    $count = 1;
                }
            @endphp
            @foreach ($baocao as $item)
                <tr>
                    <td style="border: 1px solid rgba(0,0,0,.1)">{{$count}}</td>
                    <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->tieude}}</td>
                    <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->noidung}}</td>
                    <td style="display: flex; align-items: center;justify-content: center" >
                        <a href="{{url('/maubaocao/'.$item->name_file.'/view')}}"  class="btn_view"><i class='bx bx-show-alt' style="font-size: 30px; color:rgb(90, 210, 250); font-weight: bold; "></i></a>
                        <a href="{{url('/word_export',$item->name_file)}}"  class="btn_download" ><i class='bx bx-download' style="font-size: 30px; color:rgb(255, 31, 31); font-weight: bold;"></i></a>
                    </td>
                </tr>
                @php
                    $count++;
                @endphp
            @endforeach
        </tbody>
    </table>       
    <div style="position: absolute; right: 0;">
        {{$baocao->links()}}
    </div>