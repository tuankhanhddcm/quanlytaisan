$(document).ready(function(){
    $(".select").selectpicker();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.select-loaits').click(function(){
        search_ts(1);
    });

    $('.loaits-select').click(function(){
        check('#loaits');
    })
    $('.select-ncc').click(function(){
        check('#ncc');
    });
    $('.select-phongban').click(function(){
        check('#phongban');
    });

    // check số
    $('.soluong').inputFilter(function (value) {
        return /^\d*$/.test(value);
    });

    // phân trang
    $(document).on('click','.pagination a', function(event){
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        search_baocao(page);
        search_ts(page);
        search_loai(page)
    });

    // chỉnh calendar
    $(".date").datepicker({
        dateFormat: 'dd-mm-yy',
        changeMonth: true, 
        changeYear: true 
    });
});

function search_ts(page){
    var text=$('#search').val();
    var seleted = $('#loai_taisan option:selected').val();
    $.ajax({
        
        url:'/taisan/search?page='+page,
        method:"post",
        data:{
            text:text,
            seleted:seleted,
        },
        success: function(data){
            $('#list_taisan').html(data);
        }
    });
}


//check input rỗng
function check(id) {
    var lop = '';
    var end = id.search("_lb");
    if (end > 0) {
        var t = id.slice(end + 1);

    } else {
        var t = id.slice(1);
    }

    if (end == -1) {

        var dk = id.slice(1);
        lop = id;

    } else {

        var dk = id.slice(1, end);
        lop = id.slice(0, end);
    }
    var val = $(id).text();
    val = val.toLowerCase().replaceAll(":", "");
    switch (t) {
        case 'lb': text = 'nhập ' + val;
            break;
        case 'file_temp': text = 'chọn file';
            break;
        case 'file_pdf': text = 'chọn file';
            break;
        case 'name': text ='nhập tên đăng nhập';
            break;
        case 'pass': text ='nhập mật khẩu';
            break;
        case 'loaits': text ='chọn loại tài sản';
            break;
        case 'phongban': text ='chọn phòng ban';
            break;
        case 'chucvu': text ='chọn chức vụ';
            break;
        case 'ncc': text ='chọn nhà cung cấp';
            break;
    }
    if ($(lop).val() == "" ) {
        $(lop).addClass('error_input');
        $("." + dk + "_icon").css("display", "block");
        $(".error_" + dk).text("Vui lòng  " + text);
        $(".error_" + dk).css("display", "block");
        return false;
    } else {
        $(lop).removeClass('error_input');
        $("." + dk + "_icon").css("display", "none");
        $(".error_" + dk).css("display", "none");
        return true;
    }
}

// kiểm tra file
function readURL(input, id_img,loaifile='') {
    var file = input.files;
    var id = id_img.slice(1);
    var match = ["application/vnd.openxmlformats-officedocument.wordprocessingml.document",'application/pdf','application/msword'];  
    if (file.length > 0 && file != "") {
        var files = $(id_img).prop('files')[0];
        var type = files.type;
        if(loaifile =='pdf'){
            $('.text_name_pdf').text(files.name);
            if (type == match[1]) {
                $('.'+id+"_icon").css('display','none');
                $(".error_" + id).text('');
            } else{
                $(".error_" + id).text('File không hợp lệ');
                $('.'+id+"_icon").css('display','block');
            }
        }else{
            $('.text_name_file').text(files.name);
            if (type == match[0] || type == match[2] ) {
                $('.'+id+"_icon").css('display','none');
                $(".error_" + id).text('');
            } else{
                $(".error_" + id).text('File không hợp lệ');
                $('.'+id+"_icon").css('display','block');
            }
        }
    } else {
        if(loaifile =='pdf'){
            $('.text_name_pdf').text('');
        }else{
            $('.text_name_file').text('');
        }
        $(".error_" + id).text('Vui lòng chọn file');
        $(".error_" + id).css("display", 'block');
        $('.'+id+"_icon").css('display','block');
    }

}

function check_insertFile(){
    check('.mota_lb');
    check('#file_pdf')
    if(check('.title_lb') && check('#file_temp') &&check('#file_pdf') && check('.mota_lb'))
        return true;
    return false;
}

// tìm kiếm báo cáo
function search_baocao(page){
    var text = $("#search_baocao").val();
    $.ajax({
        url:'/maubaocao/search?page='+page,
        method: 'post',
        data:{text:text},
        success: function(data){
            $('#list_baocao').html(data);
        }
    });
}

