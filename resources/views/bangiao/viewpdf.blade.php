@extends('home')
@section('view_baocao')
    
    <iframe src="{{URL::asset('phieubangiao/'.$phieu)}}" frameborder="0" width="100%" height="650px"allowfullscreen></iframe>
    <div style="display: flex; justify-content: flex-end ">
        <a   href="{{url()->previous()}}" class="btn_cus btn-back" ><i class='bx bx-left-arrow-alt'></i> Trở về</a>
    </div>
@endsection