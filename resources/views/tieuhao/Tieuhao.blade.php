@extends('home')
@section('tieuhao')
<div class="col-sm-12" style="min-height: 665px; background-color: white;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Tiêu Hao Tài Sản</h3>
            <div >
                <button type="button"  data-toggle="modal" data-target="#themtieuhao"  class="btn_cus btn-addsp"><i class='bx bx-plus' style="font-weight: 600; "></i>
                    Thêm Mức Tiêu Hao
                  </button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="admin_search">
                    <div class="admin_search--input  col-md-4">
                        <input type="text" value="" class="search_input" id='search' placeholder="Nhập mã tài sản hoặc tài sản">
                    </div>
                </div>
            </div>
            <div class="col-sm-12 ">
                <table class="table table_sp ">
                    <thead class="heading-table">
                        <tr>
                            <th style="border-left: 1px solid rgba(0,0,0,.1); width:10%;">STT</th>
                            <th style="width: 15%;">Mã tiêu hao</th>
                            <th style="width: 20%;">Mức tiêu hao</th>
                            <th style="width: 25%;">Thời gian sử dụng</th>
                            <th style="width: 15%">Hoạt động</th>
                        </tr>
                    </thead>
                    <tbody id="list_product">
                         @foreach ($tieuhao as $key => $item)
                            <tr>
                                <td style="border: 1px solid rgba(0,0,0,.1)">{{$key+1}}</td>
                                <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->ma_tieuhao}}</td>
                                <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->muc_tieuhao}}</td>
                                <td style="border: 1px solid rgba(0,0,0,.1)">{{$item->thoi_gian_sd}}</td>
                                <td >
                                    <button style="width:40px; height:40px; margin-left: 15%; border:none; background-color: transparent;" ><a href="{{ url('/tieuhao/'.$item->ma_tieuhao.'/edit' )}}"><i class='bx bx-edit' style="font-size: 25px; color:blue"></i></a></button>
                                    <button style="width:40px; height:40px; margin-left: 15%; border:none; background-color: transparent;"><i class='bx bxs-x-square' style="font-size: 25px; color:red;"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- insert Tiêu hao --}}
<div class="modal fade" id="themtieuhao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thêm Tiêu Hao</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="/tieuhao" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="" class="form-label tieu_hao_lb">Mức tiêu hao:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <input type="text" class="form-input tieu_hao" name="muc_tieuhao" value="" placeholder="Nhập vào mức tiêu hao">
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle tieu_hao_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                <span class="error_tieu_hao error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="">
                        <label for="" class="form-label tg_lb">Thời gian sử dụng:</label>
                        <div class="form-wrap">
                            <div class="form_input">
                                <input type="text" class="form-input tg" name="thoigian_sd" value="" placeholder="Nhập vào thời gian sử dựng">
                            </div>
                            <div style="display: flex;">
                                <i class='bx bxs-error-circle tg_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                <span class="error_tg error"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" style="background-color: #be3921; border: none;color: white; padding: 10px 20px; border-radius: 7px;" data-dismiss="modal">Close</button>
                    <button type="submit" style="background-color: #1ec023; border: none;color: white; padding: 10px 25px; border-radius: 7px;">Thêm Tiêu Hao</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- end inset Tiêu hao --}}

@endsection