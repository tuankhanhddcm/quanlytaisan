@extends('home')
@section('index')
<style>
    .image{
        margin-left: 20%;
    }
    .tenmenu{
        text-align: center;
        margin-left: 35%;
        font-size: 22px;
    }
</style>
    <div class="col-sm-12 row" >
        <div class="col-sm-4">
            <a href="/taisan" class="nav-link ">
                    <div class="image">
                        <img src="{{ URL::asset('img/taisan.jpg') }}" class="img-circle elevation-2" alt="Tài Sản" style="width:200px !important; height:200px !important; margin-top:20px;">
                    </div>
                    <br>
                    <span class="tenmenu">Tài Sản</span>
            </a>
        </div>
        
        <div class="col-sm-4">
            <a href="/hopdong" class="nav-link ">
                <p>
                    <div class="image">
                        <img src="{{ URL::asset('img/hopdong.jpg') }}" class="img-circle elevation-2" alt="Hợp Đồng" style="width:200px !important; height:200px !important">
                    </div>
                    <br>
                    <span class="tenmenu">Hợp Đồng</span>
                </p>
            </a>
        </div>
        <div class="col-sm-4">
            <a href="/baocao" class="nav-link ">
                    <div class="image">
                        <img src="{{ URL::asset('img/baocao.png') }}" class="img-circle elevation-2" alt="Báo Cáo" style="width:200px !important; height:200px !important; margin-top:20px;">
                    </div>
                    <br>
                    <span class="tenmenu">Báo Cáo</span>
            </a>
        </div>
    </div>
    <div class="col-sm-12 row" >
        
        <div class="col-sm-4">
            <a href="/maubaocao" class="nav-link ">
                <p>
                    <div class="image">
                        <img src="{{ URL::asset('img/maubaocao.jpg') }}" class="img-circle elevation-2" alt="Mẫu Báo Cáo" style="width:200px !important; height:200px !important">
                    </div>
                    <br>
                    <span class="tenmenu" style="margin-left: 30%;">Mẫu Báo Cáo</span>
                </p>
            </a>
        </div>
        <div class="col-sm-4">
            <a href="#" class="nav-link ">
                <p>
                    <div class="image" style="background-color: #fffff">
                        <img src="{{ URL::asset('img/download.png') }}" style="background-image: #fffff" class="img-circle elevation-2" alt="Thống kê" style="width:200px !important; height:200px !important">
                    </div>
                    <br>
                    <span class="tenmenu">Thống kê</span>
                </p>
            </a>
        </div>
    </div>
   
@endsection