function checklogin(){
    var name = $('#name').val();
    var pass = $('.pass').val();
    var kq = false;
    if(check('#name') &&check('.pass')){
        ;
        $.ajax({
            url:'/check',
            method: 'post',
            data:{name:name,pass:pass},
            dataType: 'json',
            async: false,
            success:function(data){
                if(data[0]=='false'){
                    $(".error_name").text('Tên đăng nhập không tồn tại');
                    $(".error_name").css("display", 'block');
                    $(".name_icon").css('display','block');
                }else{
                    $(".error_name").text('');
                    $(".error_name").css("display", 'none');
                    $(".name_icon").css('display','none');
                }
                if(data[1]=='false'){
                    $(".error_pass").text('Mật khẩu không đúng');
                    $(".error_pass").css("display", 'block');
                    $(".pass_icon").css('display','block');
                }else{
                    $(".error_pass").text('');
                    $(".error_pass").css("display", 'none');
                    $(".pass_icon").css('display','none');
                }
                if(data[0]=='true'&& data[1]=='true'){
                    kq= true;
                }
                
            }
        });
    }else{
        check('#name');
        check('.pass');
    }
    return kq;
}

//tìm kiếm loại

function search_loai(page){
    var text = $('#search_loai').val();
    $.ajax({
        url:'/loaits/search?page='+page,
        method: "post",
        data:{text:text},
        success: function(data){
            $('#list_loai').html(data);
        }
    });
}


// thêm phòng

function insert_phong(){
    var ten_phong = $('.ten_phong').val();
    var mo_ta = $('.mo_ta').val();
    if(check('.ten_phong_lb') ){
        $.ajax({
            url:'/phongban',
            method: 'post',
            data:{ten_phong:ten_phong,mo_ta:mo_ta},
            success:function(data){
                location.reload();
            }
        })
    }
}

function check_insert_ncc(){
    check('.sdt_ncc_lb');
    check('.email_ncc_lb');
    check('.diachi_ncc_lb');
    if(check('.ten_ncc_lb')  && check('.sdt_ncc_lb') && check('.email_ncc_lb') &&check('.diachi_ncc_lb')){
        return true;
    }
    return false;
}

function insert_ncc(){
    var ten_ncc = $('.ten_ncc').val();
    var sdt_ncc = $('.sdt_ncc').val();
    var email_ncc = $('.email_ncc').val();
    var diachi_ncc = $('.diachi_ncc').val();
    if( check_insert_ncc()){
        $.ajax({
            url:'/nhacungcap',
            method: 'post',
            data:{
                ten_ncc:ten_ncc,
                sdt_ncc:sdt_ncc,
                email_ncc:email_ncc,
                diachi_ncc:diachi_ncc
            },
            success:function(data){
                location.reload();
            }
        })
    }
}



function check_insert_taisan(){
    check('.tents_lb');
    check('#loaits');
    check('.sl_lb');
    check('#phongban');
    check('.so_hieu_lb');
    check('.nsx_lb');
    check('#ncc');
    check('.nuoc_sx_lb');
    check('.ngaymua_lb');
    check('.ngaytang_lb');
    check('.ngaysd_lb');
    check('.ngia_lb');
    check('.bd_HM_lb');
    check('.tile_HM_lb');
    check('.tgSD_lb');
    if(check('.tents_lb') && check('#loaits') && check('.sl_lb') &&check('#phongban') 
        && check('.so_hieu_lb') &&check('.nsx_lb') &&check('#ncc') &&check('.nuoc_sx_lb')
        && check('.ngaymua_lb') && check('.ngaytang_lb') && check('.ngaysd_lb') && check('.ngia_lb')
        && check('.bd_HM_lb') && check('.tile_HM_lb') && check('.tgSD_lb')
        ){
            return true;
    }
    return false;
}

function check_insert_nv(){
    check('.email_nv_lb');
    check('.diachi_nv_lb');
    check('#phongban');
    check('#chucvu');
    if(check('.ten_nv_lb') && check('.email_nv_lb') && check('.diachi_nv_lb') && check('#phongban') && check('#chucvu')){
        return true;
    }
    return false;
}

(function ($) {
    $.fn.inputFilter = function (inputFilter) {
        return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function () {
            if (inputFilter(this.value)) {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
            } else if (this.hasOwnProperty("oldValue")) {
                this.value = this.oldValue;
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
            } else {
                this.value = "";
            }
        });
    };
}(jQuery));