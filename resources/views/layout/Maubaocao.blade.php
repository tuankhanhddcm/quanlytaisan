@extends('home')
@section('maubaocao')
    <div class="col-sm-12" style="min-height: 665px; background-color: white;">
        <div class="main_ward">
            <div class="main-name">
                <h3 class="main-text">Mẫu Báo Cáo</h3>
                <div >
                    
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="admin_search" style="justify-content: space-between">
                        <div class="admin_search--input  col-md-4">
                            <input type="text" value="" class="search_input" id='search_baocao' onkeyup="search_baocao()" placeholder="Nhập tên mẫu báo cáo hoặc nội dung">
                        </div>
                        <div class="form-btn" > 
                            <button class="btn_cus btn-addsp" data-toggle="modal" data-target="#insert_file" ><i class='bx bx-plus' style="font-weight: 600;"></i>Thêm mẫu báo cáo</button>
                        </div>
                    </div>
                    
                </div>
                <div class="col-sm-12 ">
                    <table class="table table_sp ">
                        <thead class="heading-table">
                            <tr>
                                <th style="border-left: 1px solid rgba(0,0,0,.1); width:5%;">STT</th>
                                <th style="width: 30%;">Tên Mẫu Cáo Cáo</th>
                                <th style="width: 45%"> Nội dung</th>
                                <th style="width: 20%;">Hoạt Động</th>
                            </tr>
                        </thead>
                        <tbody id="list_baocao">
                            @foreach ($baocao as $item)
                                <tr>
                                    <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->id}}</td>
                                    <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->tieude}}</td>
                                    <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->noidung}}</td>
                                    <td style="display: flex; align-items: center;justify-content: center" >
                                        <a href="{{url('/maubaocao/'.$item->name_file.'/view')}}"  class="btn_view"><i class='bx bx-show-alt' style="font-size: 30px; color:rgb(90, 210, 250); font-weight: bold; "></i></a>
                                        <a href="{{url('/word_export',$item->name_file)}}"  class="btn_download" ><i class='bx bx-download' style="font-size: 30px; color:rgb(255, 31, 31); font-weight: bold;"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                   
                </div>
                <div style="position: relative; left: 1000px;">
                    {{$baocao->onEachSide(1)->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection