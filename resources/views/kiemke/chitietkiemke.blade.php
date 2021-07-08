@extends('home')
@section('chitiet')
<style>
    .main_ward {
    padding: 10px 5px;
    min-height: 750px;
}
</style>
<div class="col-sm-12" style=" background-color: white;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Chi tiết phiếu kiểm kê</h3>
            <div class="form-btn">
                <button class="btn_cus btn-back" onclick="location.href='{{route('kiemke.index')}}'"><i class='bx bx-left-arrow-alt'></i> Trở về</button>
            </div>
        </div>
        <div class="row">
           
            <div class="col-sm-12" style="border: 1px solid rgba(0,0,0,0.1);margin-bottom: 10px">
                <span class="text_line">Thông tin phiếu kiểm kê</span>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Phòng kiểm kê:</label>
                            <div class="col-sm-8"></div>
                        </div>  
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Đợt kiểm kê:</label>
                            <div class="col-sm-8"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Ngày kiểm kê:</label>
                            <div class="col-sm-8"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Ghi chú:</label>
                            <div class="col-sm-8"></div>
                        </div>
                    </div>
              </div>
        </div>
        <div class="col-sm-12" style=" background-color: white; padding-left: 10px;">
            <div class="main_ward">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs sign-header" style="border: none; margin-bottom: 30px; margin-top: 0;" id="navId">
                        <li class="nav-item">
                            <a href="#tab1Id" class="nav-link active " id="info_sp" data-toggle="tab">Chi tiết Tài Sản</a>
                        </li>
                        <li class="nav-item">
                            <a href="#tab2Id" class="nav-link" id="thongso_sp" data-toggle="tab">Ban kiểm kê</a>
                        </li>
                    </ul>
            
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab1Id" role="tabpanel">
                            <div class="row">
                                    <table class="table table_sp ">
                                        <thead class="heading-table">
                                            <tr>
                                                <th style="border-left: 1px solid rgba(0,0,0,.1); width:10%;">Mã tài sản</th>
                                                <th style="width:15%;">Tên tài sản</th>
                                                <th style="width:15%;">Người sử dụng</th>
                                                <th style="width:10%;">Số lượng</th>
                                                <th style="width:10%;">Nguyên giá</th>
                                                <th style="width:15%;">Giá trị còn lại</th>
                                                <th style="width:25%;">Ghi chú</th>
                                            </tr>
                                        </thead>
                                        <tbody >
                                                <tr class="body-table" >
                                                    <td>1</td>
                                                    <td>2</td>
                                                    <td>3</td>
                                                    <td>4</td>
                                                    <td>5</td>
                                                    <td>6</td>
                                                    <td>7</td>
                                                </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <div class="tab-pane fade" id="tab2Id" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-12 row" style="border: 1px solid rgba(0,0,0,0.1);margin-bottom: 10px">
                                    <div class="col-sm-6">
                                        1
                                    </div>
                                    <div class="col-sm-6">
                                        2
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>  
@endsection